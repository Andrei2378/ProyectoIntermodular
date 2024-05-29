<?php
include_once '../class/Productsclass.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : ""; //Obtenemos la accion

$productos = new Productsclass();

switch ($accion) {
    case "obtenerProductos":
        $obtenerProductos = $productos->obtenerProductos();

        if ($obtenerProductos) {
            echo json_encode(["resp" => true, "users" => $obtenerProductos]);
        } else {
            echo json_encode(["resp" => false, "message" => "no hay productos"]);
        }
        break;

    default:
        echo json_encode(["resp" => false, "message" => "Accion no valida"]);
        break;
}