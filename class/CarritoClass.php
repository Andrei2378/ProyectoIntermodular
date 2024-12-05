<?php

class CarritoClass
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

    function agregarProducto($idProducto, $idUsuario, $cantidad = 1)
    {
        $sql = $this->conexion->prepare('INSERT INTO carrito (id_producto, id_usuario, cantidad) 
                                                VALUES (?,?,?)
                                                ON DUPLICATE KEY UPDATE cantidad = cantidad + ?
        ');

        $sql->bind_param('iiii', $idProducto, $idUsuario, $cantidad, $cantidad);

        return $sql->execute();
    }

    function eliminarProducto($idProducto, $idUsuario)
    {

        $sql = $this->conexion->prepare('DELETE FROM carrito WHERE id_producto = ? AND id_usuario = ?');
        $sql->bind_param('ii', $idProducto, $idUsuario);

        return $sql->execute();
    }

    function obtenerProductos($idUsuario)
    {
        $sql = $this->conexion->prepare('SELECT c.id_carrito, p.id_producto, p.nombre, p.precio, p.imagen, c.cantidad, (p.precio*c.cantidad) AS subtotal
                                                from carrito c INNER JOIN productos p
                                                ON c.id_producto = p.id_producto
                                                WHERE c.id_usuario = ?');
        $sql->bind_param('i', $idUsuario);

        if ($sql->execute()) {
            $result = $sql->get_result();
            $productos = [];
            while ($fila = $result->fetch_assoc()) {
                $productos[] = $fila;
            }
            return $productos;
        }
    }

    function contarProductos($idUsuario)
    {
        $sql = $this->conexion->prepare('SELECT sum(cantidad) AS total_cantidad 
                                                FROM carrito 
                                                WHERE id_usuario = ?');
        $sql->bind_param('i', $idUsuario);
        if ($sql->execute()) {
            $result = $sql->get_result();
            $fila = $result->fetch_assoc();
            return $fila;
        }
    }

    function calcularTotal($idUsuario)
    {
        $sql = $this->conexion->prepare('SELECT sum(p.precio*c.cantidad) AS total 
                                                FROM carrito c INNER JOIN productos p
                                                ON c.id_producto = p.id_producto  
                                                WHERE id_usuario = ?');
        $sql->bind_param('i', $idUsuario);
        if ($sql->execute()) {
            $result = $sql->get_result();
            $fila = $result->fetch_assoc();
            return $fila;
        }
    }

    function modificarCantidad($idCarrito, $cantidad)
    {
        $idCarrito = (int) $idCarrito;
        $cantidad = (int) $cantidad;

        $sql = $this->conexion->prepare('UPDATE carrito 
                                                SET cantidad = ? 
                                                WHERE id_carrito = ?');

        $sql->bind_param('ii', $cantidad, $idCarrito);

        return $sql->execute();
    }

    public function vaciarCarrito($idUsuario)
    {
        $sql = $this->conexion->prepare('DELETE FROM carrito WHERE id_usuario = ?');
        $sql->bind_param('i', $idUsuario);
        return $sql->execute();
    }

}
?>