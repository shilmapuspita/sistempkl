<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaModel extends Model
{
    protected $table = 'lembaga';  // Nama tabel di database
    protected $primaryKey = 'ID_LEMBAGA'; // Primary key tabel
    protected $allowedFields = ['NAMA_LEMBAGA', 'ALAMAT_LEMBAGA', 'TELP_LEMBAGA', 'EMAIL_LEMBAGA']; // Kolom yang bisa diakses
    
}
