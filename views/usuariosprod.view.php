<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/plantas.css" />
    <h1>Listado de Productos</h1>
    <nav id="menuPrincipal" class="menu-principal">
        <ul class="menu-lista">
            <li class="menu-item"><a href="inicio.view.php" class="menu-link">Inicio</a></li>
            <li class="menu-item"><a href="plantas.view.php" class="menu-link">Plantas</a></li>
            <li class="menu-item"><a href="usuariosprod.view.php" class="menu-link">Productos</a></li>
            <li class="menu-item"><a href="../logout.php" class="menu-link"><svg xmlns="http://www.w3.org/2000/svg"
                        width="30" height="30.029296875" viewBox="0 0 1024 1025">
                        <path fill="#000000"
                            d="M896 1025H448q-53 0-90.5-37.5T320 897v-64q0-27 18.5-45.5t45-18.5t45.5 18.5t19 45t18.5 45.5t45.5 19h256q26 0 45-19t19-45V192q0-26-19-45t-45-19H512q-27 0-45.5 19T448 192.5T429 238t-45.5 19t-45-19t-18.5-46v-64q0-53 37.5-90.5T448 0h448q53 0 90.5 37.5T1024 128v769q0 53-37.5 90.5T896 1025M704 384q26 0 45 19t19 45v129q0 26-19 45t-45 19H256v101q0 11-13.5 19t-32 7t-29.5-12L18 556Q0 538 0 512.5T18 469l163-200q11-11 29.5-11.5t32 7.5t13.5 20v99z" />
                    </svg></a></li>
        </ul>
    </nav>

</header>
<?php
include '../class/Productsclass.php';

$productos = new Productsclass();

$obtenerProductos = $productos->obtenerProductos();

echo '<div class="container">';
$contador = 0; // Contador para controlar las tarjetas por fila
foreach ($obtenerProductos as $producto) {
    // Abre una nueva fila después de cada tres tarjetas
    if ($contador % 3 == 0) {
        echo '<div class="row">';
    }
    //Si la imagen no existe o está cargada mal, pondrá una imagen por defecto
    if ($producto['imagen'] == null || $producto['imagen'] == "" || !$producto['imagen']) {
        $producto['imagen'] = "../img/imagen_por_defecto.png";
    }
    echo '<div class="col-md-4 mb-3">';
    echo '<div class="card m-4" >';
    echo '<img src="' . $producto["imagen"] . '" class="card-img-top" alt="' . $producto["nombre"] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
    echo '<p class="card-text">' . $producto["descripcion"] . '</p>';
    echo '<p class="card-text">Precio: $' . $producto["precio"] . '</p>';
    echo '<p class="card-text">Categoría: ' . $producto["nombre_categoria"] . '</p>';
    echo '<div class="d-grid gap-2">';
    echo '<button class="btn btn-success">Comprar!</button>';
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


