<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

    
    protected $table = 'users'; // Nama tabel yang digunakan
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields  = [
    'username', 'first_name', 'last_name', 'email', 'username', 'password', 'pass_confirm', 'phone_number', 'level_user_id', 'address', 'img_user' // Add any other fields
    ];

    protected $useTimestamps = true; 

    protected $returnType = 'array'; // Return type sebagai array


    public function getRole(): array
    {
        return $this->where('level_user_id', 2)->findAll();
    }
    public function getAdmin(): array
    {   
        return $this->where('level_user_id', 1)->findAll();
    }

    public function getAllRole(): array
    {   
        return $this->findAll();
    }
}