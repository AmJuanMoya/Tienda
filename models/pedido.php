<?php

class Pedido{
    private $id;
    private $usuarioId;
    private $ciudad;
    private $direccion;
    private $costo;
    private $estado;
    private $fecha;
    private $hora;


    private $db;

    public function __construct()
    {
     $this->db = Database::connect(); 
    }

    function getId(){
        return $this->id;
    }

    function getUsuarioId(){
        return $this->usuarioId;
    }

    function getciudad(){
        return $this->ciudad;
    }

    function getDireccion(){
        return $this->direccion;
    }
    
    
    function getCosto(){
        return $this->costo;
    }

    function getEstado(){
        return $this->estado;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getHora(){
        return $this->hora;
    }


    function setId($id){
        $this->id = $id;
    }

    function setUsuarioId($usuarioId){
        $this->usuarioId = $usuarioId;
    }

    function setCiudad($ciudad){
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    
    
    function setCosto($costo){
        $this->costo = $costo;
    }

    function setEstado($estado){
        $this->estado = $estado;
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }

    function setHora($hora){
        $this->hora = $hora;
    }



    public function getAll(){
        $pedidos = $this->db->query("SELECT * FROM t_pedidos ORDER by id_pedido DESC");
        return $pedidos;
    }



    public function getOne(){
        $pedido = $this->db->query("SELECT * FROM t_pedidos WHERE id_pedido = {$this->getId()}");
        return $pedido->fetch_object();
    }


    public function getOneByUser(){
        $sql = "SELECT id_pedido, costo FROM t_pedidos "
                ."WHERE id_usuario = {$this->getUsuarioId()} ORDER BY id_pedido DESC LIMIT 1";

        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }



    public function getAllByUser(){
        $sql = "SELECT p.* FROM t_pedidos p "
                ."WHERE id_usuario = {$this->getUsuarioId()} ORDER BY id_pedido DESC";

        $pedido = $this->db->query($sql);
        return $pedido;
    }




    public function getProductosByPedido($id){

        $sql = "SELECT pr.*, lp.unidades FROM t_productos pr "
                . "INNER JOIN  t_lineaspedidos lp ON pr.id_producto = lp.id_producto "
                . "WHERE lp.id_pedido = {$id}";

        $productos = $this->db->query($sql);
        
        return $productos;
    }   


    public function save(){
       
        $sql = "INSERT INTO t_pedidos VALUES(NULL, '{$this->getUsuarioId()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getCosto()}, 'confirm',CURDATE() , CURTIME());";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
		$sql = "UPDATE t_pedidos SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id_pedido={$this->getid()};";

		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';"; //me trae el campo id de la ultima consulta hecha
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        //insertar en la tabla linea pedido 


        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];

            $insert = "INSERT INTO t_lineaspedidos VALUE(NULL,{$pedido_id},{$producto->id_producto},{$elemento['unidades']})";
            $save = $this->db->query($insert);

            
            // var_dump($producto);
            // var_dump($insert);
            // $this->db->error;
            // die();
        }
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
        

        // var_dump($pedido_id);


    }


}
