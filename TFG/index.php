<?php

if($_SESSION['logeado']){
    header('Location: Listado_Plantas/');
}
else{
    header('Location: login/login.php');
}