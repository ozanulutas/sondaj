<?php namespace App\Models;

use CodeIgniter\Model;

class KullaniciModel extends Model
{
    protected $table      = 'kullanici';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kullanici_adi', 'email', 'sifre'];

    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeUpdate(array $data)
    {
        if(isset($data['data']['sifre'])) {
            $data['data']['sifre'] = password_hash($data['data']['sifre'], PASSWORD_DEFAULT);
        }
        return $data;
    }

}