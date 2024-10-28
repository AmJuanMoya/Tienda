<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        

        require_once 'views/categoria/index.php';
    }

    public function ver(){
        #comprobamos si viene categoria
        #que viene del menu en header.php
        if(isset($_GET['id'])){
            $id = ($_GET['id']);
                        
            //Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
           
            //Conseguir productos
            $producto = new Producto();
            $producto->setIdCategoria($id);
            $productos = $producto->getAllCategory();

        }

        require_once 'views/categoria/ver.php';
    }    
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){

        Utils::isAdmin();
        if(isset($_POST)){
            // var_dump($_POST);
            // die();
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;

            //guardar la categoria en bdatos
            $categoria = new Categoria();

            $categoria->setNombre($nombre);

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $categoria->setId($id);
                $save = $categoria->edit();
            }else{
                $save = $categoria->save();
            }


        }
        header("Location:".base_url."categoria/index");
    }



    public function editar(){
		Utils::isAdmin();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categoria = new Categoria();
			$categoria->setId($id);
          
			$cat = $categoria->getOne();
			
			require_once 'views/categoria/crear.php';
			
		}else{
			header('Location:'.base_url.'categoria/index');
		}
	}

    public function eliminar(){
        // var_dump($_GET);
        // die();
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);

            $delete = $categoria->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'categoria/index');            

    }

}