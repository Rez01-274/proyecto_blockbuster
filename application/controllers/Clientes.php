<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

      public function __construct() {
          parent::__construct();
      }

      public function index(){
          $data['tabTitle'] = "BlockBuster";
          $data['pagecontent'] = "clientes/clientes";
          $data['clientes'] = $this->Query_Model->DatosClientes();

          $this->loadpageintotemplate($data);

     }

     function CheckClienteExistente(){
         $cliente = $this->input->post('cliente');
         $res = $this->Query_Model->GetClientByName($cliente);
         echo json_encode($res);
     }

public function SaveCliente(){

      $nombre = $this->input->post('nombre');
      $apaterno = $this->input->post('apaterno');
      $amaterno = $this->input->post('amaterno');
      $telefono = $this->input->post('telefono');
      $email = $this->input->post('email');
      $empresa = $this->input->post('empresa');

     $datoscliente = array(

         'nombre' => $nombre,
         'apaterno' => $apaterno,
         'amaterno' => $amaterno,
         'telefono' => $telefono,
         'email' => $email,
         'empresa' => $empresa,
         'token' => uniqid(),
         'estado' => '1'
     );
     $this->Query_Model->InsertClient($datoscliente);

  }

  public function ClientePorID(){
      $id = $this->input->post('id');
      $res = $this->Query_Model->GetClientById($id);
      echo json_encode($res);
  }

  public function UpdateClient(){

      $id = $this->input->post('id');
      $nombre = $this->input->post('nombre');
      $apaterno = $this->input->post('apaterno');
      $amaterno = $this->input->post('amaterno');
      $telefono = $this->input->post('telefono');
      $email = $this->input->post('email');
      $empresa = $this->input->post('empresa');
      $token = $this->input->post('token');
      $estado = $this->input->post('estado');

     $datosusuario = array(

         'nombre' => $nombre,
         'apaterno' => $apaterno,
         'amaterno' => $amaterno,
         'telefono' => $telefono,
         'email' => $email,
         'empresa' => $empresa,
         'token' => $token,
         'estado' => $estado

     );
     $this->Query_Model->UpdateClientes($id,$datosusuario);

  }

  public function DeleteClient(){

      $id = $this->input->post('id');
      $nombre = $this->input->post('nombre');
      $apaterno = $this->input->post('apaterno');
      $amaterno = $this->input->post('amaterno');
      $telefono = $this->input->post('telefono');
      $email = $this->input->post('email');
      $empresa = $this->input->post('empresa');
      $token = $this->input->post('token');
      $estado = $this->input->post('estado');

     $datosusuario = array(

         'nombre' => $nombre,
         'apaterno' => $apaterno,
         'amaterno' => $amaterno,
         'telefono' => $telefono,
         'email' => $email,
         'empresa' => $empresa,
         'token' => $token,
         'estado' => '0'

     );
     $this->Query_Model->DeleteClientes($id,$datosusuario);

  }
}
