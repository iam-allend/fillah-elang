<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'product_id', 'quantity', 'total_price', 
        'status', 'order_date', 'whatsapp_link', 'bukti_tf', 
        'alamat_kirim', 'shipping_courier', 'shipping_cost', 'province', 'city'
    ];
    public function getTransactionsWithDetails()
    {
        return $this->db->table('transactions')
            ->select('transactions.*, users.username, users.email, products.name')
            ->join('users', 'users.id = transactions.user_id')
            ->join('products', 'products.id = transactions.product_id')
            ->get()
            ->getResultArray();
    }

    public function getUserTransactionsWithImage($userId)
    {
        return $this->select('transactions.*, products.name as product_name, products.price, product_images.image_url')
                    ->join('products', 'products.id = transactions.product_id')
                    ->join('product_images', 'product_images.product_id = products.id', 'left')
                    ->where('transactions.user_id', $userId)
                    ->groupBy('transactions.id') // Pastikan hanya satu gambar per transaksi
                    ->findAll();
    }
}