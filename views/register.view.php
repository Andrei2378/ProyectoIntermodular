<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/register.css" />
    <title>Registro</title>
  </head>
  <body>
    <form class="form" action="../registrarusuario.php" method="POST">
      <p class="title">Registro</p>
        <label>
          <input required="" placeholder="" name="usuario" type="text" class="input" />
          <span>Nombre Usuario</span>
        </label>

      <label>
        <input required="" placeholder="" name="correo" type="email" class="input" />
        <span>Correo</span>
      </label>

      <label>
        <input required="" placeholder="" name="DNI" type="text" class="input" />
        <span>DNI</span>
      </label>

      <label>
        <input required="" placeholder="" name="direccion" type="text" class="input" />
        <span>direccion</span>
      </label>

      <label>
        <input required="" placeholder="" name="poblacion" type="text" class="input" />
        <span>poblacion</span>
      </label>

      <label>
        <input required="" placeholder="" name="provincia" type="text" class="input" />
        <span>Provincia</span>
      </label>

      <label>
        <input required="" placeholder="" name="CP" type="text" class="input" />
        <span>codigo postal</span>
      </label>

      <label>
        <input required="" placeholder="" name="pass" type="password" class="input" />
        <span>Contraseña</span>
      </label>

      <label>
        <input required="" placeholder="" name="rpass" type="password" class="input" />
        <span>Confirmar Contraseña</span>
      </label>

      <button class="submit" type="submit">Submit</button>
      <p class="signin">
        Ya tienes una cuenta? <a href="login.view.php">Sign in</a>
      </p>
    </form>
  </body>
</html>
