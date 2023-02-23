<?php 
namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PersonalModel extends Model{

    protected $table      = 'personal';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'ID_personal';
    protected $allowedFields = ['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'CI'];

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function datosPersonal(){
        
        $datos = $this->db->query("SELECT personal.ID_personal, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos ORDER BY personal.ID_personal");

        return $datos;
    }

    public function buscarPersonalCI($ci){
        
        $sql = 'SELECT * FROM `personal` WHERE CI = :ci:;';
        $query = $this->db->query($sql, [
            'ci'     => $ci
        ]);

        return $query;
    }

    public function guardarPersonal($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $ci){

        $sql = 'INSERT INTO personal (ID_personal, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, CI) VALUES (NULL, :primerNombre:, :segundoNombre:, :primerApellido:, :segundoApellido:, :ci:);';
        $query = $this->db->query($sql, [
            'primerNombre'     => $primerNombre,
            'segundoNombre'     => $segundoNombre,
            'primerApellido'     => $primerApellido,
            'segundoApellido'     => $segundoApellido,
            'ci'     => $ci
        ]);
        
        return $query;

    } 

    public function guardarPersonalTipo($ID_personal, $tipoF){

        $sql = 'INSERT INTO `personal_tipos` (`ID_personal_tipos`, `ID_personal`, `ID_tipos`) VALUES (NULL, :ID_personal:, :ID_tipos:);';
        $query = $this->db->query($sql, [
            'ID_personal'     => $ID_personal,
            'ID_tipos'     => $tipoF
        ]);

        return $query; 

    }


}

/* SELECT personal.ID_personal, Nombre, Apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos; */