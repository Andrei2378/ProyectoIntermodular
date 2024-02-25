<?php
include '../login/PHP/conexionBD.php';
//Si no esta logeado devuelve false y se redirige al login
if (!$_SESSION['logeado']) {
    echo 'entra';
    header("Location: ../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/estilos.css" />
    <link rel="stylesheet" href="../headers/CSS/estilosMenuAdmin.css">
    <title>Infromacion Plantas</title>
    <script src="JS/funciones.js" defer></script>

</head>

<body>
    <header>
        <h1>Listado Plantas</h1>
    </header>

    <?php 
    include '../headers/menuAdmin.php';
    ?>

    <main>

    </main>

    <div id="paginacion">

    </div>

    <footer>
        <ul>
            <li>adas</li>
            <li>safdsa</li>
            <li>wafeas</li>
        </ul>
    </footer>

</body>

</html>