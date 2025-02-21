<?php

namespace App\Models;

use CodeIgniter\Model;

class MentorModel extends Model
{
    protected $table = 'pembimbing';  // Nama tabel di database
    protected $primaryKey = 'ID_PEMBIMBING'; // Primary key tabel
<<<<<<< HEAD
    protected $allowedFields = ['NIP', 'NAMA', 'DIVISI', 'BAGIAN', 'NIP_ATASAN', 'NAMA_ATASAN', 'NAMA_JABATAN']; // Kolom yang bisa diakses

=======
    protected $allowedFields = ['ID_PEMBIMBING', 'NIP', 'NAMA', 'DIVISI', 'BAGIAN', 'NIP_ATASAN', 'NAMA_ATASAN', 'NAMA_JABATAN']; // Kolom yang bisa diakses
    
    public function getPaginateData($perPage)
    {
        return $this->paginate($perPage);
    }
>>>>>>> 26d00d405255b2fc1bb02b33095076841dcbbb4d
}
