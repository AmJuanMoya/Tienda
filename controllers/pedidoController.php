<?php

class pedidoController{

    public function hacer(){
        require_once 'views/pedido/hacer.php'

    }

 
    
    public function add(){
        if (isset($_SESSION['identity'])) {
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:false;
            $direccon = isset($_POST['direccion']) ?  $_POST['direccion']:false;

            if($ciudad &&  $direccion ){
                $pedido = new Pedido();
                $usuario = $_SESSION['identity']->id_usuario;

                //var_dump();
            }



    }


}