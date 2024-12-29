<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image', 'seller_id'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getProductsWithImages()
{
    return $this->db->table('products')
        ->select('products.*, MIN(product_images.image_url) AS image_url')
        ->join('product_images', 'product_images.product_id = products.id', 'left')
        ->groupBy('products.id')  // Group by product ID to avoid duplicates
        ->get()
        ->getResultArray();
}

}

// app/Models/ProductImageModel.php
