<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="multimedia/logoWeb.png" type="image/x-icon">
  <link rel="stylesheet" href="CSS/estilos.css">
  <title>Login</title>
  <?php
  include_once 'PHP/conexionBD.php';
  ?>
</head>

<body>
  <?php
  if (isset($_POST['usuario'])) {
    consultaUsuario($_POST['usuario'], $_POST['pass']);
    cerrarTodo($conexion, $stmt);
    $_SESSION['nombreUsuario'] = $_POST['usuario'];
  } else {
    ?>
    <form class="form" action="login.php" method="POST">
      <p class="title">Login</p>
      <label>
        <input required="" placeholder="" id="usuario" name="usuario" type="text" class="input" />
        <span>Usuario</span>
      </label>
      <label>
        <input required="" placeholder="" id="pass" name="pass" type="password" class="input" />
        <span>Contraseña</span>
      </label>
      <button type="submit" class="submit" name="iniciar">Submit</button>
      <p class="signin">
        Aún no tienes una cuenta? <a href="../Registro/index.html">Create Account</a>
      </p>
    </form>
  <?php } ?>
</body>

</html>