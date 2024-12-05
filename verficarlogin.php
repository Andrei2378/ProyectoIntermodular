<?php
session_start();
include 'class/AuthClass.php';
if (isset($_POST['iniciar'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $auth = new AuthClass();
    if ($auth->verificarLogin($usuario, $pass)) {
        header('Location: /views/inicio.view.php');
    } else {
        //Le pasamos el error por un JSON
        // echo json_encode(["error" => "Error de inicio de sesión: Usuario o contraseña incorrectos."]);
        $_SESSION['error'] = "Error de inicio de sesión: Usuario o contraseña incorrectos.";
        header("Location: ./views/login.view.php");
    }
    $auth->cerrarConexion();
}
