<?php 

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'levels';
    protected $primaryKey = 'levelid';
    protected $allowedFields = ['levelnama'];
    protected $useTimestamps = false; // Jika tidak ada timestamp
}

?>