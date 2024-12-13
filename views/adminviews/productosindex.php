<?php
session_start();

$conn = new mysqli("localhost", "root", "", "jardin");

if ($conn->connect_error) {
    die("Error de conexion");
}

$sqlProductos = 'SELECT c.*, p.*, c.nombre AS nombre_categoria FROM categorias c 
                                                    INNER JOIN productos p 
                                                    ON c.id_categoria = p.id_categoria';

$productos = $conn->query($sqlProductos);
$dir = "../img/";

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/navadmin.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
    <?php include('../../includes/adminnav.php'); ?>
    <div class="container py-3">

        <h2 class="text-center">Productos</h2>

        <hr>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="./nuevoproducto.view.php" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Nuevo
                    producto</a>
            </div>
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th width="70%">Descripción</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <?php while ($row = $productos->fetch_assoc()) { ?>
                <form action="../../api/productos.php?accion=modificar" method="POST">
                    <tr>
                        <td><img src="<?= '../' . $row['imagen'] . '?n=' . time(); ?>" width="100"></td>
                        <input type="hidden" name="id_producto" value="<?= $row['id_producto']; ?>" id="">
                        <td>
                            <input type="text" name="nombre" value="<?= $row['nombre']; ?>" id="">
                        </td>
                        <td width="100%">
                            <input type="text" name="descripcion" value="<?= $row['descripcion']; ?>" id="">
                        </td>
                        <td>
                            <input type="number" name="precio" value="<?= $row['precio']; ?>" id="">
                        </td>
                        <td>
                            <select name="id_categoria" id="">
                                <option selected value="<?= $row['id_categoria']; ?>"><?= $row['nombre_categoria']; ?>
                                </option>
                                <option value="1">Herramientas</option>
                                <option value="2">Abonos</option>
                                <option value="4">Accesorios</option>
                                <option value="5">Materiales</option>
                            </select>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </button>
                        </td>
                        <td>
                            <a href="../../api/productos.php?accion=eliminar&id=<?= $row['id_producto']; ?>"
                                class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>
                                Eliminar</a>
                        </td>
                    </tr>
                </form>
            <?php } ?>
            </tbody>
        </table>
    </div>



    <?php /* include 'ProductonuevoModal.php'; */ ?>

    <?php $generos->data_seek(0); ?>

    <?php include 'ProdutoeditaModal.php'; ?>
    <?php include 'ProductoeliminaModal.php'; ?>

    <script>
        let nuevoModal = document.getElementById('nuevoModal')
        let editaModal = document.getElementById('editaModal')
        let eliminaModal = document.getElementById('eliminaModal')

        nuevoModal.addEventListener('shown.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').focus()
        })

        nuevoModal.addEventListener('hide.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').value = ""
            nuevoModal.querySelector('.modal-body #descripcion').value = ""
            nuevoModal.querySelector('.modal-body #genero').value = ""
            nuevoModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('hide.bs.modal', event => {
            editaModal.querySelector('.modal-body #nombre').value = ""
            editaModal.querySelector('.modal-body #descripcion').value = ""
            editaModal.querySelector('.modal-body #genero').value = ""
            editaModal.querySelector('.modal-body #img_poster').value = ""
            editaModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #id')
            let inputNombre = editaModal.querySelector('.modal-body #nombre')
            let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
            let inputGenero = editaModal.querySelector('.modal-body #genero')
            let poster = editaModal.querySelector('.modal-body #img_poster')

            let url = "PeliculagetPelicula.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(data => {

                    inputId.value = data.id
                    inputNombre.value = data.nombre
                    inputDescripcion.value = data.descripcion
                    inputGenero.value = data.id_genero
                    poster.src = '<?= $dir ?>' + data.id + '.jpg'

                }).catch(err => console.log(err))

        })

        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id').value = id
        })
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <?php include('../../includes/footer.php'); ?>
</body>

</html>