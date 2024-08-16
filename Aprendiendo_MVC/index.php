
<h1>Bienvenido al curso de MVC</h1>
<?php


require_once 'CONTROLER/usuario.php';
//Instacia del Controlador del usuario:

// $controlador = new UsuarioController();
// $controlador->mostrarTodos();
// $controlador->crear();


if(isset($_GET['CONTROLER'])&& class_exists($_GET['CONTROLER'])){  //verifica si existe el controlador(ruta)

    $nombre_controlador = $_GET['CONTROLER']; 
    $controlador = new $nombre_controlador();

    if(isset($_GET['action'])&& method_exists($controlador,$_GET['action'])){
        $action=$_GET['action'];
        $controlador->$action();
    }else{
        echo 'La Pagina que busca no existe!';
    }

}else{
    echo 'La Pagina que busca no existe!';
}
