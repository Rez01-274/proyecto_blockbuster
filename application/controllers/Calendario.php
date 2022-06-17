<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "BlockBuster";
        $data['pagecontent'] = "calendario/calendario";


       $data['clientes'] = $this->Query_Model->DatosClientesActivos();
        $this->loadpageintotemplate($data);

   }

   public function HorariosCliente(){

     $cliente = $this->input->post('cliente');
     $fecha1 = $this->input->post('fecha1');
     $fecha2 = $this->input->post('fecha2');
     $anio = $this->input->post('anio');
     $res = $this->Query_Model->HorariosPorCliente($cliente, $fecha1, $fecha2, $anio);
      echo json_encode($res);
   }


}
