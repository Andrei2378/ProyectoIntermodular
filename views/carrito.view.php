<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/inicio.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Carrito</title>
</head>

<body>
    <?php include('../includes/usernav.php'); ?>
    <?php
    include_once '../api/carrito.php';
    $idUsuario = $_SESSION['idUsuario'];
    $productos = obtenerProductos($idUsuario);
    $total = obtenerTotal($idUsuario); // Llamamos a la función obtenerTotal()
    ?>
    <main class="container my-5">
        <h2 class="text-center mb-4">Carrito de Compras</h2>
        <?php if (!empty($productos)): ?>
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>"
                                    style="width: 70px; height: 70px; object-fit: cover;">
                            </td>
                            <td><?= $producto['nombre'] ?></td>
                            <td><?= number_format($producto['precio'], 2) ?> €</td>
                            <td>
                                <form action="../api/carrito.php?accion=modificarCantidad" method="POST"
                                    class="d-flex justify-content-center align-items-center">
                                    <input type="hidden" name="id_carrito" value="<?= $producto['id_carrito']; ?>">
                                    <input type="number" name="cantidad" value="<?= $producto['cantidad']; ?>"
                                        class="form-control form-control-sm me-2" style="width: 70px;" min="1">
                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                </form>
                            </td>
                            <td><?= number_format($producto['subtotal'], 2) ?> €</td>
                            <td class="text-center">
                                <a href="../api/carrito.php?accion=eliminarProducto&idProducto=<?= $producto['id_producto'] . '&idUsuario=' . $idUsuario ?>"
                                    class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total:</td>
                        <td colspan="2" class="text-start fw-bold"><?= number_format($total, 2) ?> €</td>


                    </tr>
                </tfoot>
            </table>
            <tr>
                <td colspan="6" class="text-center">
                    <a style="display:flex; float:right;" href="./checkout.view.php" class="btn btn-success btn-lg">Realizar
                        Pago</a>
                </td>
            </tr>
        <?php else: ?>
            <p class="text-center text-muted">Tu carrito está vacío. ¡Añade productos para continuar!</p>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>