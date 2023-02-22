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

        $datos['tipos']= $this->tipos->orderBy('ID_tipos', 'ASC')->findAll();

        return view('registrar/Personal', $datos);
    }

    public function ver(){
    
        $modelo = $this->personal;

        $query = $modelo->datosPersonal();
        $datos['personal'] = $query->getResultArray();

        return view('ver/Personal', $datos);
    }

}