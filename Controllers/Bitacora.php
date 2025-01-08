<?php

class Bitacora extends Controller
{
    public function __construct()
    {
        session_start(); // Asegurarse de que la sesión esté iniciada
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'BITACORA';
        $data['page_title'] = "Bitácora <small> </small>";
        $data['script'] = 'Assets/js/bitacora.js';
        $this->views->getView($this, 'index', $data);    
        
    }
    public function listar() {
        $data = $this->model->getBitacora(0);
    
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    

    public function crearEvento() {
        $datosEnBruto = file_get_contents("php://input");
        $datosDecodificados = json_decode($datosEnBruto, true); 
        $this->model->crearEvento($datosDecodificados['idUser'], $datosDecodificados['idObjeto'], $datosDecodificados['accion'], $datosDecodificados['descripcion'], true);
        echo json_encode($datosDecodificados, JSON_UNESCAPED_UNICODE);
        die();
    }


}
