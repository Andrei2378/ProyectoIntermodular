//Hacemos el fetch del listado de plantas
fetch("https://perenual.com/api/species-list?key=sk-x8SR65ccfe0157bd54158")
    .then((res) => {
        if (!res.ok) { // comprobamos si la URL es correcta
            throw new Error("Error: " + res.status); //Devuelve el estado del error
        }
        return res.json(); //Devuelve al siguiente .then la respuesta convertida a json
    })
    .then((data) => { //Manejamos la información
        for (let i = 0; i < 10; i++) { //llamamos a la funcion 10 veces, con lo cual nos muestra 10 plantas
            mostrarPlantas(data.data[i]);
        }
    })
    .catch((err) => { //Recoge y muestra el error
        console.log("Catch " + err);
    })
function mostrarPlantas(planta) {

    let plantaHtml = "";
    let id_planta = planta.id;
    let foto = planta.default_image.small_url;
    let nombre = planta.common_name;
    let nombre_cientifico = planta.scientific_name;
    let div = document.createElement("div");
    div.classList.add("info_planta");
    div.setAttribute("id", "divPlanta");

    plantaHtml =
        `<figure> ` +
        `<img id='${id_planta}' src='${foto}' alt='foto'>` +
        `</figure>` +
        `<h2>${nombre}</h2>` +
        `<h3>${nombre_cientifico}</h3>`;
    div.innerHTML += plantaHtml;
    document.body.appendChild(div);
    document.getElementById(id_planta).style.cursor = "pointer";

    document.getElementById(id_planta).addEventListener("click", function (event) {
        console.log(event.target.id);
        // accedemos al obeto event donde hay informacion sobre el evento,
        // dentro de target podemos encontrar el id de la imagen
        let id = event.target.id;
        //Pasamos el id por URL
        //location.href = "planta.php?id=" + id;

    // Convertimos el id en una cadena JSON
    let idJSON = JSON.stringify(id);
    // Guardamos el array definido en localStorage
    localStorage.setItem('id', idJSON);

    location.href = "verPlanta.html";
})
}

const paginacion = document.getElementById('paginacion');
