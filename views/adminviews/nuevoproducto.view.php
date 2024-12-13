<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="../../css/navadmin.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('../../includes/adminnav.php'); ?>

    <main class="container my-5">
        <h2 class="text-center mb-4">Crear Producto</h2>
        <form id="formulario" method="POST" class="card mx-auto shadow-lg border-0" style="max-width: 600px;">
            <div class="card-header bg-success text-white text-center">
                <h4>Nuevo Producto</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label"><strong>Nombre del Producto:</strong></label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Introduce el nombre del producto" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label"><strong>Descripción:</strong></label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-control"
                        placeholder="Describe el producto" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label"><strong>Precio:</strong></label>
                    <input type="number" name="precio" id="precio" class="form-control"
                        placeholder="Introduce el precio del producto" min="0" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label"><strong>URL de la Imagen:</strong></label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*"
                        placeholder="Introduce la URL de la imagen" required>
                </div>
                <div class="mb-3">
                    <label for="id_categoria" class="form-label"><strong>Categoría:</strong></label>
                    <select name="id_categoria" id="id_categoria" class="form-select" required>
                        <option value="" selected disabled>Selecciona una categoría</option>
                        <!-- Ejemplo de opciones. Estas deben ser dinámicas según las categorías disponibles en la base de datos. -->
                        <option value="1">Herramientas</option>
                        <option value="2">Abonos</option>
                        <option value="4">Accesorios</option>
                        <option value="5">Materiales</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">Crear Producto</button>
                <a href="../views/productos.view.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </main>

    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        document.getElementById("formulario").addEventListener("submit", function (event) {
            event.preventDefault();
            let formData = new FormData(this);
            fetch("../../api/productos.php?accion=crear", {
                method: "POST",
                body: formData
            })
                .then(resp => resp.json())
                .then(data => {
                    console.log(data);

                    if (data.resp === true) {
                        Swal.fire({
                            icon: "success",
                            title: "Creado!",
                            text: "Creado con exito"
                        });
                        setTimeout(function () {
                            location.href = "./productosindex.php";
                        }, 2000)
                    } else if (data.error_type === "image") {
                        Swal.fire({
                            icon: "error",
                            title: "Vaya...",
                            text: "Error al subir la imagen!"
                        });
                        console.log(data.message);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Vaya...",
                            text: "Error al crear producto!"
                        });
                        console.log(data.message);
                    }
                })
                .catch(error => {

                    Swal.fire({
                        title: "Error inesperado",
                        text: "Intentelo de nuevo más tarde!",
                        icon: "question"
                    });
                    console.error("Error:", error)
                });
        });
    </script>
</body>

</html>