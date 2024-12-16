<link rel="stylesheet" href="../../css/usuariosadmin.css">
<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.view.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="productos.view.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.view.php">Usuario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php

include '../../class/ProductsClass.php';

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $producto = new ProductsClass();

    $obtenerproducto = $producto->productPorId($id);
    echo '<div class="container">';
    $contador = 0; // Contador para controlar el número de tarjetas por fila

    foreach ($obtenerproducto as $producto) {
        if ($contador % 3 == 0) {
            // Si es el primer producto de la fila, abrir un nuevo row
            echo '<div class="row">';
        }

        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
        echo '<p class="card-text">' . $producto["descripcion"] . '</p>';
        echo '<p class="card-text">Precio: ' . $producto["precio"] . '</p>';
        echo '<p class="card-text">Categoría: ' . $producto["nombre_categoria"] . '</p>';
        echo '<input name="imagen" type="file" class="form-control" value="' . $producto["imagen"] . '">';
        echo '</div>'; // Cierre de div.card-body
        echo '</div>'; // Cierre de div.card
        echo '</div>'; // Cierre de div.col-md-4

        $contador++;

        if ($contador % 3 == 0) {
            // Si es el último producto de la fila, cerrar el row
            echo '</div>'; // Cierre de div.row
        }
    }

    // Comprobar si falta cerrar el último row
    if ($contador % 3 != 0) {
        echo '</div>'; // Cierre de div.row
    }

    echo '<div>';
    if($pag > 1){
        echo '<a href=""></a>';
    }
    echo '</div>';

    echo '</div>'; // Cierre de div.container

}