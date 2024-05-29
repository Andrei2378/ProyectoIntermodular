<?php

// Si existe la sesión, me redirige a esa pagina
if ($_SESSION['logueado']) {
    header('Location: views/inicio.view.php');
}
// Si no existe me redirige a esa otra
else {
    header('Location: views/login.view.php');
}