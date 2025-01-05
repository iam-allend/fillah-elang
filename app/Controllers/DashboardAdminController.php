<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\LevelModel;



class DashboardAdminController extends BaseController
{
    public function index()
    {
        
        return view(name: 'dashboard_admin/index');
    }

    // USER MANAGE ===========================
   
    public function userManageRead()
    {
        $adminModel = new AdminModel();
        $levelModel = new LevelModel(); // Model untuk tabel levels

        // Ambil level pengguna yang sedang login
        $currentUserLevel = session()->get('level_user_id'); // Pastikan Anda menyimpan level_user_id di session saat login

        // Ambil semua pengguna
        if ($currentUserLevel == 1) { // Jika admin
            $data['users'] = $adminModel->where('level_user_id', 2)->findAll(); // Ambil hanya user dengan level_user_id 2
            
        } else if ($currentUserLevel == 3) { // Jika superadmin
            $data['users'] = $adminModel->getAllRole(); // Ambil semua pengguna
        }

        // Ambil semua level untuk dropdown
        $data['levels'] = $levelModel->findAll();

        return view('dashboard_admin/index', $data); // Mengirim data ke view 'index'
    }

    // public function userManageRead()
    // {

    //     // $data['users'] = $this -> adminModel->findAll(); // Mengambil semua data user dari database 
    //     $adminModel = new AdminModel();
    //     $data['users'] = $adminModel->getAllRole(); // Mengambil semua data user dari database
        

    //     return view('dashboard_admin/index', $data); // Mengirim data ke view 'index'
    // }

    public function addUser()
    {
        $adminModel = new AdminModel();
        
        // Ambil data dari form
        $data = [
            'first_name' => $this->request->getPost('F_Firstname'),
            'last_name' => $this->request->getPost('F_Lastname'),
            'username' => $this->request->getPost('F_username'),
            'email' => $this->request->getPost('F_email'),
            'phone_number' => $this->request->getPost('F_phone_number'),
            'address' => $this->request->getPost('F_address'),
            'level_user_id' => $this->request->getPost('F_role'),
            'password' => password_hash($this->request->getPost('F_password'), PASSWORD_DEFAULT) // Hash password
        ];

        // Insert data ke database
        $adminModel->insert($data);

        return redirect()->to('/admin')->with('success', 'Berhasil menambahkan user');
    }


    public function update()
    {
        $adminModel = new AdminModel();
        $id = $this->request->getPost('id');
        $user = $adminModel->find($id); // Dapatkan data user untuk cek gambar lama

        // Ambil data dari form
        $data = [
            'first_name' => $this->request->getPost('F_firstname'),
            'last_name' => $this->request->getPost('F_lastname'),
            'username' => $this->request->getPost('F_username'),
            'email' => $this->request->getPost('F_email'),
            'password' => password_hash($this->request->getPost('F_Password'), PASSWORD_DEFAULT),
            'phone_number' => $this->request->getPost('F_phone_number'),
            'address' => $this->request->getPost('F_address'),
            'level_user_id' => $this->request->getPost('F_role'),
        ];

        // Cek apakah ada file gambar yang diupload
        $imgFile = $this->request->getFile('img_user');
        if ($imgFile && $imgFile->isValid()) {
            // Path direktori untuk menyimpan gambar
            $imgPath = 'img/img_users/';

            // Hapus gambar lama jika bukan gambar default
            if ($user['img_user'] && $user['img_user'] != 'img/default.svg') {
                // Menggunakan path direktori tanpa base_url()
                @unlink($user['img_user']);
            }

            // Simpan gambar baru
            $newImageName = $imgFile->getRandomName();
            $imgFile->move($imgPath, $newImageName);
            $data['img_user'] = $imgPath . $newImageName;
        }

        // Update data berdasarkan ID
        $adminModel->update($id, $data);
        
        // $this->updateSessionData($id);

        // Menyimpan pesan sukses dengan ID pengguna
        return redirect()->to('/admin')->with('success', "Data user (ID: $id) berhasil diupdate");
    }

    public function delete($id)
    {
        $adminModel = new AdminModel();
        $user = $adminModel->find($id);

        // Hapus gambar jika ada dan bukan gambar default
        if ($user && $user['img_user'] != 'img/default.svg') {
            @unlink(base_url() . $user['img_user']);
        }

        // Hapus data user dari database
        $adminModel->delete($id);
        // $this->updateSessionData($id);

        return redirect()->to('/admin')->with('success', "User (ID: $id) berhasil dihapus");
    }

    // USER MANAGE END ===========================

    public function static()
    {

        return view('dashboard_admin/layout-static');
    }


    public function cart(){

        $cartModel = new CartModel();
        $data['carts'] = $cartModel->getCartsWithDetails();

        // Ambil data pengguna dan produk untuk dropdown
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        return view('dashboard_admin/cart-user', $data); // Ganti 'cart_view' dengan nama view Anda

    }

    public function add_carts()
    {
        $cartModel = new CartModel();

        // Validasi input
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity' => $this->request->getPost('quantity'),
            'created_at' => date('Y-m-d H:i:s'), // Set created_at ke waktu saat ini
        ];

        // Tambahkan data cart
        if ($cartModel->insert($data)) {
            return redirect()->to('admin/cart-user')->with('success', 'Data keranjang user berhasil ditambahkan!');
        } else {
            return redirect()->to('admin/cart-user')->with('error', 'Gagal menambahkan data keranjang user.');
        }
    }

    public function update_carts()
    {
        $cartModel = new CartModel();
        $cartId = $this->request->getPost('cartId');

        // Validasi input
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity' => $this->request->getPost('quantity'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update data cart
        if ($cartModel->update($cartId, $data)) {
            return redirect()->to('/admin/cart-user')->with('success', 'Data keranjang berhasil diperbarui!');
        } else {
            return redirect()->to('/admin/cart-user')->with('error', 'Gagal memperbarui data keranjang.');
        }
    }

    public function delete_carts($id)
    {
        $cartModel = new CartModel();

        // Hapus data cart berdasarkan ID
        if ($cartModel->delete($id)) {
            return redirect()->to('/admin/cart-user')->with('success', 'Data keranjang user berhasil dihapus!');
        } else {
            return redirect()->to('/admin/cart-user')->with('error', 'Gagal menghapus data keranjang user.');
        }
    }



    private function updateSessionData($id)
    {
        $adminModel = new AdminModel();
        $user = $adminModel->find($id); // Ambil data terbaru dari database

        // Perbarui data sesi
        session()->set([
            'username' => $user['username'],
            'email' => $user['email'],
            'phone_number' => $user['phone_number'],
            'address' => $user['address'],
            'level_user_id' => $user['level_user_id'],
            'img_user' => $user['img_user'], // Jika Anda menyimpan gambar pengguna di sesi
        ]);
    }
}
