<?php namespace App\Models;

use CodeIgniter\Model;

class HizmetlerModel extends Model
{
    protected $table      = 'hizmetler';
    protected $primaryKey = 'id';

    protected $allowedFields = ['baslik', 'aciklama', 'metin', 'resim'];
}