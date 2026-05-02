<?php
require_once "IAuth.php";
require_once "AuthBase.php";
require_once "Usuario.php";

class Auth extends AuthBase implements IAuth {

    private $archivo = __DIR__ . "/../data/usuarios.json";

    private function leerUsuarios() {
        if (!file_exists($this->archivo)) {
            return [];
        }
        return json_decode(file_get_contents($this->archivo), true);
    }

    private function guardarUsuarios($usuarios) {
        file_put_contents($this->archivo, json_encode($usuarios, JSON_PRETTY_PRINT));
    }

    public function registrar($usuario, $password) {

        if (!$this->validarCampos($usuario, $password)) return false;

        $usuarios = $this->leerUsuarios();

        foreach ($usuarios as $u) {
            if ($u['usuario'] === $usuario) {
                $this->mensaje = "El usuario ya existe.";
                return false;
            }
        }

        $nuevo = new Usuario($usuario, $password);

        $usuarios[] = [
            "usuario" => $nuevo->usuario,
            "password" => $nuevo->password
        ];

        $this->guardarUsuarios($usuarios);

        $this->mensaje = "Registro exitoso.";
        return true;
    }

    public function login($usuario, $password) {

        if (!$this->validarCampos($usuario, $password)) return false;

        $usuarios = $this->leerUsuarios();

        foreach ($usuarios as $u) {
            if ($u['usuario'] === $usuario &&
                password_verify($password, $u['password'])) {

                $this->mensaje = "Login exitoso.";
                return true;
            }
        }

        $this->mensaje = "Usuario o contraseña incorrectos.";
        return false;
    }
}