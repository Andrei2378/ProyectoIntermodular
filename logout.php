<?php
session_start();
$_SESSION['logueado'] = ' ';
session_destroy();

header('Location: /views/login.view.php');
