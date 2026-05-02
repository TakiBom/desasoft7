<?php
session_start();
require_once "clases/Auth.php";

$auth = new Auth();
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["accion"] == "login") {

        if ($auth->login($_POST["usuario"], $_POST["password"])) {
            $_SESSION["usuario"] = $_POST["usuario"];
            header("Location: dashboard.php");
            exit();
        } else {
            $mensaje = $auth->getMensaje();
        }

    } else if ($_POST["accion"] == "registro") {

        if ($auth->registrar($_POST["usuario"], $_POST["password"], $_POST["email"])) {
            $mensaje = $auth->getMensaje();
        } else {
            $mensaje = $auth->getMensaje();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="estilos/global.css" />
    <link rel="stylesheet" href="estilos/auth-page.css" />

    <script type="module" src="components/custom-button.js"></script>
    <script type="module" src="components/custom-input.js"></script>
    <title>Login - Gestor de tarea</title>
  </head>

  <body>
        <img class="wave" src="imgs/wave.png">
    <div class="main-wrapper">
        <div class="img-container">
            <img src="imgs/avatar.png" alt="Avatar">
        </div>

        <div class="container" id="container">
        
        <div class="form-container sign-up">
            <form method="POST">
            <input type="hidden" name="accion" value="registro">
            <!-- seccion de resgitro de cuenta nueva -->
            <h1>Crear Cuenta</h1>
            <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <input name="usuario" type="text" placeholder="Nombre" />
            <input id="regEmail" type="email" placeholder="Correo electrónico" />
            <div class="input-group">
                <input name="password" type="password" placeholder="Contraseña" />
                <i id="togglePassReg" class="fa-solid fa-eye"></i>
            </div>
            <custom-button
                id="btnReg"
                label="Registrarse"
                bg-color="#6C5ECD"
                text-color="#FFFFFF"
                hover-color="#5948C0"
            ></custom-button>
            <p style="color:green;"><?= $mensaje ?></p>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
            <input type="hidden" name="accion" value="login">
            <!-- Seccion de Inicio de sesión -->
            <h1>Iniciar Sesión</h1>
            <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <input id="logEmail" name="usuario" type="text" placeholder="Usuario" />
            
            <div class="input-group">
                <input id="logPass" name="password" type="password" placeholder="Contraseña" />
                <i id="togglePassLog" class="fa-solid fa-eye"></i>
            </div>

            <a href="#">¿Olvidaste tu contraseña?</a>
            <custom-button
                id="btnLog"
                label="Iniciar Sesión"
                bg-color="#6C5ECD"
                text-color="#FFFFFF"
                hover-color="#5948C0"
            ></custom-button>
            <p style="color:red;"><?= $mensaje ?></p>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <span class="bubble"></span>
                <span class="bubble"></span>
            <div class="toggle-panel toggle-left">
                <h1>¿Ya tienes una cuenta creada?</h1>
                <p>Ingresa tus datos personales para usar todas las funciones del sitio</p>
                <custom-button
                id="login"
                label="Iniciar Sesión"
                bg-color="#FFFFFF"
                text-color="#6C5ECD"
                hover-color="#EDEBFA"
                class-style="hidden"
                ></custom-button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>¿No tienes cuenta?</h1>
                <p>Regístrate con tus datos personales para usar todas las funciones del sitio</p>
                <custom-button id="register" label="Registrarse" class-style="hidden"></custom-button>
            </div>
            </div>
        </div>
        </div>
</div>
        <script src="scripts/script.js"></script>
    </body>
</html>