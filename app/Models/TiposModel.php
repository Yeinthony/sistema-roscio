<?php 
namespace App\Models;

use CodeIgniter\Model;

class TiposModel extends Model{
    protected $table      = 'tipos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'ID_tipos';
    protected $allowedFields = ['Tipo'];
}