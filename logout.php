<?php
//Destrucción de la sesión y redireccionamiento
session_start();
$_SESSION['logueado'] = ' ';
session_destroy();

header('Location: /views/login.view.php');
