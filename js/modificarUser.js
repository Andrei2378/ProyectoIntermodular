async function obtenerDatos() {
    try {
        let contenedor = document.getElementById("contenedor");
        const url = window.location.href;
        const urlObj = new URL(url);
        const params = new URLSearchParams(urlObj.search);
        const id = params.get("id");

        console.log(id);
        //Awais hasta que la API responda
        let res = await fetch(`../../api/users.php?accion=obtenerUsuario&id=${id}`);
        let data = await res.json();
        if (data.resp === true) {
            console.log(data);
            const fragment = `
                <form id="formulario" action="" method="POST">
                        <p class="title">ModificarUsuario</p>
                        <label>
                            <input name="usuario" type="text" class="input" value="${data.data.nombre}" />
                            <span>Nombre Usuario</span>
                        </label>

                        <label>
                            <input name="correo" type="email" class="input" value="${data.data.email}" />
                            <span>Correo</span>
                            <small id='correo_msg'></small>
                        </label>

                        <label>
                            <input name="dni" type="text" class="input" value="${data.data.dni}" />
                            <span>DNI</span>
                            <small id='dni_msg'></small>
                        </label>

                        <label>
                            <input name="direccion" type="text" class="input" value="${data.data.direccion}" />
                            <span>direccion</span>
                        </label>

                        <label>
                            <input name="poblacion" type="text" class="input" value="${data.data.poblacion}" />
                            <span>poblacion</span>
                        </label>

                        <label>
                            <input name="provincia" type="text" class="input" value="${data.data.provincia}" />
                            <span>Provincia</span>
                        </label>

                        <label>
                            <input name="CP" type="text" class="input" value="${data.data.codigo_postal}" />
                            <span>codigo postal</span>
                        </label>
                        <input type='hidden' name='id' value='${id}' />
                        <button class="submit" type="submit">Guardar Cambios</button>
                </form>
            `;
            contenedor.innerHTML = '';
            contenedor.insertAdjacentHTML("beforeend", fragment);

            let correo = document.getElementById("correo");
            let DNI = document.getElementById("dni");
            let msgCorreo = document.getElementById("correo_msg");
            let msgDNI = document.getElementById("dni_msg");
            const validacionDNI = /^[0-9]{8}[A-Z]$/;
            DNI.addEventListener("input", function (event) {
                if (validacionDNI.test(DNI.value) == false) {
                    msgDNI.innerHTML = "DNI mal formado";
                    msgDNI.style.color = "red";
                    boton.disabled = true;
                    boton.style.backgroundColor = "#549258";
                } else {
                    msgDNI.innerText = "DNI correcto";
                    msgDNI.style.color = "green";
                    boton.disabled = false;
                    boton.style.backgroundColor = "#41e15c";
                }

            })


        } else {
            console.error("Datos no encontrados");
        }
    } catch (error) {
        console.error("Error al recibir datos", error);
    }
}

// Se espera que los datos estén listados
async function modificarDatos(event) {
    event.preventDefault();

    let formData = new FormData(document.getElementById("formulario"));
    fetch("../../api/users.php?accion=modificarUsuario", {
        method: "POST",
        body: formData
    })
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            Swal.fire({
                title: "Desea guardar los cambios?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed && data.resp == true) {

                    


                    Swal.fire("Cambios realizados!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Cambios no guardados!", "", "info");
                }
            });
            if (data.resp === true) {

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Vaya...",
                    text: "Algo ha ido mal",
                });
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

document.addEventListener("DOMContentLoaded", async function () {
    //Espera a que se obtengan los datos, promesa para la funcion modificarDatos()
    await obtenerDatos();
    document.getElementById("formulario").addEventListener("submit", modificarDatos);
});