<?php
include 'Conexionmysqli.php';
session_start();
class Authclass {
    private $conexion;
    public function __construct() {
        $con = new Conexionmysqli();
        $this->conexion = $con->abrirConexion();
    }

    public function registrarUsuario($usuario, $email, $pass, $direccion, $poblacion, $provincia, $codigoPostal) {
        // Encriptar la contraseña usando SHA-256
        $passHash = hash('sha256', $pass);
    
        // Preparar la consulta SQL para insertar el nuevo usuario
        $consulta = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, pass, direccion, poblacion, provincia, codigo_postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("sssssss", $usuario, $email, $passHash, $direccion, $poblacion, $provincia, $codigoPostal);
    
        // Ejecutar la consulta y verificar si fue exitosa
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function verificarLogin($usuario, $pass) {
        $passHash = hash('sha256', $pass);
        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ?");
        $consulta->bind_param("ss", $usuario, $passHash);
        $consulta->execute();

        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['loguedo'] = true;
            return true; 
        } else {
            return false; 
        }
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }
}
