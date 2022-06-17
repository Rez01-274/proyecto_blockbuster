<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "BlockBuster";
        $data['pagecontent'] = "dashboard/dashboard";

        $this->loadpageintotemplate($data);

   }

   public function SaveUser(){

     $nombre = $this->input->post('nombre');
     $apaterno = $this->input->post('apaterno');
     $amaterno = $this->input->post('amaterno');
     $telefono = $this->input->post('telefono');
     $email = $this->input->post('email');
     $username = $this->input->post('username');
     $password = $this->input->post('password');
     $ocupacion = $this->input->post('ocupacion');
     $rol = $this->input->post('rol');

     if($rol == "A"){
       $ocupacion = "Administrador";
     }else {
       $ocupacion = "Empleado";
     }

     $datosusuario = array(
        'nombre' => $nombre,
        'apaterno' => $apaterno,
        'amaterno' => $amaterno,
        'telefono' => $telefono,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'rol' => $rol,
        'ocupacion' => $ocupacion,
        'estado' => '1'
    );

     $this->Query_Model->InsertUsuario($datosusuario);
   }
}
