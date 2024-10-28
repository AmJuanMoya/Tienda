<?php

require_once 'models/pedido.php';

class pedidoController{

    public function hacer(){
        require_once 'views/pedido/hacer.php';

    }

 
    
    public function add(){
        if (isset($_SESSION['identity'])) {

            //var_dump($_SESSION);
            //die();

            $usuarioId = $_SESSION['identity']->id_usuario;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:false;
            $direccion = isset($_POST['direccion']) ?  $_POST['direccion']:false;
            $stats = Utils::stadisticCarrito();
            $costo = $stats['total'];

           
            if($ciudad &&  $direccion ){
                $pedido = new Pedido();
                
                $pedido->setUsuarioId($usuarioId);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCosto($costo);
                

                $save = $pedido->save();

                if($save){
                    $_SESSION['pedido'] = 'complete';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }
 
            }


        }
    }


}