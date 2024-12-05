<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jardin";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generar 98 registros
for ($i = 1; $i <= 98; $i++) {
    $nombre = "Usuario " . $i;
    $email = "usuario" . $i . "@example.com";
    $pass = hash('sha256', '123');
    $direccion = "Dirección " . $i;
    $poblacion = "Población " . $i;
    $provincia = "Provincia " . $i;
    $codigo_postal = "CP" . $i;

    // Sentencia SQL para insertar un registro
    $sql = "INSERT INTO usuarios (nombre, email, pass, direccion, poblacion, provincia, codigo_postal) 
            VALUES ('$nombre', '$email', '$pass', '$direccion', '$poblacion', '$provincia', '$codigo_postal')";

    if ($conn->query($sql) === true) {
        echo "Registro insertado con éxito<br>";
    } else {
        echo "Error al insertar registro: " . $conn->error;
    }
}

// Cerrar conexión
$conn->close();

