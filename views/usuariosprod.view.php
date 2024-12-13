<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navuser.css" />

    <style>
        .imagen_producto{
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
    </style>
</header>
<?php
include '../class/ProductsClass.php';
include '../includes/usernav.php';

$productos = new ProductsClass();

$cat = $_GET['cat'];
$pag = $_GET['pag'];
$limite = 6;
$desplazamiento = ($pag - 1) * $limite;
$totalProductos = count($productos->obtenerProductos($cat, PHP_INT_MAX, 0));
$totalPag = ceil($totalProductos / $limite);

$obtenerProductos = $productos->obtenerProductos($cat, $limite, $desplazamiento);
if (isset($_GET['resp'])) {
    echo '<div class="container mt-3">';
    echo "<div class='alert alert-info'>Producto agregado correctamente!</div>";
    echo "</div>";
}
echo '<div class="container mt-3">';
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
    echo '<div class="card h-80">'; // Añadido h-100 para asegurar altura uniforme
    echo '<div class="card-cover overflow-hidden border-2 h-25" style="background-image: url("' . $producto['imagen'] . '");background-repeat: no-repeat;">';
    echo '<img src="' . $producto["imagen"] . '" class=" imagen_producto card-img-top" alt="' . $producto["nombre"] . '">'; //../img/pala_jardineria.png
    echo '</div>';
    echo '<div class="card-body">';
    echo '<h5 class="card-title h-10">' . $producto["nombre"] . '</h5>';
    echo '<p class="card-text h-10">' . $producto["descripcion"] . '</p>';
    echo '<p class="card-text h-10"><strong>Precio:</strong> ' . $producto["precio"] . '€</p>';
    echo '<p class="card-text h-10"><strong>Categoría:</strong> ' . $producto["nombre_categoria"] . '</p>';
    echo '</div>'; // Cierre de div.card-body
    echo '<div class="card-footer h-10">'; // Añadido un footer para separar el botón
    echo '<div class="d-grid gap-2">';
    echo '<a class="btn btn-success" href="../api/carrito.php?id_producto=' . $producto["id_producto"] . '&cat=' . $cat . '&accion=agregarProducto">Añadir al carrito</a>';
    echo '</div>'; // Cierre de div.d-grid
    echo '</div>'; // Cierre de div.card-footer
    echo '</div>'; // Cierre de div.card
    echo '</div>'; // Cierre de div.col-md-4


    // Cierra la fila después de cada tres tarjetas
    if ($contador % 3 == 2 || $contador == count($obtenerProductos) - 1) {
        echo '</div>'; // Cierre de div.row
    }

    $contador++;
}
echo '</div>'; // Cierre de div.container

echo '<div class="container mb-5">';
echo '<nav class= "">';
echo '<ul class= "pagination justify-content-center">';
if ($pag > 1) {
    echo '<li class="page-item">';
    echo '<a class="btn btn-outline-secondary" href="?cat=' . $cat . '&pag=' . ($pag - 1) . '">Anterior</a>';
    echo '</li>';
}

for ($i = 1; $i <= $totalPag; $i++) {
    $activo = ($i == $pag) ? 'class = "active"' : '';
    echo '<li class="page-item">';
    echo '<a class="page-link" href="?cat=' . $cat . '&pag=' . $i . '" ' . $activo . '>' . $i . '</a>';
    echo '</li>';
}

if ($pag < $totalPag) {
    echo '<li class="page-item">';
    echo '<a class="btn btn-outline-secondary" href="?cat=' . $cat . '&pag=' . ($pag + 1) . '">Siguiente</a>';
    echo '</li>';
}
echo '</ul>';
echo '</nav>';
echo '</div>';

include('../includes/footer.php');

