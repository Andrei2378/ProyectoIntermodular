<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tienda de Jardinería - Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/navuser.css" />
  <link rel="stylesheet" href="../css/register.css" />
  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" type="image/x-icon">
</head>

<body>

  <?php include('../includes/navlogin.php'); ?>

  <div class="form-container">
    <h3 class="text-center mb-3">Registro de Usuario</h3>
    <form class="form" method="POST">
      <!-- Fila 1 -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nombre" class="form-label">Nombre de Usuario</label>
          <input type="text" name="usuario" class="form-control" id="usuario" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input type="email" name="correo" class="form-control" id="correo" />
        </div>
      </div>
      <!-- Fila 2 -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="dni" class="form-label">DNI</label>
          <input type="text" name="DNI" class="form-control" id="DNI" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="codigoPostal" class="form-label">Código Postal</label>
          <input type="text" name="CP" class="form-control" id="CP" />
        </div>
      </div>
      <!-- Fila 3 -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="poblacion" class="form-label">Población</label>
          <input type="text" name="poblacion" class="form-control" id="poblacion" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="provincia" class="form-label">Provincia</label>
          <input type="text" name="provincia" class="form-control" id="provincia" />
        </div>
      </div>
      <!-- Fila 4 -->
      <div class="row">
        <div class="col-md-12 mb-3">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" name="direccion" class="form-control" id="direccion" />
        </div>
      </div>
      <!-- Fila 5 -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="pass1" class="form-label">Contraseña</label>
          <input type="password" name="pass" class="form-control" id="pass1" />
        </div>
        <div class="col-md-6 mb-3">
          <label for="pass2" class="form-label">Confirmar Contraseña</label>
          <input type="password" name="rpass" class="form-control" id="pass2" />
        </div>
      </div>
      <!-- Botones -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <button id="boton" type="submit" class="btn btn-primary w-100">
            Registrarse
          </button>
        </div>
        <div class="col-md-6 mb-3">
          <button type="button" class="btn btn-secondary w-100" onclick="location.href='./login.view.php'">
            Ir al Login
          </button>
        </div>
      </div>
    </form>
  </div>

  <footer class="footer">
    <p>&copy; 2024 Tienda de Jardinería. Todos los derechos reservados.</p>
  </footer>
  <script defer src="../js/register.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>