<?php 
namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model{

    protected $table      = 'registro';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'ID_registro';
    protected $allowedFields = ['Fecha', 'hora_entrada', 'hora_salida', 'observacion'];

    public function __construct(){

        $this->db = \Config\Database::connect();
        
    }

    public function datos(){
        
        $datos = $this->db->query("SELECT * FROM `registro`");

        return $datos;
    }

    public function datosRegistro(){
        
        $datos = $this->db->query("SELECT registro_personal.ID_registro, primer_nombre, primer_apellido, CI, registro.Fecha, registro.hora_entrada, registro.hora_salida, registro.observacion FROM personal INNER JOIN registro_personal ON personal.ID_personal = registro_personal.ID_personal INNER JOIN registro ON registro_personal.ID_registro = registro.ID_registro ORDER BY registro.Fecha DESC;");

        return $datos;
    }

    public function datosRegistroID($id_personal){
        
        $sql = 'SELECT registro_personal.ID_registro, primer_nombre, primer_apellido, CI, registro.Fecha, registro.hora_entrada, registro.hora_salida, registro.observacion FROM personal INNER JOIN registro_personal ON personal.ID_personal = registro_personal.ID_personal INNER JOIN registro ON registro_personal.ID_registro = registro.ID_registro WHERE personal.ID_personal = :id_personal:';
        $query = $this->db->query($sql, [
            'id_personal'     => $id_personal
        ]);

        return $query;
    }

    public function registrarEntrada($fecha, $horaE, $observacion){

        if(empty($observacion)){

            $sql = 'INSERT INTO registro (ID_registro, Fecha, hora_entrada, hora_salida, observacion) VALUES (NULL, :fecha:, :horaE:, NULL, NULL);';
            $query = $this->db->query($sql, [
                'fecha'     => $fecha,
                'horaE'     => $horaE
            ]);
        
            return $query;

        }      

        $sql = 'INSERT INTO registro (ID_registro, Fecha, hora_entrada, hora_salida, observacion) VALUES (NULL, :fecha:, :horaE:, NULL, :observacion:);';
        $query = $this->db->query($sql, [
            'fecha'     => $fecha,
            'horaE'     => $horaE,
            'observacion'     => $observacion
        ]);
        
        return $query;

    } 
   
    public function registrarSalida($horaSalida, $id_registro){

        $sql = 'UPDATE registro SET hora_salida = :horaSalida: WHERE registro.ID_registro = :id_registro:;';
        $query = $this->db->query($sql, [
            'horaSalida'     => $horaSalida,
            'id_registro'     => $id_registro
        ]);
    
        return $query;

    } 

    public function editarObservacion($observacion, $id_registro){

        $sql = 'UPDATE registro SET observacion = :observacion: WHERE registro.ID_registro = :id_registro:;';
        $query = $this->db->query($sql, [
            'observacion'     => $observacion,
            'id_registro'     => $id_registro
        ]);
    
        return $query;

    } 

    public function registrarSalidaObservacion($horaSalida, $id_registro, $observacionF){

        $sql = 'UPDATE registro SET hora_salida = :horaSalida:, observacion = :observacionF: WHERE registro.ID_registro = :id_registro:;';
        $query = $this->db->query($sql, [
            'horaSalida'     => $horaSalida,
            'id_registro'     => $id_registro,
            'observacionF'     => $observacionF
        ]);
    
        return $query;

    } 

    public function guardarPersonalRegistro($ID_personal, $ID_registro){

        $sql = 'INSERT INTO registro_personal (ID_registro_personal, ID_personal, ID_registro) VALUES (NULL, :ID_personal:, :ID_registro:);';
        $query = $this->db->query($sql, [
            'ID_personal'     => $ID_personal,
            'ID_registro'     => $ID_registro,
        ]);
        
        return $query;

    } 

    public function deleteRegistro($id_registro){
        
        $sql = 'DELETE FROM registro WHERE registro.ID_registro = :id_registro:';
        $query = $this->db->query($sql, [
            'id_registro'     => $id_registro
        ]);
        
        return $query;
    }

    public function deleteRegistroPersonal($id_registro){
        
        $sql = 'DELETE FROM registro_personal WHERE registro_personal.ID_registro = :id_registro:';
        $query = $this->db->query($sql, [
            'id_registro'     => $id_registro
        ]);
        
        return $query;
    }

}
