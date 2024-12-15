<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/inicio.css" />
    <link rel="stylesheet" href="../css/navuser.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <?php include('../includes/usernav.php'); ?>
    <div class="container py-5 flex">
        <h1 class="text-center mb-4" style="color: var(--verde-oscuro);">Bienvenido a la Tienda de Jardinería</h1>
        <div class="row text-center gy-4">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="icon-container">
                        <a href="./usuariosprod.view.php?cat=Materiales&pag=1"><img src="../img/icMateriales.png"
                                alt="Material"></a>
                    </div>
                    <h3 class="section-title">Materiales</h3>
                    <p class="section-description">Materiales diversos utilizados en proyectos de jardinería, como
                        piedras, plásticos, entre otros.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="icon-container">
                        <a href="./usuariosprod.view.php?cat=Abonos&pag=1"><img src="../img/icAbono.png"
                                alt="Abonos"></a>
                    </div>
                    <h3 class="section-title">Abonos</h3>
                    <p class="section-description">Disponemos de una gran cantidad de sustratos y abonos para toda
                        clase de plantas y terrenos.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="icon-container">
                        <a href="./usuariosprod.view.php?cat=Herramientas&pag=1"><img src="../img/icHerramientas.png"
                                alt="Herramientas"></a>
                    </div>
                    <h3 class="section-title">Herramientas</h3>
                    <p class="section-description">Herramientas utilizadas para labores de jardinería, como palas,
                        rastrillos, tijeras de podar, entre otros.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="icon-container">
                        <a href="./usuariosprod.view.php?cat=Accesorios&pag=1"><img src="../img/icAccesorios.png"
                                alt="accesorios"></a>
                    </div>
                    <h3 class="section-title">Accesorios</h3>
                    <p class="section-description">Productos complementarios para la jardinería, como guantes,
                        regaderas, macetas, entre otros.</p>
                </div>
            </div>
            <h3 class="text-center mb-4">Información adicional</h3>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card informacion">
                    <div class="icon-container">
                        <a href="./plantas.view.php"><img src="../img/icPlantas.png" alt="plantas"></a>
                    </div>
                    <h3 class="section-title">Plantas</h3>
                    <p class="section-description">Descubre nuestra gran variedad de plantas, árboles, cactus,
                        bonsáis, semillas, frutales, interiores, exteriores...</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card informacion">
                    <div class="icon-container">
                        <a href="./servicios.view.php"><img src="../img/icServicios.png" alt="servicios"></a>
                    </div>
                    <h3 class="section-title">Servicios</h3>
                    <p class="section-description">Asesoramiento personalizado por expertos en el sector, con un trato
                        cercano y profesional ¡Déjanos
                        ayudarte!</p>
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php') ?>

</body>

</html>