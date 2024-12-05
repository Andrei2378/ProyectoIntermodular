<?php
session_start();
if ($_SESSION['rol'] !== "admin") {
    header("Location: views/inicio.view.php");
}

if (!$_SESSION['loguedo']) {
    header("Location: views/login.view.php");
}

?>
<header>
    <link rel="stylesheet" href="../../css/usuariosadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../">
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


</header>

<div id="buscador" class="container">
<input type="text" id="buscar" class="form-control" placeholder="Buscar usuario" oninput="filtrar()" />
</div>

<div class="container">
    <div class="row">

    </div>
</div>
<?php include("../../includes/footer.php"); ?>
<script defer src="../../js/users.js"></script>