<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/navuser.css" />
    <title>Login</title>
</head>

<body>
    <div id="error" class="error" style="display: none;"></div>
<?php include('../includes/navlogin.php'); ?>

<div class="form-container">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>
    <form id="formulario">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input name="usuario" type="email" class="form-control" id="user">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="contraseña" class="form-control" id="pass">
            <small id="validPass"></small>
        </div>
        <button type="submit" id="iniciar" class="btn btn-primary w-100 mb-3">Iniciar Sesión</button>
        <button type="button" class="btn btn-secondary w-100"><a href="./register.view.php">Registrate</a></button>
    </form>
</div>

<footer class="footer">
    <p>&copy; 2024 Tienda de Jardinería. Todos los derechos reservados.</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>