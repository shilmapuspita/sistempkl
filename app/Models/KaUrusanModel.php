<?php

namespace App\Models;

use CodeIgniter\Model;

class KaUrusanModel extends Model
{
    protected $table = 'urdiklat';  // Nama tabel di database
    protected $primaryKey = 'id_urdiklat'; // Primary key tabel
    protected $allowedFields = ['NP','AN_KA_URDIKLAT', 'E_MAIL']; // Kolom yang bisa diakses
    
    public function getUrdiklatById($id)
    {
        return $this->where('id_urdiklat', $id)->first();
    }
}
