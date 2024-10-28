<?php

class Producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $id_categoria;

    private $db;

    public function __construct()
    {
     $this->db = Database::connect(); 
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function getPrecio(){
        return $this->precio;
    }
    
    
    function getStock(){
        return $this->stock;
    }

    function getOferta(){
        return $this->oferta;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getImagen(){
        return $this->imagen;
    }

    function getIdCategoria(){
        return $this->id_categoria;
    }    

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }
    
    
    function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }

    function setImagen($imagen){
        $this->imagen = $imagen;
    }

    function setIdCategoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM t_productos ORDER by id_producto DESC");
        return $productos;
    }

    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre_categoria FROM t_productos p "
            . "INNER JOIN t_categorias c ON c.id_categoria = p.id_Categoria " 
            . "WHERE p.id_categoria = {$this->getIdCategoria()} "
            . "ORDER by id_categoria DESC";
        $productos = $this->db->query($sql);
        return $productos;        
    }


    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM t_productos ORDER BY  Rand() LIMIT $limit");
        return $productos;
    }



    public function getOne(){
        $producto = $this->db->query("SELECT * FROM t_productos WHERE id_producto = {$this->getId()}");
        return $producto->fetch_object();
    }



    public function save(){
       
        $sql = "INSERT INTO t_productos VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', '',CURDATE() , '{$this->getImagen()}' , {$this->getIdCategoria()});";

        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }


    public function edit(){
		$sql = "UPDATE t_productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()},  oferta='{$this->getOferta()}',id_categoria={$this->getIdCategoria()}  ";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id_producto={$this->id};";

		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

    public function delete(){
        $sql = "DELETE FROM t_productos WHERE id_producto={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

}
