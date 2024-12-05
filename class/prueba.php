<?php
include_once '../class/UsuariosClass.php';
include_once '../class/AuthClass.php';
$usuarios = new UsuariosClass();
$auth = new AuthClass();


$resultado = $auth->verificarLogin("Andrei@gmail.com", "Andrei1234");

echo $resultado;


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




