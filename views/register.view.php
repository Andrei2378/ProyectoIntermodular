<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/register.css" />
  <title>Registro</title>
</head>

<body>
  <div id="error" class="error" style="display: none;"></div>
  <div id="exito" class="exito" style="display: none;"></div>
  <form class="form" method="POST">
    <p class="title">Registro</p>
    <label>
      <input placeholder=""  id="usuario" name="usuario" type="text" class="input" />
      <span>Nombre Usuario</span>
    </label>

    <label>
      <input placeholder=""  id="correo" name="correo" type="email" class="input" />
      <span>Correo</span>
      <small id="mensaje"></small>
    </label>

    <label>
      <input placeholder=""  id="DNI" name="DNI" type="text" class="input" />
      <span>DNI</span>
    </label>

    <label>
      <input placeholder=""  id="direccion" name="direccion" type="text" class="input" />
      <span>direccion</span>
    </label>

    <label>
      <input placeholder=""  id="poblacion" name="poblacion" type="text" class="input" />
      <span>poblacion</span>
    </label>

    <label>
      <input placeholder=""  id="provincia" name="provincia" type="text" class="input" />
      <span>Provincia</span>
    </label>

    <label>
      <input placeholder=""  id="CP" name="CP" type="text" class="input" />
      <span>codigo postal</span>
    </label>

    <label>
      <input placeholder="" name="pass" id="pass1" type="password" class="input" />
      <span>Contraseña</span>
    </label>

    <label>
      <input placeholder="" name="rpass" id="pass2" type="password" class="input" />
      <span>Confirmar Contraseña</span>
    </label>

    <button id="boton" class="submit" type="submit">Submit</button>
    <p class="signin">
      Ya tienes una cuenta? <a href="login.view.php">Sign in</a>
    </p>
  </form>
  <script defer src="../js/register.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>