<?php
include_once '../class/UsuariosClass.php';
include_once '../class/AuthClass.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : "no_valida"; //Obtenemos la accion
//if ($accion != "registrarUsuario") {
    //$idUsuario = $_SESSION['idUsuario'];
//}

$usuarios = new UsuariosClass();
$auth = new AuthClass();

//$usuario = $usuarios->obtenerUsuario($idUsuario);

//if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {


switch ($accion) {
    case "obtenerUsuarios":
        $obtenerUsuarios = $usuarios->obtenerUsuarios();

        if ($obtenerUsuarios) {
            echo json_encode(["resp" => true, "users" => $obtenerUsuarios]);
        } else {
            echo json_encode(["resp" => false, "message" => "no hay usuarios"]);
        }
        break;

    case "registrarUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = $_POST['usuario'];
            $email = $_POST['correo'];
            $dni = $_POST['DNI'];
            $direccion = $_POST['direccion'];
            $poblacion = $_POST['poblacion'];
            $provincia = $_POST['provincia'];
            $codigoPostal = $_POST['CP'];
            $pass = $_POST['pass'];
            $rpass = $_POST['rpass'];

            $resultado = $auth->registrarUsuario($usuario, $email, $dni, $direccion, $poblacion, $provincia, $codigoPostal, $pass);
            if ($resultado === 3) {
                echo json_encode(["resp" => 3, "message" => "usuario existente"]);
            } elseif ($resultado === true) {
                echo json_encode(["resp" => true, "message" => "registrado con exito"]);
            } else {
                echo json_encode(["resp" => false, "message" => "ha surgido un error"]);
            }

        }
        break;

    case "comprobarUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = json_decode(file_get_contents("php://input"), true);
            $email = $datos['email'];

            $resultado = $auth->comprobarUsuario($email);
            if ($resultado == true) {
                echo json_encode(["resp" => true]);
            } else {
                echo json_encode(["resp" => false]);
            }
        }
        break;

    case "logearUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'];
            $pass = $_POST['contraseña'];

            if ($usuario && $pass) {
                $resultado = $auth->verificarLogin($usuario, $pass);
                if ($resultado === 3) {
                    $rol = $_SESSION['rol'];
                    echo json_encode(["resp" => true, "message" => "logeado con exito", "rol" => $rol, "provincia" => $_SESSION['provincia']]);
                } elseif ($resultado === 1) {
                    echo json_encode(["resp" => 1, "message" => "Contraseña incorrecta"]);
                } elseif ($resultado === 0) {
                    echo json_encode(["resp" => 0, "message" => "Usuario inexistente"]);
                }
            } else {
                echo json_encode(["resp" => false, "message" => "datos no recibidos"]);
            }

        } else {
            echo json_encode(["resp" => false, "message" => "datos no recibidos"]);
        }

        break;
    case "modificarUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['usuario'];
            $email = $_POST['correo'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            $poblacion = $_POST['poblacion'];
            $provincia = $_POST['provincia'];
            $codigo_postal = $_POST['CP'];

            $resultado = $usuarios->modificarUsuario($nombre, $email, $dni, $direccion, $poblacion, $provincia, $codigo_postal, $id);
            if ($resultado == 1) {
                if ($_SESSION['rol'] == 'admin') {
                    echo json_encode(["resp" => true, "message" => "usuario editado correctamente!"]);
                } else {
                    echo "<script>window.location.href = '../views/datosusuario.view.php?accion=modificarUsuario'</script>";
                }
            } else {
                echo json_encode(["resp" => false, "message" => "error al modificar usuario"]);
            }
        }
        break;

    case "eliminarUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['eliminar'];

            $resultado = $usuarios->eliminarUsuario($id);
            if ($resultado == 1) {
                echo json_encode(["resp" => true, "message" => "usuario eliminado correctamente"]);
            } else {
                echo json_encode(["resp" => false, "message" => "error al eliminar"]);
            }
        }

    case "obtenerUsuario":
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $resultado = $usuarios->obtenerUsuario($id);
            if ($resultado) {
                echo json_encode(["resp" => true, "data" => $resultado]);
            } else {
                echo json_encode(["resp" => false, "message" => "Usuario no encontrado"]);
            }
        }
        break;

    case "modificarPass":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newPass = $_POST['nuevaPass'];
            $resultado = $usuarios->cambiarPass($idUsuario, $newPass);
            if ($resultado) {
                echo "<script>window.location.href = '../views/datosusuario.view.php'</script>";
            } else {
                echo "<script>window.location.href = '../views/cambiarpass.view.php'</script>";
            }
        }

    default:
        //echo json_encode(["resp" => false, "message" => "Accion no valida"]);
        break;

}
//}

