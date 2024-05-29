<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../js/planta.js" defer></script>
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/plantas.css" />
  <title>verPlanta</title>
</head>

<body>

  <nav id="menuPrincipal" class="menu-principal">
    <ul class="menu-lista">
      <li class="menu-item"><a href="inicio.view.php" class="menu-link">Inicio</a></li>
      <li class="menu-item"><a href="plantas.view.php" class="menu-link">Plantas</a></li>
      <li class="menu-item"><a href="usuariosprod.view.php" class="menu-link">Productos</a></li>
      <li class="menu-item"><a href="../logout.php" class="menu-link"><svg xmlns="http://www.w3.org/2000/svg" width="30"
            height="30.029296875" viewBox="0 0 1024 1025">
            <path fill="#000000"
              d="M896 1025H448q-53 0-90.5-37.5T320 897v-64q0-27 18.5-45.5t45-18.5t45.5 18.5t19 45t18.5 45.5t45.5 19h256q26 0 45-19t19-45V192q0-26-19-45t-45-19H512q-27 0-45.5 19T448 192.5T429 238t-45.5 19t-45-19t-18.5-46v-64q0-53 37.5-90.5T448 0h448q53 0 90.5 37.5T1024 128v769q0 53-37.5 90.5T896 1025M704 384q26 0 45 19t19 45v129q0 26-19 45t-45 19H256v101q0 11-13.5 19t-32 7t-29.5-12L18 556Q0 538 0 512.5T18 469l163-200q11-11 29.5-11.5t32 7.5t13.5 20v99z" />
          </svg></a></li>
    </ul>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4" id="imagen"></div>
      <div class="col-md-8" id="datos"></div>
    </div>
  </div>

  <div class="container mt-5" id="mapa">
    <canvas id="canvas" style="width: 100%; height: 100%" width="1600" height="808">
    </canvas>
  </div>
</body>

</html>