<?php
session_start();
if ($_SESSION['rol'] !== "admin") {
    header("Location: views/inicio.view.php");
}

if (!$_SESSION['loguedo']) {
    header("Location: views/login.view.php");
}

include '../../includes/adminnav.php';
?>
<link rel="stylesheet" href="../../css/navadmin.css">
<link rel="stylesheet" href="../../css/footer.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<div id="buscador" class="container">
<input type="text" id="buscar" class="form-control mt-3 mb-3" placeholder="Buscar usuario" oninput="filtrar()" />
</div>

<div class="container">
    <div class="row">

    </div>
</div>
<?php include("../../includes/footer.php"); ?>
<script defer src="../../js/users.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>