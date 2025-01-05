<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ProductModel;
use App\Models\AdminModel;

class TransactionController extends BaseController
{
    protected $transactionModel;
    protected $adminModel;
    protected $productModel;


    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    // Method index untuk menampilkan semua transaksi dengan data user dan produk
    public function index()
{
    // Load models
    $this->transactionModel = new TransactionModel();
    $this->adminModel = new AdminModel();
    $this->productModel = new ProductModel();
    
    // Get transactions, users, and products data
    $transactions = $this->transactionModel->getTransactionsWithDetails();
    $users = $this->adminModel->findAll();  // Mengambil semua pengguna dari tabel users
    $products = $this->productModel->findAll();  // Mengambil semua produk dari tabel products
    
    // Clear any cached data
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        
    // Pass data to view
    return view('dashboard_admin/transactions', data: [
        'transactions' => $transactions,
        'users' => $users,
        'products' => $products
    ]);
}

    // Method untuk menampilkan form tambah transaksi
    public function add()
    {
        $productModel = new ProductModel();
        $adminModel = new AdminModel();
        
        // Mengambil semua data produk dan user untuk ditampilkan di dropdown
        $products = $productModel->findAll();
        $users = $adminModel->findAll();

        return view('dashboard_admin/add_transaction', [
            'products' => $products,
            'users'    => $users,
        ]);
    }

    // Method untuk menyimpan transaksi baru
    public function store()
    {
        $data = [
            'user_id' => $this->request->getPost('F_user_id'),
            'product_id' => $this->request->getPost('F_product_id'),
            'quantity' => $this->request->getPost('F_quantity'),
            'total_price' => $this->request->getPost('F_total_price'),
            'status' => $this->request->getPost('F_status'),
            'order_date' => $this->request->getPost('F_order_date'),
            'whatsapp_link'=> $this->request->getPost('F_whatsapp_link')

        ];

        if ($this->transactionModel->insert($data)) {
            return $this->refreshAndRedirect('admin/transactions', 'Transaction added successfully.');
        } else {
            return $this->refreshAndRedirect('admin/transactions', 'Failed to add transaction.', 'error');
        }
    }

    // Method untuk menampilkan form edit transaksi
    public function edit($id)
    {   
        $transaction = $this->transactionModel->getTransactionById($id);  
        // Tambahkan ini untuk memeriksa nilai status
        var_dump($transaction['status']); // Memastikan status yang diambil benar
        exit; // Keluar dari skrip untuk sementara waktu 
        
        $productModel = new ProductModel();
        $adminModel = new AdminModel();
        
        // Mengambil semua data produk dan user untuk ditampilkan di dropdown
        $products = $productModel->findAll();
        $users = $adminModel->findAll();

        return view('dashboard_admin/edit_transaction', [
            'transaction' => $transaction,
            'products'    => $products,
            'users'       => $users,
        ]);
    }

    // Update update method
    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'user_id' => $this->request->getPost('F_user_id'),
            'product_id' => $this->request->getPost('F_product_id'),
            'quantity' => $this->request->getPost('F_quantity'),
            'total_price' => $this->request->getPost('F_total_price'),
            'status' => $this->request->getPost('F_status'),
            'order_date' => $this->request->getPost('F_order_date'),
            'alamat_kirim' => $this->request->getPost('F_alamat_kirim'),
            'whatsapp_link'=> $this->request->getPost('F_whatsapp_link')
        ];

        if ($this->transactionModel->update($id, $data)) {
            return $this->refreshAndRedirect('admin/transactions', 'Transaction updated successfully.');
        } else {
            return $this->refreshAndRedirect('admin/transactions', 'Failed to update transaction.', 'error');
        }
    }

    // Method untuk menghapus transaksi
    public function delete($id)
    {
        if ($this->transactionModel->delete($id)) {
            return $this->refreshAndRedirect('admin/transactions', 'Transaction deleted successfully.');
        } else {
            return $this->refreshAndRedirect('admin/transactions', 'Failed to delete transaction.', 'error');
        }
    }

    




    // ====================================== USER MANAGE ======================================
    



    // REFRESH CONFIG
    protected function refreshAndRedirect($path, $message = null, $type = 'success')
    {
        // Clear cache
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Refresh session
        session()->remove('__ci_last_regenerate');
        session()->regenerate(true);

        // Set flash message if provided
        if ($message) {
            session()->setFlashdata($type, $message);
        }

        // Redirect with refresh
        return redirect()->to(base_url($path))->withInput();
    }

}
