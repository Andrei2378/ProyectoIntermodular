<?php
include_once '../class/Usuariosclass.php';
include_once '../class/Authclass.php';
$usuarios = new Usuariosclass();
$registrar = new Authclass();

$resultado = $registrar->registrarUsuario("bbbb", "zzzzzz@gmail.com","123", "direccion", "poblacion", "09400", "Madrid" );



/*
usuario bbbb
register.js:88 correo ddddd@gmail.com
register.js:88 DNI 12345358X
register.js:88 direccion direccion
register.js:88 poblacion poblacion
register.js:88 provincias 35
register.js:88 CP 09400
register.js:88 pass 123
register.js:88 rpass 123
*/




