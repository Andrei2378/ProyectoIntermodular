<?php

include_once 'Conexionmysqli.php';

/**
 * [Creamos la clase en la que englobaremos toda la funcionalidad de los usuarios]
 */
class Usuariosclass
{
    private $conexion;

    /**
     * Nos conectamos a la base de datos por medio del constructor
     */
    public function __construct()
    {
        $con = new Conexionmysqli();
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

    public function modificarUsuario($nombre, $email, $pass, $direccion, $poblacion, $provincia, $codigo_postal, $rol, $id)
    {
        $consulta = $this->conexion->prepare('UPDATE usuarios
                                            SET nombre = ?, email = ?, pass = ?, direccion = ?, poblacion = ?, provincia = ?, codigo_postal = ?, rol = ? 
                                            WHERE id_usuario = ?');
        $consulta->bind_param('sssssssi', $nombre, $email, $pass, $direccion, $poblacion, $provincia, $codigo_postal, $rol, $id);
        if ($consulta->execute()) {
            $result = $consulta->get_result();
        }
        return $result;
    }

}