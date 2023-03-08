<?php

namespace App\Controllers;

use App\Models\TiposModel;
use App\Models\PersonalModel;
use App\Models\RegistroModel;

class PersonalController extends BaseController{

    function __construct(){

        $this->tipos = new TiposModel();
        $this->personal =  new PersonalModel();
        $this->registro =  new RegistroModel();

    }

    public function index(){

        $modelo = $this->tipos;
        $query = $modelo->datosTipos();
        $tiposR = $query->getResultArray();
        $res['exito'] = [
            'res' => 10,
            'tipos' => $tiposR
        ];

        return view('registrar/Personal', $res);
    }

    public function ver(){
    
        $personal = $this->personal;
        $tipos = $this->tipos;
        $query = $personal->datosPersonal();
        $query2 = $tipos->datosTipos();
        $datos['res'] = [
            'personal' => $query->getResultArray(),
            'tipos' => $query2->getResultArray()
        ];

        return view('ver/Personal', $datos);
    }

    public function buscarPersonal(){
    
        $ciCheck = $this->request->getPost('check-ci');
        $tipoCheck = $this->request->getPost('check-tipo');
        $dateForm = $this->request->getPost('date-form');

        $personal = $this->personal;
        $tipos = $this->tipos;

        if(!empty($ciCheck)){

            $query = $personal->buscarPersonalCiTipo($dateForm);;
            $query2 = $tipos->datosTipos();
            $datos['res'] = [
                'personal' => $query->getResultArray(),
                'tipos' => $query2->getResultArray()
            ];

            return view('ver/Personal', $datos);

        }

        if(!empty($tipoCheck)){

            $query = $personal->buscarPersonalPorTipo($dateForm);;
            $query2 = $tipos->datosTipos();
            $datos['res'] = [
                'personal' => $query->getResultArray(),
                'tipos' => $query2->getResultArray()
            ];

            return view('ver/Personal', $datos);

        }

        return redirect()->to(base_url('/ver-personal'));
        
    }

    public function guardar(){
    
        $primerNombre = $this->request->getPost('primer-nombre');
        $segundoNombre = $this->request->getPost('segundo-nombre');
        $primerApellido = $this->request->getPost('primer-apellido');
        $segundoApellido = $this->request->getPost('segundo-apellido');
        $ci = $this->request->getPost('ci');
        $tipoF = $this->request->getPost('tipo');

        $modelo = $this->personal;
        $query = $modelo->buscarPersonalCI($ci);
        $datos = $query->getResultArray();

        $modelo2 = $this->tipos;
        $query2 = $modelo2->datosTipos();
        $tiposR = $query2->getResultArray();
        $res['exito'] = [
            'res' => $ci.' ya esta registrado como personal, intente con datos diferentes',
            'tipos' => $tiposR
        ];

        if($datos != null){

            if($datos[0]['CI'] === $ci){
        
                return view('registrar/Personal', $res);
         
            }

        }

        $exito['res'] = $modelo->guardarPersonal($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $ci);

        if($exito['res']){

            $query3 = $modelo->buscarPersonalCI($ci);
            $datos2 = $query3->getResultArray();  
            $res2['exito'] = [
                'res' => $modelo->guardarPersonalTipo($datos2[0]['ID_personal'], $tipoF),
                'tipos' => $tiposR
            ];

            return view('registrar/Personal', $res2);

        }

        return view('registrar/Personal', $res);
        
    }

    public function editarPersonal(){
    
        $id_personal = intval($this->request->getPost('id-personal'));
        $primerNombre = $this->request->getPost('primer-nombre');
        $segundoNombre = $this->request->getPost('segundo-nombre');
        $primerApellido = $this->request->getPost('primer-apellido');
        $segundoApellido = $this->request->getPost('segundo-apellido');
        $ci = $this->request->getPost('ci');
        $tipoF = $this->request->getPost('tipo');

        $personal = $this->personal;

        $personal->actualizarPersonal($id_personal, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $ci);

        $personal->actualizarPersonalTipo($id_personal, $tipoF);

        return redirect()->to(base_url('/ver-personal'));
        
    }

    public function eliminarPersonal(){
    
        $id_personal = $this->request->getGet('id-personal');

        $registro = $this->registro;
        $personal = $this->personal;

        $query = $registro->datosRegistroID($id_personal);
        $datos['registro'] = $query->getResultArray();

        foreach($datos['registro'] as $dato){
            $registro->deleteRegistroPersonal($dato['ID_registro']);
            $registro->deleteRegistro($dato['ID_registro']);
        }

        $exito['res'] = $personal->deletePersonal($id_personal);

        if($exito['res']){
   
            return redirect()->to(base_url('/ver-personal'));

        }

        $res['exito'] = ['res' => 'Problemas al eliminar personal'];
        return view('ver/Personal', $res);
        
    }

}