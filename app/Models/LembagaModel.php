<?php
namespace App\Models;
use CodeIgniter\Model;

class LembagaModel extends Model {
    protected $table = 'lembaga'; // Menggunakan tabel 'lembaga'
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lembaga', 'bidang'];

    public function getAllLembaga() {
        return $this->findAll();
    }
}