<?php

class Query_Model extends CI_Model{

 /* =============================================================================================================================================================================================================================== */


/* =============================================================================================================================================================================================================================== */


/* =============================================================================================================================================================================================================================== */



/* START - CONTROLLER: Dashboard */



/* END - CONTROLLER: Dashboard */

/* START - CONTROLLER: Usuarios */

function InsertUsuario($datosusuario){
    $this->db->insert('usuarios',$datosusuario);
}
function GetUserByName($usuario){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('username',$usuario);
    $query = $this->db->get();
    return $query->result();
}

function DatosUsuario(){

    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where("(rol= 'A' OR rol = 'E')",NULL,FALSE);
    $this->db->where("(estado = '1')",NULL,FALSE);
    $query = $this->db->get();
    return $query->result();
}

function GetUserById($id){

    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('id_usuario',$id);
    $query = $this->db->get();
    return $query->result();

}

function UpdateUsuario($id,$datosusuario){

    $this->db->where('id_usuario',$id);
    $this->db->update('usuarios',$datosusuario);

}

function DeleteUsuario($id, $datosusuario){

    $this->db->where('id_usuario',$id);
    $this->db->update('usuarios', $datosusuario);

}


/* END - CONTROLLER: Usuarios */


/* START - CONTROLLER: Horarios */

function HorariosPorCliente($cliente, $fecha1, $fecha2, $anio){

$query = $this->db->query("SELECT * FROM horarios WHERE horarios.cliente = '$cliente' AND DATE(
  horarios.fecha_operacion) BETWEEN '$fecha1' AND '$fecha2'");
return $query->result();

}

/* END - CONTROLLER: Horarios */


/* START - CONTROLLER: Clientes */

function DatosClientes(){

    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->where("(estado = '1')",NULL,FALSE);
    $query = $this->db->get();
    return $query->result();
}

function DatosClientesActivos(){

    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->where("(estado = '1')",NULL,FALSE);
    $query = $this->db->get();
    return $query->result();
}

function InsertClient($datoscliente){

    $this->db->insert('clientes', $datoscliente);
}

function GetClientById($id){

    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->where('id_cliente',$id);
    $query = $this->db->get();
    return $query->result();

}

function UpdateClientes($id, $datoscliente){

    $this->db->where('id_cliente',$id);
    $this->db->update('clientes', $datoscliente);

}

function DeleteClientes($id, $datoscliente){

    $this->db->where('id_cliente',$id);
    $this->db->update('clientes', $datoscliente);

}

/* END - CONTROLLER: clientes */

}
