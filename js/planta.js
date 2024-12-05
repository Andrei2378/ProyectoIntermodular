//recuperamos la cadena de texto con los datos almacenados en el local Storage
let idJSON = localStorage.getItem("id");

//Convertir la cadena JSON 
let id = JSON.stringify(idJSON);

let cadena = id;
/**
 * Damos formato al ID
 */
let formatID = cadena.substring(3, cadena.length - 3);
console.log(formatID);

fetch("https://perenual.com/api/species/details/" + formatID + "?key=sk-Hc53674f48aba08083897")

    .then(res => res.json())
    .then((data) => {
        datosPlanta(data);
    })
    .catch((err) => {
        console.log("Catch " + err);
    })

/**
 * Funcion para mostrar todos los datos de una planta en concreto
 * @param mixed info
 * 
 * @return [type]
 */
function datosPlanta(info) {
    const plantaHTML = "";
    const nombre_comun = info.common_name;
    const nombre_cientifico = info.scientific_name;
    const imagen = info.default_image.small_url;
    const sol = info.sunlight;
    const clima = info.hardiness_location;
    const riego = info.watering_general_benchmark.value;
    const familia = info.family;
    const tipo = info.type;
    const tamaño = info.dimension;
    const zonaMinima = info.hardiness.min;
    const zonaMaxima = info.hardiness.max;

    let venenosa = info.poisonous_to_humans;
    if (venenosa == 0) {
        venenosa = "no poisonous"
    } else if (venenosa == 1) {
        venenosa = "poisonous"
    }

    const descripcion = info.description;
    console.log(tamaño);

    if (imagen == undefined) {
        imagen = "../img/plantaPorDefecto.jpg";
    }

    const divImg = document.getElementById("imagen");
    const img = document.createElement("img");
    const datos = document.getElementById("datos");


    img.src = imagen;
    img.style.borderRadius = "10px";
    divImg.appendChild(img);
    const cardA = `
    <div class="container">
        <div class="card-body">
            <h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#1ddb1a" d="m8.317 3.259l.001.002l.003.003l.009.01l.031.037c.027.032.065.077.113.137c.096.118.233.29.399.511c.332.442.783 1.079 1.267 1.868A22.312 22.312 0 0 1 12 9.6a22.312 22.312 0 0 1 1.86-3.773c.484-.79.935-1.426 1.267-1.868a17.652 17.652 0 0 1 .512-.648l.031-.037l.009-.01l.003-.003v-.002A.751.751 0 0 1 17 3.75v6.556a9.32 9.32 0 0 1 1.138-1.812c.472-.577.915-.935 1.261-1.155c.173-.11.32-.183.432-.232a2.067 2.067 0 0 1 .189-.071l.018-.006l.008-.002h.003l.002-.001h.002A.75.75 0 0 1 21 7.75v10A3.25 3.25 0 0 1 17.75 21H6.25A3.25 3.25 0 0 1 3 17.75v-10a.75.75 0 0 1 .947-.724h.002l.002.001l.003.001l.008.002l.018.006a1.44 1.44 0 0 1 .19.071c.111.05.258.123.43.232c.347.22.79.578 1.262 1.155A9.362 9.362 0 0 1 7 10.306V3.75a.75.75 0 0 1 1.317-.491M4.5 9.212v8.538c0 .966.784 1.75 1.75 1.75h11.5a1.75 1.75 0 0 0 1.75-1.75V9.212a4.55 4.55 0 0 0-.2.232c-.745.909-1.704 2.657-2.312 5.943a.75.75 0 0 1-1.488-.137V6.04a23.18 23.18 0 0 0-.36.57c-.913 1.49-1.93 3.533-2.406 5.795a.75.75 0 0 1-1.468 0C10.79 10.143 9.773 8.1 8.86 6.61c-.123-.2-.243-.39-.36-.57v9.21a.75.75 0 0 1-1.487.137C6.404 12.1 5.445 10.353 4.7 9.444a5.296 5.296 0 0 0-.201-.232"/></svg>
            ${nombre_comun}
            </h2>
            <p>
            <i>${nombre_cientifico}</i>
            </p>
        </div>
    </div>
    `;

    //Al ser un literal, se usa esta funcion para añadirlo como hijo
    datos.insertAdjacentHTML("beforeend", cardA);

    const cardB = `
    <div class="card mt-2" style="background:rgba(0, 0, 0, 0.2)">
        <div class="card-body">
            <li style = "list-style: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#0284c7" d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/></svg>
            <b>Watering:</b> ${riego} days            
            </li>

            <li style = "list-style: none">           
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eab308" d="M11 5V1h2v4zm6.65 2.75l-1.375-1.375l2.8-2.875l1.4 1.425zM19 13v-2h4v2zm-8 10v-4h2v4zM6.35 7.7L3.5 4.925l1.425-1.4L7.75 6.35zm12.7 12.8l-2.775-2.875l1.35-1.35l2.85 2.75zM1 13v-2h4v2zm3.925 7.5l-1.4-1.425l2.8-2.8l.725.675l.725.7zM12 18q-2.5 0-4.25-1.75T6 12q0-2.5 1.75-4.25T12 6q2.5 0 4.25 1.75T18 12q0 2.5-1.75 4.25T12 18"/></svg>
            <b>Sunlight:</b> ${sol}
            </li>

            <li style = "list-style: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#1ddb1a" d="M21.5 11a1.5 1.5 0 0 0-.324.037L19.67 8.43A1.495 1.495 0 1 0 17.092 7h-2.184a1.483 1.483 0 0 0-1.732-.963L11.67 3.428A1.495 1.495 0 1 0 9.092 2H6.908A1.496 1.496 0 1 0 4.33 3.428l-1.506 2.61a1.5 1.5 0 1 0 .012 2.921l1.502 2.603a1.47 1.47 0 0 0-.008 1.866l-1.506 2.61a1.5 1.5 0 1 0 .012 2.921l1.502 2.603A1.495 1.495 0 1 0 6.908 23h2.184a1.496 1.496 0 1 0 2.57-1.438l1.502-2.603A1.478 1.478 0 0 0 14.908 18h2.184a1.496 1.496 0 1 0 2.57-1.438l1.502-2.603A1.499 1.499 0 1 0 21.5 11m-3-4a.5.5 0 1 1-.5.5a.5.5 0 0 1 .5-.5m-5 0a.5.5 0 1 1-.5.5a.5.5 0 0 1 .5-.5m-3-5a.5.5 0 1 1-.5.5a.5.5 0 0 1 .5-.5m-5 0a.5.5 0 1 1-.5.5a.5.5 0 0 1 .5-.5m-3 6a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m1.178.418a1.47 1.47 0 0 0-.008-1.846l1.506-2.61A1.483 1.483 0 0 0 6.908 3h2.184a1.483 1.483 0 0 0 1.732.963L12.33 6.57a1.47 1.47 0 0 0-.008 1.847l-1.51 2.615a1.49 1.49 0 0 0-1.72.967H6.908a1.49 1.49 0 0 0-1.72-.967ZM11 12.5a.5.5 0 1 1-.5-.5a.5.5 0 0 1 .5.5m-5 0a.5.5 0 1 1-.5-.5a.5.5 0 0 1 .5.5M2.5 18a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m3 5a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m5 0a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m1.822-4.582l-1.51 2.615a1.489 1.489 0 0 0-1.72.967H6.908a1.489 1.489 0 0 0-1.72-.967l-1.51-2.615a1.47 1.47 0 0 0-.008-1.846l1.506-2.61A1.483 1.483 0 0 0 6.908 13h2.184a1.483 1.483 0 0 0 1.732.963l1.507 2.608a1.47 1.47 0 0 0-.01 1.847M13.5 18a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m5 0a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5m1.822-4.581l-1.51 2.615a1.489 1.489 0 0 0-1.72.966h-2.184a1.489 1.489 0 0 0-1.72-.966l-1.51-2.616a1.47 1.47 0 0 0-.016-1.856l1.502-2.603A1.478 1.478 0 0 0 14.908 8h2.184a1.483 1.483 0 0 0 1.732.963l1.506 2.608a1.47 1.47 0 0 0-.008 1.848M21.5 13a.5.5 0 1 1 .5-.5a.5.5 0 0 1-.5.5"/></svg>
            <b>Family:</b> ${familia}
            </li>

            <li style = "list-style: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="#65a30d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 15h10v4a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2zm5-6a6 6 0 0 0-6-6H3v2a6 6 0 0 0 6 6h3m0 0a6 6 0 0 1 6-6h3v1a6 6 0 0 1-6 6h-3m0 3V9"/></svg>
            <b>Type:</b> ${tipo}
            </li>

            <li style = "list-style: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V2m0 20l-4-4m4 4l4-4M12 2L8 6m4-4l4 4"/></svg>
            <b>Height:</b> ${tamaño}
            </li>

            <li style = "list-style: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><defs><mask id="IconifyId18db83b6757add7ed4"><g fill="none" stroke-linejoin="round" stroke-width="4"><path fill="#fff" fill-rule="evenodd" stroke="#fff" d="M33.958 44s.024-3.47 0-4.24a18.993 18.993 0 0 0 4.477-3.325A18.94 18.94 0 0 0 44 23c0-10.493-8.507-19-19-19S6 12.507 6 23a18.94 18.94 0 0 0 5.565 13.435a19.088 19.088 0 0 0 2.879 2.365c.515.345 1.01.666 1.56.96V44z" clip-rule="evenodd"/><path fill="#000" stroke="#000" d="M18 27a4 4 0 0 0 4-4l-4-4a4 4 0 0 0 0 8Zm14 0a4 4 0 0 1-4-4l4-4a4 4 0 0 1 0 8Z"/><path stroke="#000" stroke-linecap="round" d="m22 34l2.938-3L28 33.897"/></g></mask></defs><path fill="#000000" d="M0 0h48v48H0z" mask="url(#IconifyId18db83b6757add7ed4)"/></svg>
            <b>Poisonous: </b>${venenosa}
            </li>
        </div>
    </div>
    `;
    datos.insertAdjacentHTML("beforeend", cardB);

    const cardC = `
        <div>
            <p>${descripcion}</p>
        </div>
    `;
    datos.insertAdjacentHTML("beforeend", cardC);


    // Recuperamos el canvas del HTML
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    // Cargamos la primera imagen usando un objeto imagen para obtener el tamaño de la imagen
    const firstImageUrl = "https://perenual.com/storage/image/hardiness/og/0.png";
    const firstImage = new Image();
    firstImage.onload = () => {
        // Definimos el tamaño del Canvas

        canvas.width = firstImage.width;
        canvas.height = firstImage.height;

        // Cargamos la imagen base
        const imageUrls = ["https://perenual.com/storage/image/hardiness/og/0.png"];

        for (var x = zonaMinima; x <= zonaMaxima; x++) {
            const url = "https://perenual.com/storage/image/hardiness/og/" + x + ".png";
            imageUrls.push(url);
        }
        /*
        * Pintamos desde la zona climatica minima 
        * a la zona climatica maxima en la que se desarrolla la planta
        */
        for (let i = 0; i < imageUrls.length; i++) {
            const img = new Image();
            img.onload = () => {
                if (i > 0) {
                    ctx.globalAlpha = 0.8;
                }
                ctx.drawImage(img, 0, 0);
                ctx.globalAlpha = 1.0;
            };
            img.src = imageUrls[i];
        }
    };
    firstImage.src = firstImageUrl;

}

