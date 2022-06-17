<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_Model extends CI_Model{
    
    private $db_user = '';
    private $db_name = '';
    private $db_tipo = '';
    
    public function __construct() {
        parent::__construct();
        $this->load->database('default');
    }
    function InsertUsuario($datosusuario){
        $this->db->insert('usuarios',$datosusuario);
    }

    public function CheckSession($user){

        $this->db->select('*');
        $this->db->from('sesiones_activas');
        //$array = array('username' => $user,'estado' => '1'); //Validamos que el usuario no tiene una sesion activa
        $this->db->where('username',$user);
        $this->db->where('estado','1');
        $this->db->where("(rol= 'A' OR rol = 'SU' OR rol = 'E')",NULL,FALSE);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function checkinourdb($user) {
        $isValid = FALSE;
        
        $this->db->select('*');
        $this->db->from('usuarios');
        //$array = array('username' => $user, 'estado' => '1'); //Validamos que el usuario esta en nuestra base de datos y que se encuentra activo
        $this->db->where('username',$user);
        $this->db->where('estado','1');
        $this->db->where("(rol= 'A' OR rol = 'SU' OR rol = 'E')",NULL,FALSE);
        $query = $this->db->get()->result();

        if( (count($query) > 0) ){
            $isValid = TRUE;

            $this->db_user = $query[0]->username;
            $this->db_name = $query[0]->nombre.' '.$query[0]->apaterno.' '.$query[0]->amaterno;
            $this->db_tipo = $query[0]->rol;
        }
        
        return $this->buildobjsession($isValid,$this->db_user,$this->db_name,$this->db_tipo);
    }
    
    public function checkinactivedirectory($user,$pass){
        
        $this->db->select('*');
        $this->db->from('usuarios');
        //$array = array('username' => $user, 'password' => $pass); //Validamos que el usuario esta en nuestra bd y su contraseña es correcta
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $this->db->where("(rol= 'A' OR rol = 'SU' OR rol = 'E')",NULL,FALSE);
        $query = $this->db->get()->result();
    
        if( ($query==true) ){
            $isValid = TRUE;
            
        }else{
            $isValid = FALSE;
        }

        return $this->buildobjsession($isValid,$this->db_user,$this->db_name,$this->db_tipo);
        
    }

    public function checkinourdbreset($user) {
        $isValid = FALSE;
        
        $this->db->select('*');
        $this->db->from('usuarios');
        //$array = array('username' => $user, 'estado' => '1'); //Validamos que el usuario esta en nuestra base de datos y que se encuentra activo
        $this->db->where('username',$user);
        $this->db->where('estado','1');
        $query = $this->db->get()->result();

        if( (count($query) > 0) ){
            $isValid = TRUE;

            $this->db_user = $query[0]->username;
            $this->db_name = $query[0]->nombre.' '.$query[0]->apaterno.' '.$query[0]->amaterno;
            $this->db_tipo = $query[0]->rol;
        }
        
        return $this->buildobjsession($isValid,$this->db_user,$this->db_name,$this->db_tipo);
    }
    
    public function checkinactivedirectoryreset($user,$pass){
        
        $this->db->select('*');
        $this->db->from('usuarios');
        //$array = array('username' => $user, 'password' => $pass); //Validamos que el usuario esta en nuestra bd y su contraseña es correcta
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $query = $this->db->get()->result();
    
        if( ($query==true) ){
            $isValid = TRUE;
            
        }else{
            $isValid = FALSE;
        }

        return $this->buildobjsession($isValid,$this->db_user,$this->db_name,$this->db_tipo);
        
    }
            
    private function buildobjsession($isValid,$user,$name,$tipo_user){
        $obj = new stdClass();
        $obj->valido=$isValid;
        $obj->user=$user;
        $obj->name=$name;
        $obj->tipo_user=$tipo_user;
        return $obj;
    }

    public function TablaSesiones($user,$tipo_user){

        date_default_timezone_set('America/Mexico_City');
        $fecha_hora_actual = date('Y-m-d H:i:s');

        $datossesion = array(
            'username' => $user,
            'rol' => $tipo_user, 
            'hora_ini_sesion' => $fecha_hora_actual,
            'origen' => 'WEB',
            'estado' => '1',
        );
        $this->db->insert('sesiones_activas', $datossesion);
    }

    public function CloseSession($user){

        date_default_timezone_set('America/Mexico_City');
        $fecha_hora_actual = date('Y-m-d H:i:s');

        $this->db->set('estado', '0');
        $this->db->set('hora_fin_sesion', $fecha_hora_actual);
        $array = array('username' => $user, 'estado' => '1'); //Validamos que el usuario esta en nuestra bd y su contraseña es correcta
        $this->db->where($array);
        $this->db->update('sesiones_activas');
    }

    public function UsuActivo($user){

        $this->db->select('*');
        $this->db->from('usuarios');
        $array = array('username' => $user,'estado' => '1'); //Validamos que el usuario sigue activo
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result();
    }

    public function ResetSesion($user){

        $this->db->set('estado', '0');
        $array = array('username' => $user, 'estado' => '1'); 
        $this->db->where($array);
        $this->db->update('sesiones_activas');
    }

    public function CheckUserE($user){

        $this->db->select('*');
        $this->db->from('usuarios');
        $array = array('username' => $user);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result(); 
    }
}
