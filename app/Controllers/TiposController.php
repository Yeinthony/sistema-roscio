<?php

namespace App\Controllers;

use App\Models\TiposModel;
use App\Models\PersonalModel;
use App\Models\RegistroModel;

class TiposController extends BaseController{

    function __construct(){

        $this->tipos = new TiposModel();
        $this->personal = new PersonalModel();
        $this->registro = new RegistroModel();

    }

    public function index(){
            
        $res['exito'] = ['res' => 10];
        return view('registrar/Tipos', $res);

    }

    public function ver(){

        $mensaje = session('mensaje');
    
        $modelo = $this->tipos;
        $query = $modelo->datosTipos();
        $datos['res'] = [
            'tipos' => $query->getResultArray(),
            'mensaje' => $mensaje
        ];

        return view('ver/Tipos', $datos);

    }

    public function buscaPorTipo(){

        $tipo = $this->request->getPost('tipo');

        $mensaje = session('mensaje');
        $tipos = $this->tipos;
        $query = $tipos->buscarTipo($tipo);
        $datos['res'] = [
            'tipos' => $query->getResultArray(),
            'mensaje' => $mensaje
        ];

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

    public function eliminarTipo(){
    
        $id_tipo = $this->request->getGet('id-tipo');

        $personal = $this->personal;
        $tipos = $this->tipos;
        $registro = $this->registro;

        $query = $personal->buscarPersonalTipo($id_tipo);
        $datos['personal'] = $query->getResultArray();

        foreach($datos['personal'] as $per){

            $query = $registro->datosRegistroID($per['ID_personal']);
            $datos2['registro'] = $query->getResultArray();

            foreach($datos2['registro'] as $dato){
                $registro->deleteRegistroPersonal($dato['ID_registro']);
                $registro->deleteRegistro($dato['ID_registro']);
            }

            $personal->deletePersonal($per['ID_personal']);

        }
        
        $exito['res'] = $tipos->deleteTipo($id_tipo);

        if($exito['res']){

            return redirect()->to(base_url('/ver-tipos'))->with('mensaje', '1');

        }

        $res['exito'] = ['res' => 'Problemas al eliminar tipo'];
        return view('ver/Tipos', $res);
        
    }

    public function editarTipo(){
    
        $id_tipo = $this->request->getPost('id-tipo');
        $tipo = $this->request->getPost('tipo');

        $tipos = $this->tipos;
        $tipos->editarTipo($id_tipo, $tipo);

        return redirect()->to(base_url('/ver-tipos'));
        
    }

}