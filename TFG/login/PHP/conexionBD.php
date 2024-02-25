<?php
session_start();

$host = "localhost";
$bd = "jardin";
$user = "root";
$pass = "";

try {
    $conexion = new mysqli($host, $user, $pass, $bd);
} catch (Exception $e) { //Creo un objeto de tipo excepcion
    die("Error en la conexion: mensaje:" . $e->getMessage()); //Obtengo el mensaje de error con una funcion predefinida del objeto $e
    if ($conexion->connect_error) {
        die("Error en la conexion. Mensaje de error" . $conexion->connect_error);
    }
}

function consultaUsuario($log, $pass)
{
    global $conexion;
    $consulta = "SELECT * FROM usuarios WHERE nombre = ? AND pass = ?";
    $stmt = $conexion->prepare($consulta);

    $log = trim($log); //trim elimina los espacios de alrededor
    $pass = trim($pass);

    $pass_hash = hash('sha256', $pass);
    $stmt->bind_param('ss', $log, $pass_hash);

    try {
        $stmt->execute();
    } catch (Exception $ex) {
        die("Error al recuperar usuarios: " . $ex->getMessage());
    }

    $resultado = $stmt->get_result(); //store result
    $reg = $resultado->num_rows;
    if ($reg != 1) {
        header("Location: ../login/login.php");
    } else {
        $_SESSION['logeado'] = true;
        header("Location: ../Listado_Plantas/index.php");
    }
}

function cerrarConexion(&$conexion)
{
    $conexion->close();
}

function cerrarTodo(&$conexion, &$stmt)
{
    $conexion->close();
    $stmt->close();
}
