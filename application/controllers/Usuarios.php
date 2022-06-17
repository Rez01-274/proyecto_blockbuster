<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "BlockBuster";
        $data['pagecontent'] = "usuarios/usuarios";
        $data['usuarios'] = $this->Query_Model->DatosUsuario();

        $this->loadpageintotemplate($data);

   }

   function CheckUsuarioExistente(){
       $usuario = $this->input->post('usuario');
       $res = $this->Query_Model->GetUserByName($usuario);
       echo json_encode($res);
   }

   public function SaveUsuario(){
    $rol = $this->input->post('rol');
    if($rol == "A"){
        $ocupacion = "Administrador";
    }else{
        $ocupacion = "Empleado";
    }
    $ocupacion;
    $nombre = $this->input->post('nombre');
    $apaterno = $this->input->post('apaterno');
    $amaterno = $this->input->post('amaterno');
    $telefono = $this->input->post('telefono');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

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

public function UsuarioPorID(){
    $id = $this->input->post('id');
    $res = $this->Query_Model->GetUserById($id);
    echo json_encode($res);
}

public function UpdateUser(){

    $id = $this->input->post('id');

    $rol = $this->input->post('rol');
    if($rol == "A"){
        $ocupacion = "Administrador";
    }else{
        $ocupacion = "Empleado";
    }
    $ocupacion;
    $nombre = $this->input->post('nombre');
    $apaterno = $this->input->post('apaterno');
    $amaterno = $this->input->post('amaterno');
    $telefono = $this->input->post('telefono');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $estado = $this->input->post('estado');

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
       'estado' => $estado
   );
   $this->Query_Model->UpdateUsuario($id,$datosusuario);

}

public function DeleteUser(){

    $id = $this->input->post('id');
    $rol = $this->input->post('rol');
    if($rol == "A"){
        $ocupacion = "Administrador";
    }else{
        $ocupacion = "Empleado";
    }
    $ocupacion;
    $nombre = $this->input->post('nombre');
    $apaterno = $this->input->post('apaterno');
    $amaterno = $this->input->post('amaterno');
    $telefono = $this->input->post('telefono');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $estado = $this->input->post('estado');

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
       'estado' => 0
   );
   $this->Query_Model->DeleteUsuario($id,$datosusuario);

}
}
