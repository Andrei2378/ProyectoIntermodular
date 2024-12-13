<?php
include_once '../class/ProductsClass.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : "no_valida"; //Obtenemos la accion
$productoClass = new ProductsClass();
switch ($accion) {
    case "obtener":
        break;

    case "crear":

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = $_FILES['imagen']['name'];
                $temp = $_FILES['imagen']['tmp_name'];
                $destino = '../../img/';
                $rutaCompleta = $destino . basename($nombreArchivo);
                if (move_uploaded_file($temp, $rutaCompleta)) {
                    $imagen = $rutaCompleta;
                } else {
                    echo json_encode(["resp" => false, "message" => "error al mover la imagen"]);
                    exit();
                }
            } else {
                echo json_encode(["resp" => false, "message" => "error al subir la imagen"]);
                exit();
            }

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $idCategoria = $_POST['id_categoria'];

            $producto = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "imagen" => $imagen,
                "id_categoria" => $idCategoria
            ];

            $result = $productoClass->crearProducto($producto);

            if ($result) {
                echo json_encode(["resp" => true, "message" => "producto creado"]);
            } else {
                echo json_encode(["resp" => false, "message" => "producto no creado"]);
            }
        }

        break;

    case 'modificar':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $idCategoria = $_POST['id_categoria'];
            $idProducto = $_POST['id_producto'];


            $productoEditado = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "id_categoria" => $idCategoria,
                "id_producto" => $idProducto
            ];

            $result = $productoClass->modificarProducto($productoEditado);

            if ($result) {
                header('Location: ../views/adminviews/productosindex.php');
            } else {
                header('Location: ../views/adminviews/productosindex.php');
            }

        }
        break;

    case 'eliminar':
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $idProducto = $_GET['id'];
            $result = $productoClass->eliminarProducto($idProducto);

            

            if ($result) {
                header('Location: ../views/adminviews/productosindex.php');
            } else {
                header('Location: ../views/adminviews/productosindex.php');
            }
        }
        break;


}

?>