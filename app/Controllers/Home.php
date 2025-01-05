<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;


class Home extends BaseController
{
    
    protected $cartModel;
    protected $userModel;
    protected $productModel;
    protected $productImageModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
    }

    public function index()
    {
        // Inisialisasi model
        $cartModel = new CartModel();
        // $productModel = new ProductModel();
        // $productImageModel = new ProductImageModel();

        $data['products'] = $this->productModel->findAll();
        
        // // Ambil user ID dari session (misal)
        // $userId = session()->get('user_id');

        // // Ambil data keranjang untuk user yang sedang login
        // $cartItems = $cartModel->where('user_id', $userId)->findAll();

        // // Buat array untuk menyimpan data lengkap keranjang
        // $completeCartItems = [];

        // foreach ($cartItems as $cartItem) {
        //     // Ambil data produk berdasarkan product_id dari cart
        //     $product = $productModel->find($cartItem['product_id']);

        //     // Ambil satu gambar produk berdasarkan product_id
        //     $productImage = $productImageModel->where('product_id', $cartItem['product_id'])->first();

        //     // Tambahkan detail produk dan gambar ke dalam data keranjang
        //     $completeCartItems[] = [
        //         'cart_id'      => $cartItem['id'],
        //         'product_name' => $product['name'],
        //         'product_price'=> $product['price'],
        //         'quantity'     => $cartItem['quantity'],
        //         'image_url'    => $productImage ? $productImage['image_url'] : 'default-image.png', // Gunakan gambar default jika tidak ada
        //         'total_price'  => $product['price'] * $cartItem['quantity'],
        //     ];
        // }

        // Kirim data ke view
        return view('frontend/index',  $data);
        
    }

    public function profile_test(){
        return view('user/pages-profile');
    }

    public function shop(){

        $data['products'] = $this->productModel->findAll();

        return view('frontend/shop', $data);
    }

    public function addToCart()
    {
        $productId = $this->request->getPost('product_id');
        $userId = session()->get('user_id'); // Pastikan session user aktif

        if (!$userId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Anda harus login untuk menambahkan produk ke keranjang.'
            ]);
        }

        if ($this->cartModel->addToCart($userId, $productId)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan ke keranjang.'
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Gagal menambahkan produk ke keranjang.'
        ]);
    }


    public function contact(){
        return view('frontend/contact');
    }
    public function about(){
        return view('frontend/about');
    }
    public function blog(){
        return view('frontend/blog');
    }
    
}
