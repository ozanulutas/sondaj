<?php
namespace App\Validation;

use App\Models\KullaniciModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new KullaniciModel();
        $user = $model->where('kullanici_adi', $data['kullanici_adi'])
                      ->first();
        
        if(! $user)
            return false;

        return password_verify($data['sifre'], $user['sifre']);
    }
}