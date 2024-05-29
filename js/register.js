let formulario = document.querySelector(".form");

formulario.addEventListener("submit", function (event) {
    event.preventDefault();
    let usuario = document.getElementById("usuario");
    let correo = document.getElementById("correo");
    let DNI = document.getElementById("DNI");
    let direccion = document.getElementById("direccion");
    let poblacion = document.getElementById("poblacion");
    let provincia = document.getElementById("provincia");
    let CP = document.getElementById("CP");
    let pass1 = document.getElementById("pass1");
    let pass2 = document.getElementById("pass2");
    let divError = document.getElementById("error");
    let divExito = document.getElementById("exito");

    const validacionDNI = /^[0-9]{8}[A-Z]$/;
    const validacionGmail = /^[^\s@]+@gmail\.com$/;

    let errores = new Map();

    if (usuario.value == "") {
        errores.set("Nombre_vacio", new Error("El nombre esta vacío"));
        usuario.style.border = "2px solid red";
    }

    if (correo.value == "") {
        errores.set("Correo_vacio", new Error("El correo esta vacío"));
        correo.style.border = "2px solid red";
    } else if (validacionGmail.test(correo.value) == false) {
        errores.set("Correo_invalido", new Error("El correo no es válido"));
        correo.style.border = "2px solid red";
    }

    if (validacionDNI.test(DNI.value) === false) {
        errores.set("DNI_invalido", new Error("El DNI no es válido"));
        DNI.style.border = "2px solid red";
    }


    if (direccion.value == "") {
        errores.set("direccion_vacia", new Error("La dirección esta vacía"));
        direccion.style.border = "2px solid red";
    }

    if (poblacion.value == "") {
        errores.set("poblacion_vacia", new Error("La población está vacía"));
        poblacion.style.border = "2px solid red";
    }

    if (provincia.value == "") {
        errores.set("provincia_vacia", new Error("La provincia está vacía"));
        provincia.style.border = "2px solid red";
    }

    if (CP.value == "") {
        errores.set("CP_vacio", new Error("El codigo postal esta vacío"));
        CP.style.border = "2px solid red";
    }

    if (pass1.value == "" || pass2.value == "") {
        errores.set("passVacia", new Error("La constraseña no puede estar vacía"));
        pass1.style.border = "2px solid red";
        pass2.style.border = "2px solid red";
    } else if (pass1.value != pass2.value) {
        errores.set("noPassIgual", new Error("Las contraseñas no coinciden"));
        pass1.style.border = "2px solid red";
        pass2.style.border = "2px solid red";
    }

    // Limpia el contenido de divError
    divError.innerHTML = "";

    // Verifica si hay errores en el Map
    if (errores.size !== 0) {
        // Itera sobre cada valor en el Map
        errores.forEach((error) => {
            // Concatena el mensaje de error al contenido existente de divError
            divError.innerHTML += `${error.message} <br>`;
        });
        // Muestra divError después de acumular todos los errores
        divError.style.display = "block";
        window.scrollTo({ top: 0, behavior: "smooth" });
    } else {
        //Recolectamos los datos del formulario para enviarlos al servidor
        let formData = new FormData(formulario);
        for(let [key, value] of formData.entries()){
            console.log(key, value);
        }

        fetch("../api/users.php?accion=registrarUsuario", {
            method: "POST",
            body: formData
        })
            .then(resp => resp.json())
            .then(data => {
                console.log(data);
                if (data.resp === true) {
                    divError.style.display = "none";
                    divExito.innerText = "Usuario registrado con exito!";
                    divExito.style.display = "block";
                    window.scrollTo({ top: 0, behavior: "smooth" });
                    setTimeout(function () {
                        location.href = "../views/login.view.php";
                    }, 2000)
                } else if (data.resp === 3) {
                    console.log(data.message);
                    divError.style.display = "block";
                    divError.textContent = "El correo ya existe";
                    window.scrollTo({ top: 0, behavior: "smooth" });
                }
            })
            .catch(error => {
                divError.style.display = "block";
                divError.textContent = "Error inesperado, intentelo nuevamente más tarde!";
                console.error("Error:", error);
            });
    }
});
