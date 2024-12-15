<?php

include_once 'ConexionMysqli.php';

/**
 * [Creamos la clase en la que englobaremos toda la funcionalidad de los productos]
 */
class ProductsClass
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
     * Obtenemos todos los productos de la BBDD
     * @return [array]
     */
    public function obtenerProductos($cat, $limite, $desplazamiento)
    {
        $sql = $this->conexion->prepare('SELECT id_categoria FROM categorias WHERE nombre = ?');
        $sql->bind_param('s', $cat);
        $id_cat = 0;
        if ($sql->execute()) {
            $res = $sql->get_result();
            if ($fila = $res->fetch_assoc()) {
                $id_cat = $fila['id_categoria'];
            }
        }

        $consulta = $this->conexion->prepare('SELECT c.*, p.*, c.nombre AS nombre_categoria FROM categorias c 
                                                    INNER JOIN productos p ON c.id_categoria = p.id_categoria
                                                     WHERE  c.id_categoria = ? LIMIT ? OFFSET ?');
        $consulta->bind_param('iii', $id_cat, $limite, $desplazamiento);
        $productos = [];
        if ($consulta->execute()) {
            $resultado = $consulta->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $productos[] = $fila;
            }
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

    public function crearProducto($producto)
    {

        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $precio = $producto['precio'];
        $imagen = $producto['imagen'];
        $idCategoria = $producto['id_categoria'];

        $consulta = $this->conexion->prepare('INSERT INTO productos (nombre, descripcion, precio, imagen, id_categoria) 
                                                    VALUES(?,?,?,?,?)');
        $consulta->bind_param('ssdsi', $nombre, $descripcion, $precio, $imagen, $idCategoria);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarProducto($producto)
    {
        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $precio = $producto['precio'];
        $idCategoria = $producto['id_categoria'];
        $idProducto = $producto['id_producto'];

        $consulta = $this->conexion->prepare('UPDATE productos
                                        SET nombre = ?, descripcion = ?, precio = ?, id_categoria = ?
                                        WHERE id_producto = ?');
        $consulta->bind_param('ssdii', $nombre, $descripcion, $precio, $idCategoria, $idProducto);

        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarProducto($id)
    {
        $consulta = $this->conexion->prepare('DELETE FROM productos WHERE id_producto = ?');
        $consulta->bind_param('i', $id);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarProductos(){
        $consulta = $this->conexion->prepare('SELECT c.*, p.*, c.nombre AS nombre_categoria FROM categorias c 
                                                    INNER JOIN productos p 
                                                    ON c.id_categoria = p.id_categoria');
        $consulta->execute();
        $resultado = $consulta->get_result();
        $producto = [];
        while ($fila = $resultado->fetch_assoc()) {
            $producto[] = $fila;
        }
        return $producto;
    }

}