<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {
    
    private $redirectURL;

    
    public function __construct() {
        parent::__construct();
        $this->loaddependencies();
    }
    
    public function index(){
        $data['tabTitle'] = "BlockBuster";

        $this->load->view('templates/login',$data);
  
    }
    
    public function logout(){
        $user = $this->session->userdata('user');
        $this->Session_Model->CloseSession($user);
        $this->session->sess_destroy();
        redirect('Session', 'refresh');
    }

    public function SinJava(){
        $user = $this->session->userdata('user');
        $this->Session_Model->CloseSession($user);
        $this->session->sess_destroy();
        redirect('../', 'refresh');
    }
    
    public function validatelogin(){
        
        $this->validationrules();
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');

            $userSinSesion = $this->Session_Model->CheckSession($user);
            $valores = count($userSinSesion);
            if ($valores == 0) {
                $userExist = $this->Session_Model->checkinourdb($user);
                if($userExist->valido){
                    $userValid = $this->Session_Model->checkinactivedirectory($user,$pass);
                    if($userValid->valido){
                        $this->setsession('user', $userValid->user);
                        $this->setsession('name', $userValid->name);
                        $this->setsession('tipo_user', $userValid->tipo_user);
                        $user = $userValid->user;
                        $tipo_user = $userValid->tipo_user;
                        $this->Session_Model->TablaSesiones($user,$tipo_user);
                        echo "OK-".$this->redirectURL = $this->findredirecturl();
                    }else{
                        echo 'IUOP'; //Error: Incorrect User Or Password
                    }
                }else{
                    echo 'UWOA'; //Error: User Without Access  
                }
            }else
            echo "UWAS"; //Error: User With Active Session
        }
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
   
        $this->Session_Model->InsertUsuario($datosusuario);
      }

    public function ResetLogin(){

        $user = $this->input->post("userreset");
        $pass = $this->input->post("passreset");

        $UserExist = $this->Session_Model->checkinourdbreset($user);
        if ($UserExist->valido) {
            $userValid = $this->Session_Model->checkinactivedirectoryreset($user,$pass);
            if($userValid->valido){

                $this->Session_Model->ResetSesion($user);
                echo json_encode("OK");
            }else{
                echo json_encode("IUOP");
            }
        
        }else{
            echo json_encode("UWOA");
        }
    }
  
    private function findredirecturl(){

        if ($this->session->userdata('redirect')){
            $url = $this->session->userdata('redirect');
            $this->session->unset_userdata('redirect');
        } else{
            $url = "Dashboard"; //Choose the default controller to access after the validation of the user and password
        }
        return $url;
    }
    
    private function setsession($type,$value){
        $newdata = array( 
            $type => $value 
        );
        $this->session->set_userdata($newdata);
    }
    
    private function validationrules(){
        $this->form_validation->set_rules('user', '"Usuario"', 'required|trim');
        $this->form_validation->set_rules('pass', '"Contraseña"', 'required|trim');
    }
    
    protected function loaddependencies(){
        $this->load->model('Session_Model');
    }

    public function EstadoU(){

        $user = $this->session->userdata('user');
        $res = $this->Session_Model->UsuActivo($user);
        echo json_encode($res);
    }

}