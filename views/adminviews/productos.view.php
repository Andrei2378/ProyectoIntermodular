<link rel="stylesheet" href="../../css/usuariosadmin.css">

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

<div class="container">
    <select name="" id="filtro">
        <option value="Fertilizantes">Fertilizantes</option>
        <option value="Accesorios">Accesorios</option>
        <option value="Herramientas de jardineria">Herramientas de jardineria</option>
        <option value="sustratos">Sustratos</option>
        <option value="Materiales de jardineria">Materiales de jardineria</option>
    </select>
</div>

<div class="container">
    <div class="row">

    </div>
</div>
<script src="" defer></script>

<?php
include '../../class/Productsclass.php';

$productos = new Productsclass();

$obtenerProductos = $productos->obtenerProductos();

echo '<div class="container">';
$contador = 0; // Contador para controlar las tarjetas por fila
foreach ($obtenerProductos as $producto) {
    // Abre una nueva fila después de cada tres tarjetas
    if ($contador % 3 == 0) {
        echo '<div class="row">';
    }
    if ($producto['imagen'] == null || $producto['imagen'] == "" || !$producto['imagen']) {
        $producto['imagen'] = "../../img/imagen_por_defecto.png";
    }
    echo '<div class="col-md-4 mb-3 producto" data-producto = "' . $producto['nombre_categoria'] . '">';
    echo '<div class="card m-4" >';
    echo '<img src="' . $producto["imagen"] . '" class="card-img-top" alt="' . $producto["nombre"] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
    echo '<p class="card-text">' . $producto["descripcion"] . '</p>';
    echo '<p class="card-text">Precio: $' . $producto["precio"] . '</p>';
    echo '<p class="card-text"> Categoria: ' . $producto["nombre_categoria"] . '</p>';
    echo '<div class="d-grid gap-2">';
    echo '<form method="POST" action="modificarproducto.view.php">';
    echo '<input type="hidden" name="id" value="' . $producto['id_producto'] . '" />';
    echo '<button class="btn btn-primary" type="submit" name="modificar">Modificar</button>';
    echo '</form>';
    echo '<form method="POST" action="">';
    echo '<input type="hidden" name="id" value="' . $producto['id_producto'] . '" />';
    echo '<button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>';
    echo '</form>';
    echo '</div>'; // Cierre de div.d-grid
    echo '</div>'; // Cierre de div.card-body
    echo '</div>'; // Cierre de div.card
    echo '</div>'; // Cierre de div.col-md-4

    // Cierra la fila después de cada tres tarjetas
    if ($contador % 3 == 2 || $contador == count($obtenerProductos) - 1) {
        echo '</div>'; // Cierre de div.row
    }

    $contador++;
}
echo '</div>'; // Cierre de div.container
?>

<script>
    document.getElementById("filtro").addEventListener("change", function (event) {
        let categoriaSeleccionada = event.target.value.toLowerCase();
        console.log(categoriaSeleccionada);
        let cards = document.querySelectorAll(".producto");

        cards.forEach(function (card) {

            let categoria = card.getAttribute("data-producto").toLowerCase();

            if (categoriaSeleccionada === "" || categoria.includes(categoriaSeleccionada)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });
    })
</script>