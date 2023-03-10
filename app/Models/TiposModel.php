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

    public function buscarTipo($tipo){
        
        $sql = 'SELECT * FROM `tipos` WHERE Tipo = :tipo:;';
        $query = $this->db->query($sql, [
            'tipo'     => $tipo
        ]);
        
        return $query;

    }

    public function guardarTipo($tipo){

        $sql = 'INSERT INTO tipos (ID_tipos, Tipo) VALUES (NULL, :tipo:)';
        $query = $this->db->query($sql, [
            'tipo'     => $tipo
        ]);
        
        return $query;

    }
    
    public function deleteTipo($id_tipo){
        
        $sql = 'DELETE FROM tipos WHERE tipos.ID_tipos = :id_tipo:';
        $query = $this->db->query($sql, [
            'id_tipo'     => $id_tipo
        ]);
        
        return $query;
    }

    public function editarTipo($id_tipo, $tipo){
        
        $sql = 'UPDATE tipos SET Tipo = :tipo: WHERE tipos.ID_tipos = :id_tipo:;';
        $query = $this->db->query($sql, [
            'tipo'     => $tipo,
            'id_tipo'     => $id_tipo
        ]);
        
        return $query;
    }

}

/* UPDATE `tipos` SET `Tipo` = 'Animador' WHERE `tipos`.`ID_tipos` = 7; */