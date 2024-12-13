<?php

include_once 'ConexionMysqli.php';

/**
 * [Creamos la clase en la que englobaremos toda la funcionalidad de los usuarios]
 */
class UsuariosClass
{
    private $conexion;

    /**
     * Nos conectamos a la base de datos por medio del constructor
     */
    public function __construct()
    {
        $con = new ConexionMysqli();
        $this->conexion = $con->obtenerConexion();
    }

    /**
     * Metodo por el cual obtenemos todos los usuarios
     * @return [array]
     */
    public function obtenerUsuarios()
    {
        $consulta = $this->conexion->prepare('SELECT * FROM usuarios WHERE rol = "user" ');
        $consulta->execute();
        $resultado = $consulta->get_result();
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuario($id)
    {
        $consulta = $this->conexion->prepare('SELECT * FROM usuarios WHERE id_usuario = ? ');
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $usuario = $resultado->fetch_assoc();
        return $usuario;
    }

    public function modificarUsuario($nombre, $email, $dni, $direccion, $poblacion, $provincia, $codigo_postal, $id)
    {
        $consulta = $this->conexion->prepare('UPDATE usuarios
                                        SET nombre = ?, email = ?, dni = ?, direccion = ?, poblacion = ?, provincia = ?, codigo_postal = ?
                                        WHERE id_usuario = ?');
        $consulta->bind_param('sssssssi', $nombre, $email, $dni, $direccion, $poblacion, $provincia, $codigo_postal, $id);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarUsuario($id)
    {
        $consulta = $this->conexion->prepare('DELETE FROM usuarios WHERE id_usuario = ?');
        $consulta->bind_param('i', $id);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cambiarPass($id, $nuevaPass)
    {

        $passHash = hash('sha256', $nuevaPass);

        $consulta = $this->conexion->prepare('UPDATE usuarios SET pass = ? WHERE id_usuario = ?');
        $consulta->bind_param('si', $passHash, $id);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

}