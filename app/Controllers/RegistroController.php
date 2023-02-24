<?php

namespace App\Controllers;

use App\Models\RegistroModel;
use App\Models\PersonalModel;


class RegistroController extends BaseController{

    function __construct(){

        $this->registro = new RegistroModel();
        $this->personal = new PersonalModel;

    }

    public function indexEntrada(){
            
        $res['exito'] = ['res' => 10];
        return view('registrar/Entrada', $res);

    }

    public function indexSalida(){
            
        $res['exito'] = ['res' => 10];
        return view('registrar/Salida', $res);

    }

    public function ver(){
    
        $modelo = $this->tipos;
        $query = $modelo->datosTipos();
        $datos['tipos'] = $query->getResultArray();

        return view('ver/Tipos', $datos);

    }

    public function guardarEntrada(){
    
        $ci = $this->request->getPost('ci');
        $observacion = $this->request->getPost('observacion');

        $modelo = $this->personal;
        $query = $modelo->buscarPersonalCI($ci);
        $datos = $query->getResultArray();

        if(empty($datos[0])){
            $res['exito'] = ['res' => $ci.' No esta registrado como personal'];
            return view('registrar/Entrada', $res);
        }

        $modelo2 = $this->registro;
        $query2 = $modelo2->datosRegistro();
        $datos2['registro'] = $query2->getResultArray();

        date_default_timezone_set('America/Caracas');

        $fechaActual = date("Y-m-d");
        $horaActual = date("h:i:s");

        foreach($datos2['registro'] as $dato){
            if(($dato['Fecha'] === $fechaActual and $dato['CI'] === $ci) and !empty($dato['Fecha'])){
                $res['exito'] = ['res' =>'Ya existe un registro de entrada para '.$dato['primer_nombre']." ".$dato['primer_apellido']." el dia de hoy"];
                return view('registrar/Entrada', $res);
            }
        }

        $res['exito'] = ['res' => $modelo2->registrarEntrada($fechaActual, $horaActual, $observacion)];

        $query3 = $modelo2->datos();
        $datos3['registro2'] = $query3->getResultArray(); 

        $ID_personal = $datos[0]['ID_personal'];
        $ID_registro = 0;

        foreach($datos3['registro2'] as $dato){
            if($dato['ID_registro'] > $ID_registro){
                $ID_registro = $dato['ID_registro'];
            }
        }

        if($res['exito']['res']){
            
            $res['exito'] = ['res' => $modelo2->guardarPersonalRegistro($ID_personal, $ID_registro)];
            
            return view('registrar/Entrada', $res);

        }
        
        return view('registrar/Entrada', $res);
    }

}