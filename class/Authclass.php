<?php
include 'Conexionmysqli.php';
session_start();
/**
 * [Creamos la clase para poder autentificar los usuarios]
 */
class Authclass
{
    private $conexion;
    /**
     * Constructor para obtener la conexión a la base de datos
     */
    public function __construct()
    {
        $con = new Conexionmysqli();
        $this->conexion = $con->obtenerConexion();
    }

    /**
     * Metodo para realizar el registro de usuario
     * @param mixed $usuario
     * @param mixed $email
     * @param mixed $pass
     * @param mixed $direccion
     * @param mixed $poblacion
     * @param mixed $provincia
     * @param mixed $codigoPostal
     * 
     * @return [boolean]
     */
    public function registrarUsuario($usuario, $email, $pass, $direccion, $poblacion, $provincia, $codigoPostal)
    {
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


    /**
     * Metodo para el login del usuario
     * @param mixed $usuario
     * @param mixed $pass
     * 
     * @return [boolean]
     */
    public function verificarLogin($usuario, $pass)
    {
        $passHash = hash('sha256', $pass);
        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ?");
        $consulta->bind_param("ss", $usuario, $passHash);
        $consulta->execute();

        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $_SESSION['loguedo'] = true;
            if ($fila["rol"] == "admin") {
                header("Location: ../views/adminviews/admin.view.php");
                exit();
            }

            return true;
        } else {
            return false;
        }
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }
}
