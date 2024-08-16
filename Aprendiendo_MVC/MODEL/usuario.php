<?php


class Usuario{

//atributos:
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

// getters
function getNombre(){
    return $this->nombre;
}

function getApellidos(){
    return $this->apellidos;
}

function getEmail(){
    return $this->email;
}

function getPassword(){
    return $this->password;
}

//setters

function setNombre($nombre){
    $this->nombre= $nombre;
}

function setApellido($apellidos){
    $this->apellidos=$apellidos;

}

function setEmail($email){
    $this->email=$email;

}

function setPassword($password){
    $this->password=$password;

}

public function getAll(){
    return "Imprimiendo todos los Registros.";

}



}


