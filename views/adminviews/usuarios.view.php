<?php

include_once '../../class/Usuariosclass.php';

$usuarios = new Usuariosclass();

$obtenerUsuarios = $usuarios->obtenerUsuarios();

foreach ($obtenerUsuarios as $usuario) {
    echo $usuario['nombre'] . "<br>";
}

