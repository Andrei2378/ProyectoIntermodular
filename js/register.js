let formulario = document.querySelector(".form");
const validacionGmail = /^[^\s@]+@gmail\.com$/;
const validacionDNI = /^[0-9]{8}[A-Z]$/;

formulario.addEventListener("submit", function (event) {
    event.preventDefault();
    let usuario = document.getElementById("usuario");
    let email = document.getElementById("correo");
    let DNI = document.getElementById("DNI");
    let direccion = document.getElementById("direccion");
    let poblacion = document.getElementById("poblacion");
    let provincia = document.getElementById("provincia");
    let CP = document.getElementById("CP");
    let pass1 = document.getElementById("pass1");
    let pass2 = document.getElementById("pass2");
    //let divError = document.getElementById("error");
    let divExito = document.getElementById("exito");

    let errores = new Map();

    if (usuario.value == "") {
        errores.set("Nombre_vacio", new Error("El nombre esta vacío"));
        usuario.style.border = "2px solid red";
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
    //divError.innerHTML = "";

    // Verifica si hay errores en el Map
    if (errores.size !== 0) {
        // Itera sobre cada valor en el Map
        errores.forEach((error) => {
            // Concatena el mensaje de error al contenido existente de divError
            //divError.innerHTML += `${error.message} <br>`;
        });
        // Muestra divError después de acumular todos los errores
        //divError.style.display = "block";
        window.scrollTo({ top: 0, behavior: "smooth" });
    } else {

        //divExito.innerHTML = "Usuario registrado correctamente!";
        //divExito.style.display = "block";

        //Recolectamos los datos del formulario para enviarlos al servidor
        let formData = new FormData(formulario);
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }
        fetch("../api/users.php?accion=registrarUsuario", {
            method: "POST",
            body: formData
        })
            .then(resp => resp.text())
            .then(data => {
                console.log(data);
                if (data.resp === true) {
                    Swal.fire({
                        icon: "success",
                        title: "Bienvenido!",
                        text: "Registrado con exito!"
                    });
                    setTimeout(function () {
                        location.href = "../views/login.view.php";
                    }, 2000)
                } else if (data.resp === 3) {
                    console.log(data.message);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Correo ya existente!"
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: "Error inesperado",
                    text: "Intentelo de nuevo más tarde!",
                    icon: "question"
                });
                console.error("Error:", error);
            });
    }
});
/*
document.addEventListener("input", function () {

    let email = document.getElementById("correo").value;
    //let mensaje = document.getElementById("mensaje");
    let boton = document.getElementById("boton");

    if (validacionGmail.test(email) == false) {
       // mensaje.innerHTML = "Correo mal formado";
        //mensaje.style.color = "red";
        boton.disabled = true;
        boton.style.backgroundColor = "#549258";
    } else {
        //mensaje.innerText = "Correo correcto";
        //mensaje.style.color = "green";
        boton.disabled = false;
        boton.style.backgroundColor = "#41e15c";
    }
    console.log(email);
    fetch("../api/users.php?accion=comprobarUsuario", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email: email })
    })
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if (data.resp === true) {
               // mensaje.innerText = "";
                if (email != "") {
                  //  mensaje.innerText = "Correo ya existente";
                   // mensaje.style.color = "red";
                    boton.disabled = true;
                    boton.style.backgroundColor = "#549258";
                } else {
                   // mensaje.innerText = "Correo vacio";
                   // mensaje.style.color = "red";
                    boton.disabled = true;
                    boton.style.backgroundColor = "#549258";
                }
            }
        })
        .catch(error => {
            Swal.fire({
                title: "Error inesperado",
                text: "Intentelo de nuevo más tarde!",
                icon: "question"
            });
            console.log("Error:", error);
        });
});
*/