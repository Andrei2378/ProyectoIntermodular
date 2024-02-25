<?php

include_once 'Conexionmysqli.php';

class Productsclass
{
    private $conexion;
    public function __construct()
    {
        $con = new Conexionmysqli();
        $this->conexion = $con->obtenerConexion();
    }

    /**
     * Obtenemos todos los productos de la BBDD
     * @return [array]
     */
    public function obtenerProductos()
    {
        $consulta = $this->conexion->prepare('SELECT p.*, c.nombre AS nombre_categoria
                                            FROM productos p 
                                            INNER JOIN categorias c 
                                            ON c.id_categoria = p.id_categoria');
        $consulta->execute();
        $resultado = $consulta->get_result();
        $productos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos;
    }

    public function productPorId($id)
    {
        $consulta = $this->conexion->prepare('SELECT p.*, c.nombre AS nombre_categoria, c.id_categoria
                                            FROM productos p 
                                            INNER JOIN categorias c 
                                            ON c.id_categoria = p.id_categoria
                                            WHERE p.id_producto = ?');
        $consulta->bind_param('i', $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $producto = [];
        while ($fila = $resultado->fetch_assoc()) {
            $producto[] = $fila;
        }
        return $producto;
    }

    public function modificarProductos($id)
    {



    }
}