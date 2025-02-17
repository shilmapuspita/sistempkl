<?php

namespace App\Models;

use CodeIgniter\Model;

class MentorModel extends Model
{
    protected $table = 'pembimbing';  // Nama tabel di database
    protected $primaryKey = 'ID_PEMBIMBING'; // Primary key tabel
    protected $allowedFields = ['ID_PEMBIMBING', 'NIP', 'NAMA', 'DIVISI', 'BAGIAN', 'NIP_ATASAN', 'NAMA_ATASAN', 'NAMA_JABATAN']; // Kolom yang bisa diakses
    
}
