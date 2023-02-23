<?php

namespace App\Controllers;

use App\Models\TiposModel;
use App\Models\PersonalModel;

class PersonalController extends BaseController{

    function __construct(){

        $this->tipos = new TiposModel();
        $this->personal =  new PersonalModel();

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
    
        $modelo = $this->personal;
        $query = $modelo->datosPersonal();
        $datos['personal'] = $query->getResultArray();

        return view('ver/Personal', $datos);
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

}