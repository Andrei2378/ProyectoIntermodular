let currentPage = 1;
let numElementos = 10;
let totalPaginas = 0;


function solicitudApi(page) {
    //Hacemos el fetch del listado de plantas
    fetch("https://perenual.com/api/species-list?key=sk-moqF664646f3269423897&edible=1&page=" + page)
        .then((res) => {
            if (!res.ok) { // comprobamos si la URL es correcta
                throw new Error("Error: " + res.status); //Devuelve el estado del error
            }
            return res.json(); //Devuelve al siguiente .then la respuesta convertida a json
        })
        .then((data) => { //Manejamos la información

            //mostrar plantas
            let main = document.getElementById("main");
            main.innerHTML = "";
            for (let i = 0; i < numElementos; i++) {
                if (data.data[i]) {
                    mostrarPlantas(data.data[i]);
                }
            }

            totalPaginas = data.last_page;
            updatesPaginacion();
        })
        .catch((err) => { //Recoge y muestra el error
            console.log("Catch " + err);
        })
}

function updatesPaginacion() {
    //Deshabilitamos el boton anterior cuando estamos en la pagina 1
    document.getElementById("btn-prev").disabled = currentPage === 1;
    //Deshabilitamos el boton siguiente cuando estamos en la ultima pagina
    document.getElementById("btn-next").disabled = currentPage === totalPaginas;
    let nums = document.getElementById("numeros");
    nums.innerHTML = "";
    for (let i = 1; i <= 13; i++) {

        let btn = document.createElement("button");

        btn.innerText = i;
        btn.classList.add("paginacion" + i);
        //btn.classList.remove.add("active-page");
        if (i == currentPage) {
            btn.classList.add("active-page");
        }
        btn.addEventListener("click", function () {
            currentPage = i;
            solicitudApi(currentPage);
        })
        nums.appendChild(btn);
    }
}

//Funcionamiento botones
document.getElementById("btn-prev").addEventListener("click", function () {
    if (currentPage > 1) {
        let elemento = document.getElementsByClassName("paginacion" + currentPage)[0];
        elemento.classList.remove("active-page");
        currentPage--;
        let elementoNuevo = document.getElementsByClassName("paginacion" + currentPage)[0];
        elementoNuevo.classList.add("active-page");
        solicitudApi(currentPage);
    }
});

document.getElementById("btn-next").addEventListener("click", function () {
    if (currentPage < totalPaginas) {
        let elemento = document.getElementsByClassName("paginacion" + currentPage)[0];
        elemento.classList.remove("active-page");
        currentPage++;
        let elementoNuevo = document.getElementsByClassName("paginacion" + currentPage)[0];
        elementoNuevo.classList.add("active-page");
        solicitudApi(currentPage);
    }
});

function mostrarPlantas(planta) {
    let plantaHtml = "";
    let id_planta = planta.id;
    let foto = planta.default_image.small_url;
    let nombre = planta.common_name;
    let nombre_cientifico = planta.scientific_name;
    let div = document.createElement("div");
    div.classList.add("info_planta");
    div.setAttribute("id", "divPlanta");

    if (foto == undefined) {
        foto = "../img/plantaPorDefecto.jpg";
    }

    plantaHtml =
        `<figure> 
        <img id='${id_planta}' src='${foto}' alt='foto'>
        </figure>
        <div class='nombres'>
        <p>${nombre}</p>
        <p>${nombre_cientifico}</p>
        </div>`;
    div.innerHTML += plantaHtml;
    document.getElementById("main").appendChild(div);
    document.getElementById(id_planta).style.cursor = "pointer";

    document.getElementById(id_planta).addEventListener("click", function (event) {
        console.log(event.target.id);
        // accedemos al objeto event donde hay informacion sobre el evento,
        // dentro de target podemos encontrar el id de la imagen
        let id = event.target.id;
        //Pasamos el id por URL
        //location.href = "planta.php?id=" + id;

        // Convertimos el id en una cadena JSON
        let idJSON = JSON.stringify(id);
        // Guardamos el array definido en localStorage
        localStorage.setItem('id', idJSON);

        location.href = "../views/planta.view.php";
    });
}

document.getElementById("prov").addEventListener("change", elTiempo);

function elTiempo(event) {
    let idProvincia = event.target.value;
    fetch("https://www.el-tiempo.net/api/json/v2/provincias/" + idProvincia)
        .then((res) => {
            if (!res.ok) { // comprobamos si la URL es correcta
                throw new Error("Error: " + res.status); //Devuelve el estado del error
            }
            return res.json(); //Devuelve al siguiente .then la respuesta convertida a json
        })
        .then((data) => {
            let minima = data.ciudades[0].temperatures.min;
            let maxima = data.ciudades[0].temperatures.max;
            let estadoCielo = data.ciudades[0].stateSky.description;

            let iconoCielo;
            switch (estadoCielo.toLowerCase()) {
                case 'despejado':
                    iconoCielo = '☀️';
                    break;
                case 'nubes':
                case 'nublado':
                    iconoCielo = '☁️';
                    break;
                case 'lluvia':
                    iconoCielo = '🌧️';
                    break;
                case 'tormenta':
                    iconoCielo = '⛈️';
                    break;
                case 'nieve':
                    iconoCielo = '❄️';
                    break;
                default:
                    iconoCielo = '🌈';
            }

            document.getElementById("tiempo").innerHTML = `
                <div>
                    <span class="close">&times;</span>
                    <h2>Información Meteorológica</h2>
                    <p><strong>Temperatura mínima:</strong> ${minima}°C</p>
                    <p><strong>Temperatura máxima:</strong> ${maxima}°C</p>
                    <p><strong>Estado del cielo:</strong> ${estadoCielo} ${iconoCielo}</p>
                </div>
            `;
        })
        .catch((error) => {
            console.error("Error fetching data: ", error);
            document.getElementById("tiempo").innerText = "Error al obtener los datos del tiempo.";
        });
}

solicitudApi(currentPage);

document.addEventListener("DOMContentLoaded", function () {
    const loaderWrapper = document.getElementById('loader-wrapper');
    const main = document.getElementById('main');

    // Simular la carga de contenido con un retraso de 3 segundos (3000 ms)
    setTimeout(function () {
        loaderWrapper.style.display = 'none';
        main.style.display = 'block';
    }, 1000)
    // Ajusta el tiempo según sea necesario
});

