<?php
session_start();
include_once '../class/ConexionMysqli.php';
include_once '../class/CarritoClass.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : ""; //Obtenemos la accion

$carrito = new CarritoClass();
$idUsuario = $_SESSION['idUsuario'];
switch ($accion) {

    case "agregarProducto":
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $idProducto = $_GET['id_producto'];
            $cat = $_GET['cat'];
            echo "idUsuario " . $idUsuario;
            echo "<br/>";
            echo "idProducto " . $idProducto;
            $resultado = $carrito->agregarProducto($idProducto, $idUsuario, 1);
            if ($resultado) {
                header('Location: ../views/usuariosprod.view.php?cat=' . $cat . '&resp=1&pag=1');
                exit();
            }
        }
        break;

    case "eliminarProducto":
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $idProducto = $_GET['idProducto'];
            $resultado = $carrito->eliminarProducto($idProducto, $idUsuario);
            if ($resultado) {
                header("Location: ../views/carrito.view.php");
            }
        }
        break;

    case "modificarCantidad":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idCarrito = $_POST['id_carrito'];
            $cantidad = $_POST['cantidad'];
            $resultado = $carrito->modificarCantidad($idCarrito, $cantidad);
            if ($resultado) {
                header("Location: ../views/carrito.view.php");
            }
        }
        break;

    case "vaciarCarrito":
        $idUsuario = $_SESSION['idUsuario'];
        $resultado = $carrito->vaciarCarrito($idUsuario); // Método para vaciar el carrito
        if ($resultado) {
            header('Location: ../views/inicio.view.php'); // Redirige a una página indicando que el carrito está vacío
            exit();
        }
        break;


}


function obtenerProductos($idUsuario)
{
    $carrito = new CarritoClass();
    return $carrito->obtenerProductos($idUsuario);
}

function obtenerTotal($idUsuario)
{
    $carrito = new CarritoClass();
    $salida = $carrito->calcularTotal($idUsuario);
    return $salida["total"];
}

function cantidadProductos($idUsuario)
{
    $carrito = new CarritoClass();
    $salida = $carrito->contarProductos($idUsuario);
    if (is_null($salida['total_cantidad'])) {
        return 0;
    }else{
        return $salida['total_cantidad'];
    }
}

?>