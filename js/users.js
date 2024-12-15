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
                    <button class='eliminar btn btn-danger btn-sm' data-id='${user.id_usuario}'>Eliminar</button>
                    </td>
                    </tr>
            `;
    });

    tabla += `
                </tbody>
            </table>
        `;

    row.insertAdjacentHTML("beforeend", tabla);

    document.querySelectorAll('.eliminar').forEach((button) => {
        button.addEventListener('click', function eliminarUsuario(event) {
            event.preventDefault(); // Evitar que el enlace se ejecute

            const idUsuario = event.target.getAttribute('data-id'); // Obtener el ID del usuario

            if (idUsuario) {
                fetch("../../api/users.php?accion=eliminarUsuario", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        'eliminar': idUsuario
                    })
                })
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.resp) {
                            // Eliminar la fila de la tabla
                            event.target.closest('tr').remove();
                            Swal.fire({
                                icon: "success",
                                title: "Exito",
                                text: "Usuario eliminado con exito!"
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Vaya...",
                                text: "Error al eliminar usuario!"
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            title: "Error inesperado",
                            text: "Intentelo de nuevo más tarde!",
                            icon: "question"
                        });
                    });
            }
        });
    });
}

let buscar = document.getElementById("buscar");
buscar.addEventListener("input", filtrar);

function filtrar() {
    let nombre = document.getElementById("buscar").value.toLowerCase(); // Asegúrate de tener el id 'buscar' en el input
    fetch("../../api/users.php?accion=obtenerUsuarios")
        .then(resp => resp.json())
        .then(data => {
            if (data.resp) {
                let filtrados = data.users;
                if (nombre) {
                    filtrados = filtrados.filter(user => user.nombre.toLowerCase().includes(nombre));
                }
                renderizarUsuarios({ resp: true, users: filtrados });
            } else {
                console.log(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
}
