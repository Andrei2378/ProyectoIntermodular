<?php
require '../api/carrito.php';
$idUsuario = $_SESSION['idUsuario'];
?>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo y nombre de la tienda -->
        <a class="navbar-brand" href="#">
            <img src="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" alt="Logo" />
            Tienda de Jardinería
        </a>

        <!-- Menú centrado -->
        <div class="d-flex justify-content-center flex-grow-1">
            <ul class="navbar-nav mx-auto fs-5">
                <li class="nav-item">
                    <a class="nav-link text-light" href="../views/plantas.view.php">Plantas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../views/usuariosprod.view.php?cat=Abonos&pag=1">Abonos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light"
                        href="../views/usuariosprod.view.php?cat=Herramientas&pag=1">Herramientas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light"
                        href="../views/usuariosprod.view.php?cat=Accesorios&pag=1">Accesorios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light"
                        href="../views/usuariosprod.view.php?cat=Materiales&pag=1">Materiales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../views/servicios.view.php">Servicios</a>
                </li>
            </ul>
        </div>

        <!-- Íconos a la derecha -->
        <ul class="navbar-nav fs-5 position-relative">
    <li class="nav-item">
        <a class="nav-link" href="./productos.view.php">
            <img src="../img/icUsuario.png" alt="">
        </a>
    </li>
    <li class="nav-item position-relative">
        <?php $cantidad = cantidadProductos($idUsuario); ?>
        <a class="nav-link position-relative" href="./carrito.view.php">
            <img src="../img/icCarrito.png" alt="" style="width: 30px; height: 30px;">
            <!-- Cantidad encima en la esquina superior derecha -->
            <span 
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"
                style="font-size: 10px; padding: 3px 6px; transform: translate(-50%, 25%);">
                <?php echo $cantidad; ?>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../logout.php">
            <img src="../img/icSalir.png" alt="">
        </a>
    </li>
</ul>



    </div>
</nav>