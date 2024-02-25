<?php

include 'class/Productsclass.php';

if(isset($_POST['modificar'])){
    $id = $_POST['id'];

    $producto = new Productsclass();

    $res = $producto->modificarProductos($id);

    if($res){
        header('Location: views/adminviews/productos.view.php');
    }
}