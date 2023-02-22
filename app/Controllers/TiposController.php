<?php

namespace App\Controllers;

use App\Models\TiposModel;

class TiposController extends BaseController{

    function __construct(){

        $this->tipos = new TiposModel();

    }

    public function index(){
            
        return view('registrar/Tipos');

    }

    public function ver(){
    
        $datos['tipos']= $this->tipos->orderBy('ID_tipos', 'ASC')->findAll();
        return view('ver/Tipos', $datos);

    }

}