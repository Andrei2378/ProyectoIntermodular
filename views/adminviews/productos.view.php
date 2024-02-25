<?php
include '../../class/Productsclass.php';

$productos = new Productsclass();

$obtenerProductos = $productos->obtenerProductos();
//var_dump($obtenerProductos);
echo '<table border = "1">';
echo '<tr>';
echo '<th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Imagen</th>
    <th>Categoria</th>
    <th>Acciones</th>'
;
echo '</tr>';
foreach ($obtenerProductos as $producto) {
    echo '<tr>';
    echo '<td>' . $producto["nombre"] . '</td>';
    echo '<td>' . $producto["descripcion"] . '</td>';
    echo '<td>' . $producto["precio"] . '</td>';
    echo '<td> <img src ="' . $producto["imagen"] . '"></td>';
    echo '<td>' . $producto["nombre_categoria"] . '</td>';
    echo '<td>';
    echo '<div>
            <form method ="POST" action = "modificarproducto.view.php">
                <input type="hidden" name="id" value="' . $producto['id_producto'] . ' " />
                <input type="submit" name="modificar" value="modificar" />
            </form>
            <form method ="POST" action = "">
                <input type="hidden" name="id" value="' . $producto['id_producto'] . ' " />
                <input type="submit" name="eliminar" value="eliminar" />
            </form>
        </div>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';

