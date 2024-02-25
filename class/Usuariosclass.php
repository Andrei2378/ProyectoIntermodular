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

}