<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navuser.css" />
    <style>
        .imagen_producto {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .card {
            height: 100%;
        }
        .card-body, .card-footer {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">'; // Clases de Bootstrap para diseño responsivo

foreach ($obtenerProductos as $producto) {
    // Si la imagen no existe o está cargada mal, pondrá una imagen por defecto
    if ($producto['imagen'] == null || $producto['imagen'] == "" || !$producto['imagen']) {
        $producto['imagen'] = "../img/imagen_por_defecto.png";
    }

    echo '<div class="col">';
    echo '<div class="card h-100">'; // h-100 asegura altura uniforme
    echo '<img src="' . $producto["imagen"] . '" class="imagen_producto card-img-top" alt="' . $producto["nombre"] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
    echo '<p class="card-text">' . $producto["descripcion"] . '</p>';
    echo '<p class="card-text"><strong>Precio:</strong> ' . $producto["precio"] . '€</p>';
    echo '<p class="card-text"><strong>Categoría:</strong> ' . $producto["nombre_categoria"] . '</p>';
    echo '</div>'; // Cierre de div.card-body
    echo '<div class="card-footer">';
    echo '<a class="btn btn-success w-100" href="../api/carrito.php?id_producto=' . $producto["id_producto"] . '&cat=' . $cat . '&accion=agregarProducto">Añadir al carrito</a>';
    echo '</div>'; // Cierre de div.card-footer
    echo '</div>'; // Cierre de div.card
    echo '</div>'; // Cierre de div.col
}

echo '</div>'; // Cierre de div.row
echo '</div>'; // Cierre de div.container

// Navegación de páginas
echo '<div class="container mt-3 mb-3">';
echo '<nav>';
echo '<ul class="pagination justify-content-center">';
if ($pag > 1) {
    echo '<li class="page-item">';
    echo '<a class="btn btn-outline-secondary" href="?cat=' . $cat . '&pag=' . ($pag - 1) . '">Anterior</a>';
    echo '</li>';
}

for ($i = 1; $i <= $totalPag; $i++) {
    $activo = ($i == $pag) ? 'active' : '';
    echo '<li class="page-item ' . $activo . '">';
    echo '<a class="page-link" href="?cat=' . $cat . '&pag=' . $i . '">' . $i . '</a>';
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
?>
