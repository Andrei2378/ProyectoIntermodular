<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil del Usuario</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="../css/navuser.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('../includes/usernav.php');
    include('../api/users.php');
    ?>

    <main class="container my-5">
        <h4 class="text-center mb-4">Perfil</h4>

        <?php if ($usuario): ?>
            <form action="../api/users.php?accion=modificarUsuario" method="POST" class="card mx-auto shadow-lg border-0"
                style="max-width: 600px;">

                <input type="hidden" name="id" value="<?php echo $usuario['id_usuario'] ?>" />
                <input type="hidden" name="CP" value="<?php echo $usuario['codigo_postal']; ?>" />
                <input type="hidden" name="usuario" value="<?php echo $usuario['nombre']; ?>" />

                <div class="card-header bg-success text-white text-center">
                    <img src="https://static.vecteezy.com/system/resources/previews/009/734/564/non_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg"
                        alt="Foto de perfil" class="rounded-circle mb-3"
                        style="width: 100px; height: 100px; object-fit: cover;">
                    <h4><?= htmlspecialchars($usuario['nombre']) ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="email" class="form-label"><strong>Correo electrónico:</strong></label>
                            <input type="email" name="correo" id="email" class="form-control"
                                value="<?= htmlspecialchars($usuario['email']) ?>" required>
                        </li>
                        <li class="list-group-item">
                            <label for="dni" class="form-label"><strong>DNI:</strong></label>
                            <input type="text" name="dni" id="dni" class="form-control"
                                value="<?= htmlspecialchars($usuario['dni']) ?>" required>
                        </li>
                        <li class="list-group-item">
                            <label for="direccion" class="form-label"><strong>Dirección:</strong></label>
                            <input type="text" name="direccion" id="direccion" class="form-control"
                                value="<?= htmlspecialchars($usuario['direccion']) ?>" required>
                        </li>
                        <li class="list-group-item">
                            <label for="poblacion" class="form-label"><strong>Ciudad:</strong></label>
                            <input type="text" name="poblacion" id="poblacion" class="form-control"
                                value="<?= htmlspecialchars($usuario['poblacion']) ?>" required>
                        </li>
                        <li class="list-group-item">
                            <label for="provincia" class="form-label"><strong>Provincia:</strong></label>
                            <input type="text" name="provincia" id="provincia" class="form-control"
                                value="<?= htmlspecialchars($usuario['provincia']) ?>" required>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <a href="../views/cambiarpass.view.php" class="btn btn-secondary">Cambiar Contraseña</a>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
                No se pudo cargar la información del usuario.
            </div>
        <?php endif; ?>
    </main>

    <?php include('../includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>