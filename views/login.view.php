<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos1.css">
    <title>Login</title>
</head>

<body>
    <form class="form" action="../verficarlogin.php" method="POST">
        <p class="title">Login</p>
        <label>
            <input required="" placeholder="" name="usuario" type="text" class="input" />
            <span>Usuario</span>
        </label>
        <label>
            <input required="" placeholder="" name="contraseña" type="password" class="input" />
            <span>Contraseña</span>
        </label>
        <button type="submit" class="submit" name="iniciar">Submit</button>
        <p class="signin">
            Aún no tienes una cuenta? <a href="register.view.php">Create Account</a>
        </p>
    </form>

</body>

</html>