<?php

include_once 'Conexionmysqli.php';

/**
 * [Creamos la clase en la que englobaremos toda la funcionalidad de los productos]
 */
class Productsclass
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

    /**
     * Obtenemos el ID de los productos
     * @param mixed $id
     * 
     * @return [array]
     */
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


}