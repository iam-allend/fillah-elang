<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\TransactionModel;

class KeranjangController extends BaseController
{
    protected $adminModel;
    protected $cartModel;
    protected $userModel;
    protected $productModel;
    protected $productImageModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->adminModel = new AdminModel();
        $this->transactionModel = new TransactionModel();
    }


private $apiKey = '00987c6f6c2434878864ea98e400406c';

    public function getProvinces()
        {
            $response = $this->callRajaOngkir('province', [], 'GET');
            return $response['rajaongkir']['results'] ?? [];
        }

    public function getCities($provinceId)
        {
            $response = $this->callRajaOngkir('city', ['province' => $provinceId], 'GET');
            return $response['rajaongkir']['results'] ?? [];
        }

    private function callRajaOngkir($endpoint, $data = [], $method = 'GET')
    {
        $client = \Config\Services::curlrequest();
        $options = [
            'headers' => [
                'key' => $this->apiKey,
            ],
        ];

        if ($method === 'POST') {
            $options['form_params'] = $data;
        }

        $response = $client->request($method, "https://api.rajaongkir.com/starter/$endpoint", $options);
        return json_decode($response->getBody(), true);
    }




    public function keranjang()
    {
        $user = $this->adminModel->find(session()->get('user_id'));

        if (!$user) {
            return redirect()->to('/login')->with('error', 'User not found');
        }

        $userId = session()->get('user_id');
        $cartItems = $this->cartModel->where('user_id', $userId)->findAll();
        
        $completeCartItems = [];

        foreach ($cartItems as $cartItem) {
            $product = $this->productModel->find($cartItem['product_id']);
            
            if ($product) {
                $productImage = $this->productImageModel->where('product_id', $cartItem['product_id'])->first();

                $completeCartItems[] = [
                    'cart_id' => $cartItem['id'],
                    'product_id' => $cartItem['product_id'], // Menggunakan product_id dari cart
                    'product_name' => $product['name'],
                    'product_price' => $product['price'],
                    'quantity' => $cartItem['quantity'],
                    'image_url' => $productImage ? $productImage['image_url'] : 'default-image.png',
                    'total_price' => $product['price'] * $cartItem['quantity'],
                ];
            }
        }

        return view('user/keranjang', [
            'user' => $user,
            'cartItems' => $completeCartItems
        ]);
    }

    public function save()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new \Exception('Invalid request method');
            }

            // Debug: Log received data
            log_message('debug', 'Received POST data: ' . json_encode($this->request->getPost()));

            $products = json_decode($this->request->getPost('products'), true);
            if (!$products) {
                throw new \Exception('No products data received');
            }   

            $productsJson = $this->request->getPost('products');
            $shipping_courier = $this->request->getPost('shipping_courier');
            $alamatKirim =  $this->request->getPost('alamatDetail');
            $shipping_cost = $this->request->getPost('shipping_cost'); // Ambil shipping cost
            log_message('debug', 'Shipping cost received: ' . $shipping_cost); // Log shipping cost
            // Ambil data dari POST
            $provinceId = $this->request->getPost('provinsi'); // ID provinsi
            $cityId = $this->request->getPost('kota'); // ID kota

            // Ambil nama provinsi dan kota
            $provinces = $this->getProvinces();
            $cities = $this->getCities($provinceId);

            // Cocokkan ID dengan nama
            $provinceName = null;
            foreach ($provinces as $province) {
                if ($province['province_id'] == $provinceId) {
                    $provinceName = $province['province'];
                    break;
                }
            }

            $cityName = null;
            foreach ($cities as $city) {
                if ($city['city_id'] == $cityId) {
                    $cityName = $city['city_name'];
                    break;
                }
            }

            // Validasi input
            if (empty($provinceName) || empty($cityName)) {
                throw new \Exception('Provinsi dan Kota harus diisi.');
            }

            // Proses penyimpanan transaksi
            $products = json_decode($productsJson, true);

            $buktiTf = $this->request->getFile('buktiTf');
            $buktiTfName = null;
            
            if ($buktiTf && $buktiTf->isValid() && !$buktiTf->hasMoved()) {
                $buktiTfName = $buktiTf->getRandomName();
                $buktiTf->move(FCPATH . 'tf_data', $buktiTfName);
                log_message('debug', 'File uploaded successfully: ' . $buktiTfName);
            }

            $productsJson = $this->request->getPost('products');
            if (!$productsJson) {
                throw new \Exception('No products data received');
            }

            $products = json_decode($productsJson, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON format: ' . json_last_error_msg());
            }

            log_message('debug', 'Decoded products: ' . json_encode($products));

            $userId = session()->get('user_id');

            if (!$userId) {
                throw new \Exception('User not logged in');
            }

            $currentDate = date('Y-m-d H:i:s');

            // Begin transaction
            $db = \Config\Database::connect();
            $db->transBegin();

            $productIdsToDelete = [];
            
            foreach ($products as $product) {
                $productId = $product['productId'];
                $productExists = $this->productModel->find($productId);
                if (!$productExists) {
                    throw new \Exception("Product ID tidak ditemukan: {$productId}");
                }
                log_message('debug', 'Product verified: ' . $productId);
            }
            
            foreach ($products as $product) {
                if (!isset($product['productId'])) {
                    throw new \Exception('Product ID not found in data');
                }

                // Debug: Log each product being processed
                log_message('debug', 'Processing product: ' . json_encode($product));

                $productData = $this->productModel->find($product['productId']);
                if (!$productData) {
                    throw new \Exception("Product not found: {$product['productId']}");
                }

                $productIdsToDelete[] = $product['productId'];
                $totalPrice = $productData['price'] * $product['quantity'];
                
                $testData = [
                    'shipping_cost' => $shipping_cost,
                    // Tambahkan data lain yang diperlukan
                ];

                // Simpan data transaksi ke database
                $transactionData = [
                    'user_id' => $userId,
                    'product_id' => $product['productId'],
                    'quantity' => $product['quantity'],
                    'total_price' => $totalPrice,
                    'status' => 'Pending',
                    'order_date' => $currentDate,
                    'bukti_tf' => $buktiTfName,
                    'alamat_kirim' => $alamatKirim,
                    'shipping_courier' => $shipping_courier,
                    'province' => $provinceName,
                    'city' => $cityName,
                    'shipping_cost ' => $shipping_cost,
                ];

                // Simpan transaksi
                if (!$this->transactionModel->insert($transactionData + $testData)) {
                    throw new \Exception('Failed to insert transaction: ' . json_encode($this->transactionModel->errors()));
                }

                // Debug: Log transaction data
                log_message('debug', 'Inserting transaction: ' . json_encode($transactionData));

                // if (!$this->transactionModel->insert($transactionData)) {
                //     throw new \Exception('Failed to insert transaction: ' . json_encode($this->transactionModel->errors()));
                // }
            }

            if (!empty($productIdsToDelete)) {
                // Debug: Log cart deletion
                log_message('debug', 'Deleting cart items: ' . json_encode($productIdsToDelete));
                
                $this->cartModel->where('user_id', $userId)
                                ->whereIn('product_id', $productIdsToDelete)
                                ->delete();
            }

            $db->transCommit();
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Transactions saved successfully and cart updated'
            ]);

        } catch (\Exception $e) {
            if (isset($db) && $db->transStatus() === false) {
                $db->transRollback();
            }
            
            // Delete uploaded file if exists
            if (isset($buktiTfName) && file_exists(FCPATH . 'tf_data/' . $buktiTfName)) {
                unlink(FCPATH . 'tf_data/' . $buktiTfName);
            }

            log_message('error', 'Transaction error: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage(),
                'trace' => ENVIRONMENT === 'development' ? $e->getTraceAsString() : null
            ]);
        }
    }


    public function delete($cartId)
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new \Exception('Invalid request method');
            }

            $userId = session()->get('user_id');
            if (!$userId) {
                throw new \Exception('User not logged in');
            }

            // Ensure the cart item belongs to the current user
            $cartItem = $this->cartModel->where('id', $cartId)
                                    ->where('user_id', $userId)
                                    ->first();
            
            if (!$cartItem) {
                throw new \Exception('Cart item not found');
            }

            if (!$this->cartModel->delete($cartId)) {
                throw new \Exception('Failed to delete cart item');
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Item successfully deleted from cart'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}