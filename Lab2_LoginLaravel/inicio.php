<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>

<h1>Bienvenido <?= $_SESSION["usuario"] ?></h1>
<a href="logout.php">Cerrar sesión</a>