let formulario = document.querySelector(".form");
let user = document.getElementById("user");
let pass = document.getElementById("pass");
formulario.addEventListener("submit", function (event) {
    event.preventDefault();

    let divError = document.getElementById("error");
    let divExito = document.getElementById("exito");


    if (user.value === "" || pass.value === "") {
        divError.innerText = "Los campos usuario y contraseña no pueden estar vacios";
        divError.style.display = "block";
        user.style.border = "2px solid red";
        pass.style.border = "2px solid red";
    } else {
        let formData = new FormData(formulario);

        for (let dato of formData.entries()) {
            console.log(dato);
        }

        fetch("../api/users.php?accion=logearUsuario", {
            method: "POST",
            body: formData
        })
            .then(resp => resp.json())
            .then(data => {
                console.log(data);

                if (data.resp === true) {
                    divError.style.display = "none";
                    divExito.innerText = "Usuario logeado con exito!";
                    divExito.style.display = "block";
                    setTimeout(function () {
                        if (data.rol === "admin") {
                            location.href = "../views/adminviews/admin.view.php";
                        } else {
                            location.href = "../views/inicio.view.php";
                        }
                    }, 2000)
                    if (data.provincia) {
                        localStorage.setItem('provincia', data.provincia);
                    }
                } else if (data.resp === 1) {
                    console.log(data.message);
                    divError.style.display = "block";
                    divError.textContent = "Contraseña incorrecta";
                } else if (data.resp === 0) {
                    console.log(data.message);
                    divError.style.display = "block";
                    divError.textContent = "Correo inexistente";
                }
            })
            .catch(error => {
                divError.style.display = "block";
                divError.textContent = "Error inesperado, intentelo nuevamente más tarde!";
                console.error("Error:", error)
            });

    }
});

document.getElementById("pass").addEventListener("input", function () {
    let passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

    let validPass = document.getElementById("validPass");
    validPass.style.color = "red";

    if (pass.value == "") {
        validPass.innerText = "La contraseña no debe estar vacia";
    } else if (!/(?=.*[a-z])/.test(pass.value)) {
        validPass.innerText = "La contraseña debe tener almenos una minuscula";
    }
    else if (!/(?=.*[A-Z])/.test(pass.value)) {
        validPass.innerText = "La contraseña debe tener almenos una mayuscula";
    }
    else if (!/(?=.*\d)/.test(pass.value)) {
        validPass.innerText = "La contraseña debe tener almenos un numero";
    }
    else if (pass.value.length < 8) {
        validPass.innerText = "La contraseña debe tener minimo 8 caracteres";
    } else {
        validPass.innerText = "La contraseña es valida";
        validPass.style.color = "green";
    }
})