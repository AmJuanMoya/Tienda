<?php

    class Categoria{
        private $id;
        private $nombre;

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

        function setId($id){
            $this->id = $id;
        }
    
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }  



        public function getAll(){
            $categorias = $this->db->query("SELECT * FROM t_categorias ORDER BY id_categoria DESC;");
            return $categorias;

           
        }

        
        public function getOne(){
            $categoria = $this->db->query("SELECT * FROM t_categorias WHERE id_categoria={$this->getId()};");
            return $categoria->fetch_object();       
        }
        
        public function save(){
            $sql = "INSERT INTO t_categorias VALUES(NULL, '{$this->getNombre()}');" ;      
            
    
    
            $save = $this->db->query($sql);
    
            
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function edit(){
            $sql = "UPDATE t_categorias SET nombre='{$this->getNombre()}'";
            
            $sql .= " WHERE id_categoria={$this->id};";
    
            $save = $this->db->query($sql);
            
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }
    
        public function delete(){
            $sql = "DELETE FROM t_categorias WHERE id_categoria={$this->id}";
            $delete = $this->db->query($sql);
    
            $result = false;
            if($delete){
                $result = true;
            }
            return $result;
        }




    }