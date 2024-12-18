<?php
session_start();
include_once '../../class/ProductsClass.php';

$modeloProductos = new ProductsClass();
$search = isset($_GET['search']) ? $_GET['search'] : '';
$productos = $modeloProductos->listarProductos($search);

$dir = "../img/";
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Gardenia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/navadmin.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
</head>
<body class="d-flex flex-column h-100">
    <?php include('../../includes/adminnav.php'); ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Gestión de Productos</h2>

        <!-- Campo de búsqueda -->
        <form method="GET" action="">
            <div class="row mb-4">
                <div class="col-md-6 mx-auto">
                    <input type="text" name="search" id="searchInput" class="form-control"
                           placeholder="Buscar producto por nombre..."
                           value="<?= htmlspecialchars($search); ?>">
                </div>
            </div>
        </form>

        <!-- Botón para añadir un nuevo producto -->
        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <a href="./nuevoproducto.view.php" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-circle-plus"></i> Añadir Producto
                </a>
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle" id="productTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="w-50">Descripción</th>
                        <th scope="col" class="text-end">Precio</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" colspan="2" class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <form action="../../api/productos.php?accion=modificar" method="POST">
                            <tr>
                                <td class="text-center">
                                    <img src="<?= '../' . $producto['imagen'] . '?n=' . time(); ?>"
                                         alt="Imagen de <?= $producto['nombre']; ?>" class="img-fluid rounded shadow"
                                         style="max-width: 100px;">
                                </td>
                                <td>
                                    <input type="hidden" name="id_producto" value="<?= $producto['id_producto']; ?>">
                                    <input type="text" name="nombre" value="<?= $producto['nombre']; ?>"
                                           class="form-control form-control-sm" required>
                                </td>
                                <td>
                                    <textarea name="descripcion" rows="2" class="form-control form-control-sm"
                                              required><?= $producto['descripcion']; ?></textarea>
                                </td>
                                <td class="text-end">
                                    <input type="number" name="precio" value="<?= $producto['precio']; ?>"
                                           class="form-control form-control-sm text-end" step="0.01" min="0" required>
                                </td>
                                <td>
                                    <select name="id_categoria" class="form-select form-select-sm" required>
                                        <option selected value="<?= $producto['id_categoria']; ?>">
                                            <?= $producto['nombre_categoria']; ?></option>
                                        <option value="1">Herramientas</option>
                                        <option value="2">Abonos</option>
                                        <option value="4">Accesorios</option>
                                        <option value="5">Materiales</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i> Actualizar
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="../../api/productos.php?accion=eliminar&id=<?= $producto['id_producto']; ?>"
                                       class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('../../includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
