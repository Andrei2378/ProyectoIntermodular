async function obtenerDatos() {
    try {
        let contenedor = document.getElementById("contenedor");
        //Obtenemos la URL
        const url = window.location.href;
        //Creamos un objeto URL para luego poder desglosarlo
        const urlObj = new URL(url);
        //Desglosamos la url, cogiendo a partir de la ?
        const params = new URLSearchParams(urlObj.search);
        //Cogemos el id
        const id = params.get("id");

        console.log(id);
        //Await hasta que la API responda
        let res = await fetch(`../../api/users.php?accion=obtenerUsuario&id=${id}`);
        let data = await res.json();
        console.log(data);
        if (data.resp === true) {

            const fragment = `
            <div class="container mt-5">
            <form id="formulario" action="" method="POST" class="bg-light p-4 rounded">
                <h2 class="text-center mb-4">Modificar Usuario</h2>
                
                <div class="form-group">
                    <label for="usuario">Nombre Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="usuario" value="${data.data.nombre}" />
                    <small id="usuario_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input name="correo" type="email" class="form-control" id="correo" value="${data.data.email}" />
                    <small id="correo_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input name="dni" id="dni" type="text" class="form-control" value="${data.data.dni}" />
                    <small id="dni_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion" value="${data.data.direccion}" />
                    <small id="direccion_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="poblacion">Población</label>
                    <input name="poblacion" type="text" class="form-control" id="poblacion" value="${data.data.poblacion}" />
                    <small id="poblacion_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input name="provincia" type="text" class="form-control" id="provincia" value="${data.data.provincia}" />
                    <small id="provincia_msg" class="form-text"></small>
                </div>
    
                <div class="form-group">
                    <label for="CP">Código Postal</label>
                    <input name="CP" type="text" class="form-control" id="CP" value="${data.data.codigo_postal}" />
                    <small id="cp_msg" class="form-text"></small>
                </div>
    
                <input type="hidden" name="id" value="${id}" />
                
                <button id="boton" class="btn btn-primary btn-block" type="submit">Guardar Cambios</button>
            </form>
        </div>
            `;
            contenedor.innerHTML = '';
            contenedor.insertAdjacentHTML("beforeend", fragment);
            validaciones();

        } else {
            console.error("Datos no encontrados");
        }
    } catch (error) {
        console.error("Error al recibir datos", error);
    }
}

async function validaciones() {
    let msgCorreo = document.getElementById("correo_msg");
    let msgDNI = document.getElementById("dni_msg");
    let msgNombre = document.getElementById("nombre_msg");
    let msgDireccion = document.getElementById("direccion_msg");
    let msgPoblacion = document.getElementById("poblacion_msg");
    let msgProvincia = document.getElementById("provincia_msg");

    let nombre = document.getElementById("nombre");
    let direccion = document.getElementById("direccion");
    let poblacion = document.getElementById("poblacion");
    let provincia = document.getElementById("provincia");
    const validacionDNI = /^[0-9]{8}[A-Z]$/;
    const validacionGmail = /^[^\s@]+@gmail\.com$/;
    let boton = document.getElementById("boton");

    let dni = validacionDNI.test(document.getElementById("dni").value);
    let correo = validacionGmail.test(document.getElementById("correo").value);

    if (!dni) {
        msgDNI.innerHTML = "DNI mal formado";
        msgDNI.style.color = "red";
    } else {
        msgDNI.innerText = "DNI correcto";
        msgDNI.style.color = "green";
    }

    if (!correo) {
        msgCorreo.innerHTML = "formato erroneo";
        msgCorreo.style.color = "red";
    } else {
        msgCorreo.innerText = "correo correcto";
        msgCorreo.style.color = "green";
    }

    if (dni && correo) {
        boton.disabled = false;
        boton.style.backgroundColor = "#41e15c";
    } else {
        boton.disabled = true;
        boton.style.backgroundColor = "#549258";
    }

}


// Se espera que los datos estén listados
async function modificarDatos(event) {
    event.preventDefault();

    let formData = new FormData(document.getElementById("formulario"));

    Swal.fire({
        title: "¿Desea guardar los cambios?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Guardar",
        denyButtonText: `No guardar`

    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            fetch("../../api/users.php?accion=modificarUsuario", {
                method: "POST",
                body: formData
            })
                .then(resp => resp.json())
                .then(data => {
                    if (data.resp == true) {
                        Swal.fire({
                            icon: "success",
                            title: "Genia!",
                            text: "Cambios realizados"
                        });

                        setInterval(function () {
                            location.href = "./usuarios.view.php";
                        }, 1000)
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Vaya...",
                            text: "Los datos no son correctos, compruebe los campos. ",
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Vaya...",
                        text: "Algo ha ido mal",
                    });
                    console.error("Error:", error);
                });
        } else if (result.isDenied) {
            Swal.fire("Cambios no guardados!", "", "info");
        }
    });
}

document.addEventListener("DOMContentLoaded", async function () {
    //Espera a que se obtengan los datos, promesa para la funcion modificarDatos()
    await obtenerDatos();

    document.getElementById("formulario").addEventListener("submit", modificarDatos);
    document.getElementById("dni").addEventListener("input", validaciones);
    document.getElementById("correo").addEventListener("input", validaciones);
    document.getElementById("nombre").addEventListener("input", validaciones);
    document.getElementById("direccion").addEventListener("input", validaciones);
    document.getElementById("poblacion").addEventListener("input", validaciones);
    document.getElementById("provincia").addEventListener("input", validaciones);
});