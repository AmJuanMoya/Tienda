<?php


class UsuarioController{
    public function mostrarTodos(){
        require_once 'MODEL/usuario.php';
        $usuario = new Usuario();
        $todosLosUsuarios = $usuario->getAll();
        require_once 'VIEW/usuarios/mostrar-todos.php';

    }


    public function crear(){
        require_once 'VIEW/usuarios/crear.php';

    }

}


