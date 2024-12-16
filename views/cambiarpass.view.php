<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="../css/navuser.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('../includes/usernav.php');
    ?>

    <main class="container my-5">
        <h2 class="text-center mb-4">Cambiar Contraseña</h2>

        <form action="../api/users.php?accion=modificarPass" method="POST" class="card mx-auto shadow-lg border-0"
            style="max-width: 500px;">
            <div class="card-header bg-success text-white text-center">
                <h4>Cambiar Contraseña</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nuevaPass" class="form-label"><strong>Nueva Contraseña:</strong></label>
                    <input type="password" name="nuevaPass" id="nuevaPass" class="form-control"
                        placeholder="Introduce tu nueva contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="confirmarPass" class="form-label"><strong>Confirmar Contraseña:</strong></label>
                    <input type="password" id="confirmarPass" class="form-control"
                        placeholder="Confirma tu nueva contraseña" required>
                </div>
                <div id="errorMsg" class="text-danger text-center" style="display: none;">Las contraseñas no coinciden
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">Guardar Contraseña</button>
            </div>
        </form>
    </main>

    <?php include('../includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            const nuevaPass = document.getElementById('nuevaPass').value;
            const confirmarPass = document.getElementById('confirmarPass').value;
            const errorMsg = document.getElementById('errorMsg');

            if (nuevaPass !== confirmarPass) {
                event.preventDefault();
                errorMsg.style.display = 'block';
            } else {
                errorMsg.style.display = 'none';
            }
        });
    </script>
</body>

</html>