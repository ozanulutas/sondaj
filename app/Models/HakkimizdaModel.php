<?php namespace App\Models;

use CodeIgniter\Model;

class HakkimizdaModel extends Model
{
    protected $table      = 'hakkimizda';
    protected $primaryKey = 'id';

    protected $allowedFields = ['baslik', 'metin', 'resim', 'parallax'];
}