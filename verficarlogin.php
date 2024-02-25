<?php
include 'Class/Authclass.php';
if (isset($_POST['iniciar'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];  

    $auth = new Authclass();
    if ($auth->verificarLogin($usuario, $pass)) {
        header('Location: /views/plantas.view.php');
    } else {
        echo "Error de inicio de sesión: Usuario o contraseña incorrectos.";
    }
    $auth->cerrarConexion();
}

