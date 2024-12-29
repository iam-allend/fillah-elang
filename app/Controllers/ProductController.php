<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use CodeIgniter\Database\Database; // Tambahkan ini

class ProductController extends BaseController
{
    protected $productModel;
    protected $productImageModel;
    protected $db;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        return view('dashboard_admin/index_product', $data);
    }
    public function getImages($productId)
    {
        $images = $this->productImageModel->where('product_id', $productId)->findAll();
        return $this->response->setJSON($images);
    }
    public function create()
    {
        return view('dashboard_admin/create');
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'images' => 'uploaded[images]|max_size[images,2048]|is_image[images]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data produk
        $productData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'seller_id' => 1, // Sesuaikan dengan sistem autentikasi Anda
        ];

        $this->productModel->insert($productData);
        $productId = $this->productModel->insertID(); // Dapatkan ID produk yang baru disimpan

        // Upload dan simpan multiple images secara manual
        $images = $this->request->getFiles('images');

        // Gunakan db->query() untuk insert secara manual
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('dashboard_admin/uploads/product', $newName);

                // Query manual untuk insert ke tabel product_images
                $imagePath = 'dashboard_admin/uploads/product/' . $newName;
                $this->db->query("INSERT INTO product_images (product_id, image_url) VALUES (?, ?)", [$productId, $imagePath]);
            }
        }

        return redirect()->to('admin/products')->with('success', 'Produk berhasil ditambahkan');
    }


    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        $data['productImages'] = $this->productImageModel->where('product_id', $id)->findAll();
        return view('dashboard_admin/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data produk
        $productData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ];

        $this->productModel->update($id, $productData);

        // Handle new images if uploaded
        $images = $this->request->getFiles('images');
        if ($images) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('dashboard_admin/uploads/product', $newName);

                    $imagePath = 'dashboard_admin/uploads/product/' . $newName;
                    
                    // Menyisipkan data gambar dengan kueri manual
                    $query = "INSERT INTO product_images (product_id, image_url) VALUES (?, ?)";
                    $this->db->query($query, [$id, $imagePath]);
                }
            }
        }
        return redirect()->to('admin/products')->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($id)
    {
        // Hapus gambar dari storage dan database
        $productImages = $this->productImageModel->where('product_id', $id)->findAll();
        foreach ($productImages as $image) {
            if (file_exists($image['image_url'])) {
                unlink($image['image_url']); // Hapus file gambar dari storage
            }
            $this->productImageModel->delete($image['id']); // Hapus dari database
        }

        // Hapus data produk
        $this->productModel->delete($id);

        return redirect()->to('admin/products')->with('success', 'Produk berhasil dihapus');
    }


    public function deleteImage($imageId)
    {
        $image = $this->productImageModel->find($imageId);
        if ($image) {
            if (file_exists($image['image_url'])) {
                unlink($image['image_url']);
            }
            $this->productImageModel->delete($imageId);
            return json_encode(['status' => 'success']);
        }
        return json_encode(['status' => 'error']);
    }
}