<?php namespace App\Models;

use CodeIgniter\Model;

class SosyalMedyaModel extends Model
{
    protected $table      = 'sosyal_medya';
    protected $primaryKey = 'id';

    protected $allowedFields = ['link', 'platform'];
}