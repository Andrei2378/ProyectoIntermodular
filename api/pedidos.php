<?php
include_once '../class/PedidosClass.php';

$pedidos_Class = new PedidosClass();

$pedidos = $pedidos_Class->obtenerPedidos();


if ($pedidos) {
    echo json_encode(["resp" => true, "users" => $pedidos]);
} else {
    echo json_encode(["resp" => false, "message" => "no hay pedidos"]);
}


?>