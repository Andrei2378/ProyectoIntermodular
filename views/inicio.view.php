<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/inicio.css" />
    <link rel="stylesheet" href="../css/navuser.css" />
    <link rel="stylesheet" href="../css/darkMode.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Inicio</title>
</head>

<body>
    <?php include('../includes/usernav.php'); ?>
    <div class="dark-mode">
        <label class="switch" for="input">
            <input type="checkbox" id="input">
            <span class="slider"></span>
        </label>
    </div>
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
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card p-0 mb-2">
                    <div class="card-header bg-dark text-white">Plantas</div>
                    <div class="card card-cover h-100 overflow-hidden border-2"
                        style="background-image: url('../img/icPlanta.png');background-repeat: no-repeat;background-size: 100% 100%;">
                        <!--<img class="card-img-top" src="img/01paulaeche.jpg" alt="Card image"></img>-->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 border-5 border-white">
                            <h6 class="pt-5 mt-5 mb-4 display-7 lh-2 fw-bold">Pala</h6>
                            <h6 class="pt-5 mt-5 mb-4 display-7 lh-2 fw-bold"></h6>
                        </div>
                    </div>
                    <div class="card-body about text-justify">Descubre nuestra gran variedad de plantas, árboles, cactus,
                    bonsáis, semillas...</div>
                    <!-- <div class="card-footer">3.5m seguidores</div> -->
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card p-0 mb-2">
                    <div class="card-header bg-dark text-white">Servicios</div>
                    <div class="card card-cover h-100 overflow-hidden border-2"
                        style="background-image: url('../img/pala_jardineria.png');background-repeat: no-repeat;background-size: 100% 100%;">
                        <!--<img class="card-img-top" src="img/01paulaeche.jpg" alt="Card image"></img>-->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 border-5 border-white">
                            <h6 class="pt-5 mt-5 mb-4 display-7 lh-2 fw-bold">Pala</h6>
                            <h6 class="pt-5 mt-5 mb-4 display-7 lh-2 fw-bold"></h6>
                        </div>
                    </div>
                    <div class="card-body about text-justify">Reparto a domicilio, asesoramiento personalizado...
                        ¡Déjanos
                        ayudarte!</div>
                    <!-- <div class="card-footer">3.5m seguidores</div> -->
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php') ?>

</body>

<script defer src="../js/darkMode.js"></script>

</html>