<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../js/planta.js" defer></script>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>verPlanta</title>
  </head>
  <body>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4" id="imagen"></div>
        <div class="col-md-8" id="datos"></div>
      </div>
    </div>

    <div class="container mt-5" id="mapa">
      <canvas
        id="canvas"
        style="width: 100%; height: 100%"
        width="1600"
        height="808"
      >
      </canvas>
    </div>
  </body>
</html>
