<?php
require_once "clases/Auth.php";

$auth = new Auth();
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($auth->registrar($_POST["usuario"], $_POST["password"])) {
        $mensaje = $auth->getMensaje();
    } else {
        $mensaje = $auth->getMensaje();
    }
}
?>

<form method="POST">
    <h2>Registro</h2>
    <input type="text" name="usuario"><br>
    <input type="password" name="password"><br>
    <button type="submit">Registrar</button>
    <p><?= $mensaje ?></p>
</form>