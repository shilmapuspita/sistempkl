<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password'];

   // Hash password sebelum menyimpan data baru
   protected function beforeInsert(array $data)
   {
       $data = $this->hashPassword($data);
       return $data;
   }

   private function hashPassword(array $data)
   {
       if (isset($data['data']['password'])) {
           $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
       }
       return $data;
   }
}