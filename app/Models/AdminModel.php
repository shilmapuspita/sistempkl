<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'email', 'password', 'foto'];

   // Hash password sebelum menyimpan data baru
   protected function beforeInsert(array $data)
   {
       $data = $this->hashPassword($data);
       return $data;
   }

   protected function beforeUpdate(array $data)
   {
       $data = $this->hashPassword($data);
       return $data;
   }

   //agar hash password tetap berlaku saat update
   private function hashPassword(array $data)
   {
       if (isset($data['data']['password'])) {
           $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
       }
       return $data;
   }

   //method untuk mengambil data admin berdasarkan id
   public function getAdminbyId($id)
   {
    return $this->where('id_admin', $id)->first();
   }
}