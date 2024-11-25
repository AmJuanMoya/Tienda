<?php

require_once 'models/pedido.php';

class pedidoController{

    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){

        if(isset($_SESSION['identity'])){

            $usuarioId = $_SESSION['identity']->id_usuario;

            //verificar los datos llegados por POST
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion']:false;

            $stats = Utils::stadisticCarrito();
            $costo = $stats['total'];

            if($ciudad && $direccion){

                //guardar datos pedido
                $pedido = new Pedido();

                $pedido->setUsuarioId($usuarioId);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCosto($costo);

                //var_dump($usuarioId);
                //var_dump($pedido);

                //guardar datos
                $save = $pedido->save();

                //guardar linea pedido
                $save_linea = $pedido->save_linea();


                if($save && $save_linea){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }   

            header("Location:".base_url.'pedido/confirmado');

        }else{
            //redirigir al index
            header('Location:'.base_url);
        }
    }

    public function confirmado(){

        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuarioId(($identity->id_usuario));

            $pedido = $pedido->getOneByUser();


            $pedido_productos = new Pedido();
            $productos = $pedido_productos-> getProductosByPedido($pedido->id_pedido);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id_usuario;

        $pedido = new Pedido();

        $pedido->setUsuarioId($usuario_id);

        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function detalle(){
        Utils::isIdentity();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //sacar los datos del pedido
            $pedido = new Pedido();
            $pedido->setId($id);

            $pedido = $pedido->getOne();

            //sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        }else{
            header('Location:'.base_url.'pedidos/mis_pedidos');
        }

    }

    public function gestion(){
        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';


    }
    
    public function estado(){
        utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // var_dump($_POST);
            // die();

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header('Location:'.base_url. 'pedido/detalle&id='.$id);
        }else{
            header('Location:'.base_url);
        }
    }

}