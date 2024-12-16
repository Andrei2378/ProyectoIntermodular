<?php
include '../verificarsesion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/plantas.css" />
    <link rel="stylesheet" href="../css/navuser.css" />
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Información Plantas</title>
</head>

<body>
<?php
        include('../includes/usernav.php');
?>

    <div id="loader-wrapper">
        <div class="loader"></div>
    </div>

    <main id="main" class="container">
        
    </main>

    <div id="myModal" class="modal">
        <div class="modal-content" id="tiempo2">
            <!-- El contenido del modal se actualizará aquí -->
        </div>
    </div>

    <div id="paginador">
        <button id="btn-prev">Anterior</button>
        <div id="numeros"></div>
        <button id="btn-next">Siguiente</button>
    </div>

    <?php include('../includes/footer.php') ?>
</body>
<script src="../js/funciones.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>