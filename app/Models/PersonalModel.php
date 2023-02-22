<?php 
namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PersonalModel extends Model{

    protected $table      = 'personal';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'ID_personal';
    protected $allowedFields = ['Nombre', 'Apellido', 'CI'];

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function datosPersonal(){
        
        $datos = $this->db->query("SELECT personal.ID_personal, Nombre, Apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos;");

        return $datos;
    }
}

/* SELECT personal.ID_personal, Nombre, Apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos; */