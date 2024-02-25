<?php

if($_SESSION['logeado']){
    header('Location: /views/inicio.view.php');
}
else{
    header('Location: /views/login.view.php');
}