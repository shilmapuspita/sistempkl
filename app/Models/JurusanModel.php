<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';  // Nama tabel di database
    protected $primaryKey = 'ID_JURUSAN'; // Primary key tabel
    protected $allowedFields = ['NAMA_JURUSAN']; // Kolom yang bisa diakses
    
}
