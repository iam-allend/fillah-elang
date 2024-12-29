<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        
        return view(name: 'dashboard_admin/index');
    }

    // USER MANAGE ===========================
    public function userManageRead()
    {

        // $data['users'] = $this -> adminModel->findAll(); // Mengambil semua data user dari database 
        $adminModel = new AdminModel();
        $data['users'] = $adminModel->getRole(); // Mengambil semua data user dari database
        
        return view('dashboard_admin/index', $data); // Mengirim data ke view 'index'
    }

    public function addUser()
    {
        $adminModel = new AdminModel();
        
        // Ambil data dari form
        $data = [
            'username' => $this->request->getPost('F_username'),
            'email' => $this->request->getPost('F_email'),
            'phone_number' => $this->request->getPost('F_phone_number'),
            'address' => $this->request->getPost('F_address'),
            'password' => password_hash($this->request->getPost('F_password'), PASSWORD_DEFAULT) // Hash password
        ];

        // Insert data ke database
        $adminModel->insert($data);

        return redirect()->to('/admin')->with('success', 'User added successfully');
    }


    public function update()
    {
        $adminModel = new AdminModel();
        $id = $this->request->getPost('id');
        $user = $adminModel->find($id); // Dapatkan data user untuk cek gambar lama

        // Ambil data dari form
        $data = [
            'username' => $this->request->getPost('F_username'),
            'email' => $this->request->getPost('F_email'),
            'phone_number' => $this->request->getPost('F_phone_number'),
            'address' => $this->request->getPost('F_address')
        ];

        // Cek apakah ada file gambar yang diupload
        $imgFile = $this->request->getFile('img_user');
        if ($imgFile && $imgFile->isValid()) {
            // Path direktori untuk menyimpan gambar
            $imgPath = 'img/img_users/';

            // Hapus gambar lama jika bukan gambar default
            if ($user['img_user'] != $imgPath . 'default.svg') {
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

        return redirect()->to('/admin')->with('success', 'User updated successfully');
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

        return redirect()->to('/admin')->with('success', 'User deleted successfully');
    }

    // USER MANAGE END ===========================

    public function static()
    {

        return view('dashboard_admin/layout-static');
    }
}
