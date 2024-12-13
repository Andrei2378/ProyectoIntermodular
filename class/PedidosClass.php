<?php
include_once 'ConexionMysqli.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * [Creamos la clase para poder autentificar los usuarios]
 */
class PedidosClass
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

    public function obtenerUsuarios()
    {
        $consulta = $this->conexion->prepare('SELECT * FROM pedidos');
        $consulta->execute();
        $resultado = $consulta->get_result();
        $pedidos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $pedidos[] = $fila;
        }
        return $pedidos;
    }

}
?>