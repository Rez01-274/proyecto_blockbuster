<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller {

    public function __construct($loginRedirect = FALSE) {
        parent::__construct();
        $this->loaddependencies();
        if($loginRedirect){
            $redirectURL = current_url();
            $this->session->set_userdata('redirect',explode('/index.php/',$redirectURL)[1]);
        }
        if(!$this->sessionexist()){
            redirect('Session/index/');
        }
    }
    
    protected function sessionexist(){
        $flag = FALSE;
        if($this->session->has_userdata('user') && $this->session->has_userdata('name')  && $this->session->has_userdata('tipo_user')){
            $flag = TRUE; 
        }
        return $flag;
        //return TRUE; Funcion para desactivar el login
    }
    
    protected function loadpageintotemplate($data){
      $this->load->view('templates/main',$data);
    }
    
    protected function loaddependencies(){
        $this->load->model('Session_Model');
    }
}