<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity'];
    protected $useTimestamps = true;
    

    public function getUserCartItems($userId)
    {
        return $this->select('carts.*, products.name, products.price')
                    ->join('products', 'products.id = carts.product_id')
                    ->where('carts.user_id', $userId)
                    ->findAll();
    }

        public function addToCart($userId, $productId, $quantity = 1)
        {
        $existingItem = $this->where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($existingItem) {
            // Jika produk sudah ada, tambahkan jumlah
            return $this->update($existingItem['id'], [
                'quantity' => $existingItem['quantity'] + $quantity
            ]);
        } else {
            // Jika produk belum ada, tambahkan baru
            return $this->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }
    }
        public function getUserCart($userId)
    {
        return $this->select('carts.*, products.name, products.price, products.image_url')
                    ->join('products', 'products.id = carts.product_id')
                    ->where('carts.user_id', $userId)
                    ->findAll();
    }





    public function getCartsWithDetails()
    {
        return $this->db->table('carts')
            ->select('carts.*, users.username, products.name, products.image, product_images.image_url')
            ->join('users', 'users.id = carts.user_id', 'left')
            ->join('products', 'products.id = carts.product_id', 'left')
            ->join('product_images', 'product_images.product_id = products.id', 'left')
            ->get()
            ->getResultArray();
    }

}
