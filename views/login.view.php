<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <div id="error" class="error" style="display: none;"></div>
    <div id="exito" class="exito" style="display: none;"></div>
    <form class="form" method="POST">
        <p class="title">Login</p>
        <label>
            <input required id="user" name="usuario" type="email" class="input" />
            <span>Usuario</span>
        </label>
        <label>
            <input required id="pass" name="contraseña" type="password" class="input" />
            <span>Contraseña</span>
            <small id="validPass"></small>
        </label>
        <button type="submit" class="submit" name="iniciar">Submit</button>
        <p class="signin">
            Aún no tienes una cuenta? <a href="register.view.php">Create Account</a>
        </p>
    </form>

    <script defer src="../js/login.js"></script>
</body>

</html>