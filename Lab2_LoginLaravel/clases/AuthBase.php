<?php
abstract class AuthBase {

    protected $mensaje = "";

    public function getMensaje() {
        return $this->mensaje;
    }

    protected function validarCampos($usuario, $password) {
        if (empty($usuario) || empty($password)) {
            $this->mensaje = "Todos los campos son obligatorios.";
            return false;
        }
        return true;
    }

    // Métodos abstractos (obligan a implementarlos)
    abstract public function login($usuario, $password);
    abstract public function registrar($usuario, $password);
}