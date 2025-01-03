<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel yang digunakan
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields  = [
        'email', 'username', 'first_name', 'last_name', 'password', 'pass_confirm', 'phone_number', 'address', 'level_user_id', 'img_user'
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
    
}