<?php
interface IAuth {
    public function login($usuario, $password);
    public function registrar($usuario, $password);
}