fetch("../../api/users.php?accion=obtenerUsuarios")
    .then(resp => resp.json())
    .then(data => {
        if (data.resp) {
            renderizarUsuarios(data);
        } else {
            console.log(data.message);
        }
    })
    .catch(error => console.error("Error:", error));

function renderizarUsuarios(data) {
    let row = document.getElementsByClassName("row")[0];
    row.innerHTML = "";

    // Crear una tabla con clases de Bootstrap
    let tabla = `
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Población</th>
                        <th>Provincia</th>
                        <th>Código Postal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
        `;

    // Iterar sobre los usuarios y añadir cada uno a la tabla
    data.users.forEach((user) => {
        tabla += `
                <tr>
                    <td>${user.id_usuario}</td>
                    <td>${user.nombre}</td>
                    <td>${user.email}</td>
                    <td>${user.dni}</td>
                    <td>${user.direccion}</td>
                    <td>${user.poblacion}</td>
                    <td>${user.provincia}</td>
                    <td>${user.codigo_postal}</td>
                    <td colspan='2'>
                    <a href='./modificarusuarios.php?id=${user.id_usuario}' class="btn btn-primary btn-sm">Modificar</a>
                    <button class='eliminar btn btn-danger btn-sm' name='eliminar' data-id='${user.id_usuario}'>Eliminar</button>
                    </td>
                    </tr>
            `;
    });

    // Cerrar la tabla
    tabla += `
                </tbody>
            </table>
        `;

    // Insertar la tabla en el contenedor
    row.insertAdjacentHTML("beforeend", tabla);

    document.querySelectorAll('.eliminar').forEach((button) => {
        button.addEventListener('click', function eliminarUsuario(event) {
            event.preventDefault(); // Corregido el uso de preventDefault

            const idUsuario = event.target.getAttribute('data-id'); // Obtén el ID del usuario

            // Asegúrate de que el ID esté disponible
            if (idUsuario) {
                fetch(`../../api/users.php?accion=eliminarUsuario&id=${idUsuario}`, {
                    method: 'GET' // O 'POST' si tu API requiere otro tipo de método
                })
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.resp) {
                            // Elimina la fila de la tabla (opcional, solo si quieres quitarla del DOM)
                            event.target.closest('tr').remove(); // Elimina la fila donde está el botón
                            alert('Usuario eliminado con éxito');
                        } else {
                            console.log(data.message);
                            alert('No se pudo eliminar el usuario');
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert('Hubo un error al eliminar el usuario');
                    });
            } else {
                console.log("ID de usuario no encontrado");
            }
        });
    });


}

let buscar = document.getElementById("buscar");
buscar.addEventListener("input", filtrar);

console.log(buscar);

function filtrar() {
    let nombre = document.getElementById("buscar").value.toLowerCase(); // Asegúrate de tener el id 'buscar' en el input
    fetch("../../api/users.php?accion=obtenerUsuarios")
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if (data.resp) {
                let filtrados = data.users;
                if (nombre) {
                    // Filtrar los usuarios por el nombre
                    filtrados = filtrados.filter(user => user.nombre.toLowerCase().includes(nombre));
                }
                // Llamar a renderizarUsuarios con los datos filtrados
                renderizarUsuarios({ resp: true, users: filtrados });
            } else {
                console.log(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
}