<?php
namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model {
    protected $table = 'datasiswa'; // Menggunakan tabel 'datasiswa'
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jurusan', 'tempat_pkl'];

    public function getAllSiswa() {
        return $this->findAll();
    }
}