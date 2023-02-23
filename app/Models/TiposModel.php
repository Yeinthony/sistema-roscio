<?php 
namespace App\Models;

use CodeIgniter\Model;

class TiposModel extends Model{

    protected $table      = 'tipos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'ID_tipos';
    protected $allowedFields = ['Tipo'];

    public function __construct(){

        $this->db = \Config\Database::connect();
        
    }

    public function datosTipos(){
        
        $datos = $this->db->query("SELECT * FROM `tipos`;");

        return $datos;
    }

    public function guardarTipo($tipo){

        $sql = 'INSERT INTO tipos (ID_tipos, Tipo) VALUES (NULL, :tipo:)';
        $query = $this->db->query($sql, [
            'tipo'     => $tipo
        ]);
        
        return $query;

    } 

}