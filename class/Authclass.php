<?php

include_once 'ConexionMysqli.php';
session_start();

/**
 * [Creamos la clase para poder autentificar los usuarios]
 */
class AuthClass
{

    private $conexion;

    /**
     * Constructor para obtener la conexión a la base de datos
     */
    public function __construct()
    {
        $con = new ConexionMysqli();
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
    public function registrarUsuario($nombreUsuario, $email, $dni, $direccion, $poblacion, $provincia, $codigoPostal, $pass)
    {
        // Encriptar la contraseña usando SHA-256
        $passHash = hash('sha256', $pass);

        // Comprobar si el usuario existe
        $usuarioStmt = $this->conexion->prepare('SELECT * FROM usuarios WHERE email = ?');
        if ($usuarioStmt === false) {
            // Manejo del error de preparación de la consulta
            error_log($this->conexion->error);
            return false;
        }
        $usuarioStmt->bind_param('s', $email);
        $usuarioStmt->execute();
        $resultado = $usuarioStmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuarioStmt->close();
            return 3; // Usuario ya existe
        } else {
            $usuarioStmt->close();

            // Preparar la consulta SQL para insertar el nuevo usuario
            $consulta = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, dni, pass, direccion, poblacion, codigo_postal, provincia) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($consulta === false) {
                // Manejo del error de preparación de la consulta
                error_log($this->conexion->error);
                return false;
            }
            $consulta->bind_param("ssssssss", $nombreUsuario, $email, $dni, $passHash, $direccion, $poblacion, $codigoPostal, $provincia);

            // Ejecutar la consulta y verificar si fue exitosa
            if ($consulta->execute()) {
                $consulta->close();
                return true;
            } else {
                // Registrar el error
                error_log($this->conexion->error);
                $consulta->close();
                return false;
            }
        }
    }

    public function comprobarUsuario($email)
    {
        // Comprobar si el usuario existe
        $usuarioStmt = $this->conexion->prepare('SELECT * FROM usuarios WHERE email = ?');
        if ($usuarioStmt === false) {
            // Manejo del error de preparación de la consulta
            error_log($this->conexion->error);
            return false;
        }
        $usuarioStmt->bind_param('s', $email);
        $usuarioStmt->execute();
        $resultado = $usuarioStmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuarioStmt->close();
            return true; // Usuario ya existe
        } else {
            $usuarioStmt->close();
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

        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $consulta->bind_param("s", $usuario);
        $consulta->execute();

        $resultado = $consulta->get_result();
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $passHash = hash('sha256', $pass);
            if ($passHash === $fila['pass']) {
                $_SESSION['idUsuario'] = $fila['id_usuario'];
                $_SESSION['provincia'] = $fila['provincia'];
                $_SESSION['loguedo'] = true;
                if ($fila["rol"] == "admin") {
                    $_SESSION['rol'] = "admin";
                } else {
                    $_SESSION['rol'] = "user";
                }

                return 3; //Exito al logearse
            } else {
                return 1; //Contraseña incorrecta
            }
        } else {
            return 0; //Usuario inexistente
        }
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }
}
