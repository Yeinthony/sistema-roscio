<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $mensaje = session('mensaje');
        $data = [
            'mensaje' => $mensaje
        ];

        return view('Login', $data);
    }
}
