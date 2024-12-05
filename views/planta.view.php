<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/navuser.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/plantas.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <title>Planta</title>
</head>

<body>

<?php include('../includes/usernav.php'); ?>

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

  <?php include('../includes/footer.php'); ?>

</body>
<script src="../js/planta.js" defer></script>
</html>