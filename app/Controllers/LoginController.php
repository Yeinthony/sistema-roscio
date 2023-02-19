<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class LoginController extends BaseController
{
    public function index(){
        $mensaje = session('mensaje');
        $data = [
            'mensaje' => $mensaje
        ];

        return view('Login', $data);
    }

    public function validarDatos(){

        $usuario =  new UsuariosModel();
        $datos['usuarios']= $usuario->orderBy('id_usuario', 'ASC')->findAll();

        $user = $this->request->getPost('user-form');
        $pass = $this->request->getPost('pass-form');

        

        if($user !== "" and $pass !== ""){
            foreach ($datos['usuarios'] as $registro) { 

                if($user == $registro['usuario'] and $pass == $registro['contraseña']){

                    $data = [
                        "usuario" => $user
                    ];

                    $session = session();
                    $session->set($data);

                    return redirect()->to(base_url('/inicio'));
                }
                    
            } 

            return redirect()->to(base_url('/login'))->with('mensaje', '0');

        } else {

            return redirect()->to(base_url('/login'))->with('mensaje', '1');

        }
        
    }

    public function cerrarSesion(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('/login'));
    }
}
