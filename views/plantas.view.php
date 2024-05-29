<?php
include '../verificarsesion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/plantas.css" />
    <!-- <link rel="stylesheet" href="../headers/CSS/estilosMenuAdmin.css"> -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Información Plantas</title>

</head>

<body>
    <header>
        <h1 #titulo>Listado de Plantas</h1>
        <nav id="menuPrincipal" class="menu-principal">
            <ul class="menu-lista">
                <li class="menu-item"><a href="inicio.view.php" class="menu-link">Inicio</a></li>
                <li class="menu-item"><a href="plantas.view.php" class="menu-link">Plantas</a></li>
                <li class="menu-item"><a href="usuariosprod.view.php" class="menu-link">Productos</a></li>

                <li class="menu-item" id="provinciaTiempo">
                    <select id="prov">
                        <option value="03">Alacant/Alicante</option>
                        <option value="04">Almería</option>
                        <option value="01">Araba/Álava</option>
                        <option value="33">Asturias</option>
                        <option value="02">Albacete</option>
                        <option value="08">Barcelona</option>
                        <option value="48">Bizkaia</option>
                        <option value="09">Burgos</option>
                        <option value="06">Badajoz</option>
                        <option value="35">Las Palmas</option>
                        <option value="12">Castelló/Castellón</option>
                        <option value="39">Cantabria</option>
                        <option value="13">Ciudad Real</option>
                        <option value="15">A Coruña</option>
                        <option value="16">Cuenca</option>
                        <option value="10">Cáceres</option>
                        <option value="11">Cádiz</option>
                        <option value="14">Córdoba</option>
                        <option value="07">Illes Balears</option>
                        <option value="17">Girona</option>
                        <option value="20">Gipuzkoa</option>
                        <option value="18">Granada</option>
                        <option value="19">Guadalajara</option>
                        <option value="21">Huelva</option>
                        <option value="22">Huesca</option>
                        <option value="23">Jaén</option>
                        <option value="24">León</option>
                        <option value="25">Lleida</option>
                        <option value="27">Lugo</option>
                        <option value="30">Murcia</option>
                        <option value="28">Madrid</option>
                        <option value="29">Málaga</option>
                        <option value="31">Navarra</option>
                        <option value="32">Ourense</option>
                        <option value="34">Palencia</option>
                        <option value="36">Pontevedra</option>
                        <option value="26">La Rioja</option>
                        <option value="37">Salamanca</option>
                        <option value="38">Santa Cruz de Tenerife</option>
                        <option value="40">Segovia</option>
                        <option value="41">Sevilla</option>
                        <option value="42">Soria</option>
                        <option value="43">Tarragona</option>
                        <option value="44">Teruel</option>
                        <option value="45">Toledo</option>
                        <option value="46">València/Valencia</option>
                        <option value="47">Valladolid</option>
                        <option value="49">Zamora</option>
                        <option value="50">Zaragoza</option>
                        <option value="51">Ceuta</option>
                        <option value="52">Melilla</option>
                    </select>
                </li>
                <li id="tiempo" style="color: white;"></li>

            </ul>
            <button id="logout" href="../logout.php" class="menu-link"><svg xmlns="http://www.w3.org/2000/svg"
                    width="30" height="30.029296875" viewBox="0 0 1024 1025">
                    <path fill="#000000"
                        d="M896 1025H448q-53 0-90.5-37.5T320 897v-64q0-27 18.5-45.5t45-18.5t45.5 18.5t19 45t18.5 45.5t45.5 19h256q26 0 45-19t19-45V192q0-26-19-45t-45-19H512q-27 0-45.5 19T448 192.5T429 238t-45.5 19t-45-19t-18.5-46v-64q0-53 37.5-90.5T448 0h448q53 0 90.5 37.5T1024 128v769q0 53-37.5 90.5T896 1025M704 384q26 0 45 19t19 45v129q0 26-19 45t-45 19H256v101q0 11-13.5 19t-32 7t-29.5-12L18 556Q0 538 0 512.5T18 469l163-200q11-11 29.5-11.5t32 7.5t13.5 20v99z" />
                </svg></button>
        </nav>

    </header>
    
    <main id="main">

    </main>

    <!-- Ventana Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            
        </div>
    </div>

    <div id="paginador">
        <button id="btn-prev">Anterior</button>
        <div id="numeros"></div>
        <button id="btn-next">Siguiente</button>
    </div>
</body>
<script src="../js/funciones.js" defer></script>
<script src="../js/modal.js" defer></script>
<script src="../js/cerrarSesion.js" defer></script>

</html>