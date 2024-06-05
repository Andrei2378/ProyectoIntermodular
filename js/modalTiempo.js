// Obtener el modal
let modal = document.getElementById("myModal");

// Función para abrir el modal
function openModal() {
    modal.style.display = "block";
    setTimeout(function () {
        modal.classList.add("show");
    }, 10); // Añadimos un pequeño retardo para que la transición se vea correctamente
}

// Función para cerrar el modal
function closeModal() {
    modal.classList.remove("show");
    setTimeout(function () {
        modal.style.display = "none";
    }, 500); // Esperamos a que la animación termine antes de ocultar el modal
}

// Cuando el usuario hace clic fuera del modal, lo cierra
window.onclick = function (event) {
    if (event.target == modal) {
        closeModal();
    }
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

            document.getElementById("tiempo2").innerHTML = `
                <div>
                    <span class="close">&times;</span>
                    <h2>Información Meteorológica</h2>
                    <p><strong>Temperatura mínima:</strong> ${minima}°C</p>
                    <p><strong>Temperatura máxima:</strong> ${maxima}°C</p>
                    <p><strong>Estado del cielo:</strong> ${estadoCielo} ${iconoCielo}</p>
                </div>
            `;

            // Abre el modal cuando se obtienen los datos del tiempo
            openModal();
        })
        .catch((error) => {
            console.error("Error fetching data: ", error);
            document.getElementById("tiempo").innerText = "Error al obtener los datos del tiempo.";
        });
}
