<?php

include '../../class/Productsclass.php';

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $producto = new Productsclass();

    $obtenerproducto = $producto->productPorId($id);
    echo '<table border = "1">';
    echo '<tr>';
    echo '<th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Imagen</th>
    <th>Categoria</th>'
    ;
    echo '</tr>';
    foreach ($obtenerproducto as $producto) {
        echo '<tr>';
        echo '<td><input name="nombre" type="text" value = "' . $producto["nombre"] . '" /></td>';
        echo '<td><input name="descripcion" type="text" value = "' . $producto["descripcion"] . '" /></td>';
        echo '<td><input name="precio" type="number" value = "' . $producto["precio"] . '" /></td>';
        echo '<td><input name="imagen" type="file" value = "' . $producto["imagen"] . '" /></td>';
        echo '<td><input name="nombre_categoria" type="text" value = "' . $producto["nombre_categoria"] . '" /></td>';
        echo '<td><input name="guardar" type="submit" value ="guardar" /></td>';
        echo '</tr>';
    }

    echo '</table>';
}