<?php namespace App\Models;

use CodeIgniter\Model;

class IletisimModel extends Model
{
    protected $table      = 'iletisim';
    protected $primaryKey = 'id';

    protected $allowedFields = ['baslik', 'email', 'telefon', 'adres'];
}