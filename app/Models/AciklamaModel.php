<?php namespace App\Models;

use CodeIgniter\Model;

class AciklamaModel extends Model
{
    protected $table      = 'sayfa_aciklama';
    protected $primaryKey = 'id';

    protected $allowedFields = ['aciklama'];
}