<?php
class Usuario {
    public $usuario;
    public $password;

    public function __construct($usuario, $password) {
        $this->usuario = $usuario;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}