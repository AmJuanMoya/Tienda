




<?php


class Pedido{
     private $id;
     private $usiarioId;
     private $ciudad;
     private $direccion;
     private $costo;
     private $estado;
     private $fecha;
     private $hora;

    private $db;

     public function __construct() {
        $this->db = Database::connect();


    }

    public function getId() {
        return $this->id;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

//Setters------------

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }




    public function save(){

        $sql = "INSERT INTO t_pedidos VALUES(NULL, '{$this->getUsuarioId}', '{$this->getCiudad}' '{$this->getDireccion}', '{$this->getCosto},'confirm', CURDATE(), CURDTIME() ); "
        //var_dump($sql);
        //die();
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }



}