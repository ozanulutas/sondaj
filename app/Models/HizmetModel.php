<?php namespace App\Models;

use CodeIgniter\Model;

class HizmetModel extends Model
{
    protected $table      = 'hizmet';
    protected $primaryKey = 'id';

    protected $allowedFields = ['baslik', 'aciklama', 'metin', 'resim'];
}