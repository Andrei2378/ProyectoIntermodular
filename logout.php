<?php
//Destrucción de la sesión y redireccionamiento
session_start();
$_SESSION['logueado'] = ' ';
session_unset();
session_destroy();
echo json_encode(["success" => true]);
