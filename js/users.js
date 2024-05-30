fetch("../../api/users.php?accion=obtenerUsuarios")
    .then(resp => resp.json())
    .then(data => {
        if (data.resp) {
            renderizarUsusarios(data);
        } else {
            console.log(data.message);
        }
    })
    .catch(error => console.error("Error:", error));

function renderizarUsusarios(data) {

    let row = document.getElementsByClassName("row")[0];
    row.innerHTML = "";

    data.users.forEach((user) => {
        let tarjeta = `
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><input type='hidden' name='nombre' value='${user.nombre}'/> ${user.nombre} </h2>
                                <p class="card-text"><input type='hidden' name='correo' value='${user.email}'/>Correo: ${user.email} </p>
                                <p class="card-text"><input type='hidden' name='correo' value='${user.dni}'/>Correo: ${user.dni} </p>
                                <p class="card-text"><input type='hidden' name='direccion' value='${user.direccion}'/>Direccion: ${user.direccion} </p>
                                <p class="card-text"><input type='hidden' name='poblacion' value='${user.poblacion}'/>Poblacion: ${user.poblacion} </p>
                                <p class="card-text"><input type='hidden' name='provincia' value='${user.provincia}'/>Provincia: ${user.provincia} </p>
                                <p class="card-text"><input type='hidden' name='codigo_postal' value='${user.codigo_postal}'/>Codigo postal: ${user.codigo_postal} </p>
                                <a href='./modificarusuarios.php?id=${user.id_usuario}' class="btn btn-primary" name="modificar">Modificar</a>
                            </div>
                        </div>
                    </div>
                    `;
        row.insertAdjacentHTML("beforeend", tarjeta);
    })
}


let buscar = document.getElementById("buscar");
buscar.addEventListener("input", filtrar);

console.log(buscar);

function filtrar() {
    let nombre = buscar.value.toLowerCase();
    fetch("../../api/users.php?accion=obtenerUsuarios")
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if (data.resp) {
                let filtrados = data.users;
                if (nombre) {
                    filtrados = filtrados.filter(user => user.nombre.toLowerCase().includes(nombre));
                }
                // Llamar renderizarUsuarios con los datos filtrados
                renderizarUsusarios({ resp: true, users: filtrados });
            } else {
                console.log(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
}