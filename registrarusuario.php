<?php
include 'Class/Authclass.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $usuario = $_POST['usuario'];
    $email = $_POST['correo'];
    $dni = $_POST['DNI']; 
    $direccion = $_POST['direccion'];
    $poblacion = $_POST['poblacion'];
    $provincia = $_POST['provincia']; 
    $codigoPostal = $_POST['CP'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
   
    if ($pass !== $rpass) {
        echo "Las contraseñas no coinciden.";
        exit;
    }
    
    $auth = new Authclass();
    $registroExitoso = $auth->registrarUsuario($usuario, $email, $pass, $direccion, $poblacion, $provincia, $codigoPostal);

    if ($registroExitoso) {
        header('Location: /views/login.view.php');
    } else {
        header('Location: /views/register.view.php');
    }
}
?>
