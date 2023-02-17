<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class PersonalController extends BaseController
{
    public function index(){
        return view('Personal');
    }

}