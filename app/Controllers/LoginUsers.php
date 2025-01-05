<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\TransactionModel;

class LoginUsers extends BaseController
{
    protected $adminModel;
    protected $cartModel;
    protected $userModel;
    protected $productModel;
    protected $productImageModel;
    protected $transactionModel;

    
    public function __construct(){
    
        $this->cartModel = new CartModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->adminModel = new AdminModel();
        $this->transactionModel = new TransactionModel();

        $adminModel = new AdminModel();
        $data['users'] = $adminModel;
    }

    public function index()
    {
        // Jika sudah login, redirect ke halaman yang sesuai
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('level_user_id') == 1 ? '/admin/dashboard1' : '/');
        }else{
            return view('login/index');
        }
        
    }


    public function attemptLogin()
    {
        $rules = [
            'username_or_email' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                        ->with('error', 'Username/email and password are required.');
        }

        $usernameOrEmail = $this->request->getPost('username_or_email');
        $password = $this->request->getPost('password');
        
        // Cari user berdasarkan username atau email
        $user = $this->adminModel
                    ->where('username', $usernameOrEmail)
                    ->orWhere('email', $usernameOrEmail)
                    ->first();

        // Verifikasi password jika user ditemukan
        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'phone_number' => $user['phone_number'],
                'address' => $user['address'],
                'img_user' => $user['img_user'],
                'level_user_id' => $user['level_user_id'],
                'logged_in' => TRUE
            ];
            
            session()->set($sessionData);
            
            return redirect()->to($user['level_user_id'] != 2 ? '/admin/dashboard' : '/')
                        ->with('success', 'Login successful');
        }
        
        return redirect()->back()->withInput()
                        ->with('error', 'Invalid username/email or password');
    }


    public function register()
    {
        // Jika sudah login, redirect ke halaman yang sesuai
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('level_user_id') == 1 ? '/admin/dashboard' : '/');
        }
        return view('login/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'pass_confirm' => 'required|matches[password]',
            'phone_number' => 'required|min_length[10]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                           ->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level_user_id' => 2 // Default to regular user level
        ];
        
        $this->adminModel->insert($data);
        
        return redirect()->to('/login')
                       ->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')
                ->with('success', 'Successfully logged out.');
    }


    public function profile()
    {
        // KONFIGURASI LOGIN

        // Pastikan user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil data user dari database
        $user = $this->adminModel->find(session()->get('user_id'));

        if (!$user) {
            return redirect()->to('/login')->with('error', 'User not found');
        }

        // Kirim data user ke view
        $data['user'] = $user;

        
        //AKSES DAN PENGGUNAAN DATA
        // Inisialisasi model
        $cartModel = new CartModel();
        $productModel = new ProductModel();
        $productImageModel = new ProductImageModel();

        // Ambil user ID dari session (misal)
        $userId = session()->get('user_id');

        // Ambil data keranjang untuk user yang sedang login
        $cartItems = $cartModel->where('user_id', $userId)->findAll();
                                            
        // Buat array untuk menyimpan data lengkap keranjang
        $completeCartItems = [];

        foreach ($cartItems as $cartItem) {
            // Ambil data produk berdasarkan product_id dari cart
            $product = $productModel->find($cartItem['product_id']);

            // Ambil satu gambar produk berdasarkan product_id
            $productImage = $productImageModel->where('product_id', $cartItem['product_id'])->first();

            // Tambahkan detail produk dan gambar ke dalam data keranjang
            $completeCartItems[] = [
                'cart_id'      => $cartItem['id'],
                'product_name' => $product['name'],
                'product_price'=> $product['price'],
                'quantity'     => $cartItem['quantity'],
                'image_url'    => $productImage ? $productImage['image_url'] : 'default-image.png', // Gunakan gambar default jika tidak ada
                'total_price'  => $product['price'] * $cartItem['quantity'],
            ];
        }


        return view('user/profile', $data+['cartItems' => $completeCartItems]);
    }

    // public function updateProfile()
    // {
    //     // Pastikan user sudah login
    //     if (!session()->get('logged_in')) {
    //         return redirect()->to('/login');
    //     }

    //     // Validasi data yang diterima dari form
    //     $rules = [
    //         'username' => 'required|min_length[4]',
    //         'email' => 'required|valid_email',
    //         'phone_number' => 'required|min_length[10]',
    //         'address' => 'required'
    //     ];

    //     if (!$this->validate($rules)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     // Ambil data dari form
    //     $data = [
    //         'id' => session()->get('user_id'), // ID pengguna
    //         'username' => $this->request->getPost('username'),
    //         'email' => $this->request->getPost('email'),
    //         'phone_number' => $this->request->getPost('phone_number'),
    //         'address' => $this->request->getPost('address'),
    //     ];

    //     // Update data pengguna berdasarkan ID menggunakan save()
    //     $this->adminModel->save($data);

    //     return redirect()->to('profile')->with('success', 'Profile updated successfully.');
    // }




    public function updateProfile()
    {
        // Pastikan user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Validasi data yang diterima dari form
        $rules = [
            'username' => 'required|min_length[4]',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|valid_email',
            'phone_number' => 'required|min_length[10]numeric',
            'address' => 'required'
        ];

        // Validasi file hanya jika ada upload
        $img = $this->request->getFile('img_user');
        if ($img && $img->isValid()) {
            $rules['img_user'] = [
                'uploaded[img_user]',
                'max_size[img_user,2048]',
                'is_image[img_user]',
                'mime_in[img_user,image/jpg,image/jpeg,image/png,image/gif]'
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'id' => session()->get('user_id'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address'),
        ];

        // Handle file upload
        if ($img && $img->isValid() && !$img->hasMoved()) {
            try {
                // Get current user data
                $currentUser = $this->adminModel->find(session()->get('user_id'));
                
                // Generate unique filename
                $newName = uniqid() . '_' . $img->getName();
                
                // Move file to upload directory
                $img->move(ROOTPATH . 'public/img/img_users', $newName);
                
                // Set new image path
                $data['img_user'] = 'img/img_users/' . $newName;
                
                // Delete old image if exists and not default
                if (!empty($currentUser['img_user']) && 
                    $currentUser['img_user'] !== 'img/default.svg' && 
                    file_exists(ROOTPATH . 'public/' . $currentUser['img_user'])) {
                    unlink(ROOTPATH . 'public/' . $currentUser['img_user']);
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal mengubah gambar: ' . $e->getMessage());
            }
        }

        // Update password if provided
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Save data
        try {
            $this->adminModel->save($data);
            
            // Ambil data user yang baru diupdate
            $updatedUser = $this->adminModel->find(session()->get('user_id'));
            
            // Update session data
            $sessionData = [
                'user_id' => $updatedUser['id'],
                'first_name' => $updatedUser['first_name'],
                'last_name' => $updatedUser['last_name'],
                'username' => $updatedUser['username'],
                'email' => $updatedUser['email'],
                'img_user' => $updatedUser['img_user'],
                'logged_in' => true
            ];
            
            // Set session baru
            session()->set($sessionData);
            
            return redirect()->to('profile')
                ->with('success', 'Profile berhasil diupdate.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengubah data profile: ' . $e->getMessage());
        }
    }


    public function transaksi(){
        // Ambil ID user dari session
        $userId = session()->get('user_id');

        // Ambil data transaksi termasuk gambar produk
        $transactions = $this->transactionModel->getUserTransactionsWithImage($userId);

        // Kirim data transaksi ke view
        return view('user/transaksi', ['transactions' => $transactions]);
    }

    public function cancelTransaksi($transactionId)
    {
        try {
            log_message('debug', 'Cancel transaction request for ID: ' . $transactionId);

            if (!$this->request->isAJAX()) {
                throw new \Exception('Invalid request method');
            }

            $userId = session()->get('user_id');
            if (!$userId) {
                throw new \Exception('Pengguna tidak login');
            }

            // Pastikan transaksi milik pengguna
            $transaction = $this->transactionModel->where('id', $transactionId)
                                                ->where('user_id', $userId)
                                                ->first();
            
            if (!$transaction) {
                throw new \Exception('Transaksi tidak ditemukan');
            }

            // Pastikan status adalah 'Pending'
            if ($transaction['status'] !== 'Pending') {
                throw new \Exception('Hanya transaksi dengan status "Pending" yang bisa dibatalkan ');
            }

            // Update status transaksi menjadi 'Cancelled'
            $this->transactionModel->update($transactionId, ['status' => 'Cancelled']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Transaction berhasil dibatalkan'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Transaction cancellation error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }



    public function keranjang(){
        // Ambil ID user dari session
        
        $productModel = new ProductModel();
        // $data['products'] = $productModel->findAll();
        $data['products'] = $productModel->getProductsWithImages();

        $userId = session()->get('user_id');

        // Ambil data transaksi termasuk gambar produk
        $transactions = $this->transactionModel->getUserTransactionsWithImage($userId);

        // Kirim data transaksi ke view
        return view('user/keranjang', ['transactions' => $transactions]+$data);
    }



    // Tambahkan method untuk update status
    public function updateStatus($id, $status)
    {
        $transaction = $this->transactionModel->find($id);
        
        if (!$transaction) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Transaction not found'
            ]);
        }

        // Begin transaction
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Update transaction status
            $this->transactionModel->update($id, ['status' => $status]);

            // If status is completed, update product stock
            if ($status === 'Completed') {
                $productModel = new ProductModel();
                $product = $productModel->find($transaction['product_id']);
                
                if (!$product) {
                    throw new \Exception('Product not found');
                }

                $newStock = $product['stock'] - $transaction['quantity'];
                
                if ($newStock < 0) {
                    throw new \Exception('Insufficient stock');
                }

                $productModel->update($transaction['product_id'], ['stock' => $newStock]);
            }

            $db->transCommit();
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);

        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    } 
    

    private function calculateTotalPrice($productId, $quantity)
    {
        // Lakukan perhitungan harga total berdasarkan id produk dan quantity
        // Misalnya, dapatkan harga dari model produk
        // return harga * quantity;
    }   



    // public function logout()
    // {
    //     if ($this->request->getMethod() === 'post') {
    //         session()->destroy();
    //         return redirect()->to('/login')
    //                         ->with('success', 'Successfully logged out.');
    //     }
    //     // Jika logout tidak menggunakan metode post, arahkan kembali ke halaman yang aman
    //     return redirect()->to('/');
    // }

}