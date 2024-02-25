<?php

include_once 'Conexionmysqli.php';

class Usuariosclass
{
    private $conexion;

    public function __construct()
    {
        $con = new Conexionmysqli();
        $this->conexion = $con->obtenerConexion();
    }

    /**
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