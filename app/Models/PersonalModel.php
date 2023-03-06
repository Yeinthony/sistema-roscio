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

    public function buscarPersonalTipo($id_tipo){
        
        $sql = 'SELECT personal.ID_personal, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos WHERE tipos.ID_tipos = :id_tipo:';
        $query = $this->db->query($sql, [
            'id_tipo'     => $id_tipo
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

    public function actualizarPersonal($id_personal, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $ci){

        $sql = 'UPDATE personal SET primer_nombre = :primerNombre:, segundo_nombre = :segundoNombre:, primer_apellido = :primerApellido:, segundo_apellido = :segundoApellido:, CI = :ci: WHERE personal.ID_personal = :id_personal:;';

        $query = $this->db->query($sql, [
            'primerNombre'     => $primerNombre,
            'segundoNombre'     => $segundoNombre,
            'primerApellido'     => $primerApellido,
            'segundoApellido'     => $segundoApellido,
            'ci'     => $ci,
            'id_personal'     => $id_personal
        ]);

        /* UPDATE personal SET primer_nombre = 'Julio', segundo_nombre = 'Alberto', primer_apellido = 'Gutierrez', segundo_apellido = 'Campos', CI = '14798632' WHERE `personal`.`ID_personal` = 32; */
        
        return 'UPDATE personal SET primer_nombre ='.$primerNombre.', segundo_nombre = '.$segundoNombre.', primer_apellido = '.$primerApellido.', segundo_apellido = '.$segundoApellido.', CI = '.$ci.' WHERE personal.ID_personal = :id_personal:;';;

    } 

    public function guardarPersonalTipo($ID_personal, $tipoF){

        $sql = 'INSERT INTO `personal_tipos` (`ID_personal_tipos`, `ID_personal`, `ID_tipos`) VALUES (NULL, :ID_personal:, :ID_tipos:);';
        $query = $this->db->query($sql, [
            'ID_personal'     => $ID_personal,
            'ID_tipos'     => $tipoF
        ]);

        return $query; 

    }

    public function actualizarPersonalTipo($ID_personal, $tipoF){

        $sql = "UPDATE `personal_tipos` SET `ID_tipos` = :ID_tipos: WHERE `personal_tipos`.`ID_personal` = :ID_personal:;";
        $query = $this->db->query($sql, [
            'ID_personal'     => $ID_personal,
            'ID_tipos'     => $tipoF
        ]);

        return $query; 

    }

    public function deletePersonal($id_personal){
        
        $sql = 'DELETE FROM personal WHERE personal.ID_personal = :id_personal:';
        $query = $this->db->query($sql, [
            'id_personal'     => $id_personal
        ]);
        
        return $query;
    }



}

/* SELECT personal.ID_personal, Nombre, Apellido, CI, tipos.Tipo FROM personal INNER JOIN personal_tipos ON personal.ID_personal = personal_tipos.ID_personal INNER JOIN tipos ON personal_tipos.ID_tipos = tipos.ID_tipos; */