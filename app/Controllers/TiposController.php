<?php

namespace App\Controllers;

use App\Models\TiposModel;

class TiposController extends BaseController{

    function __construct(){

        $this->tipos = new TiposModel();

    }

    public function index(){
            
        $res['exito'] = ['res' => 10];
        return view('registrar/Tipos', $res);

    }

    public function ver(){
    
        $modelo = $this->tipos;
        $query = $modelo->datosTipos();
        $datos['tipos'] = $query->getResultArray();

        return view('ver/Tipos', $datos);

    }

    public function guardar(){
    
        $tipo = $this->request->getPost('tipo');
        $modelo = $this->tipos;
        $query = $modelo->datosTipos();
        $datos['tipos'] = $query->getResultArray();

        $res['exito'] = ['res' => $tipo.' ya esta registrado, intente con un tipo diferente'];

        foreach($datos['tipos'] as $dato){
            if($dato['Tipo'] === $tipo){
                return view('registrar/Tipos', $res);
            }
        }

        $res['exito'] = ['res' => $modelo->guardarTipo($tipo)];
        
        return view('registrar/Tipos', $res);
    }

}