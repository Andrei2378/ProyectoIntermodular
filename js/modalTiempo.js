/*
// Obtener el modal
let modal = document.getElementById("myModal");

// Obtener el botón que abre el modal
let btn = document.getElementById("openModalBtn");

// Obtener el elemento <span> que cierra el modal
let span = document.getElementsByClassName("close")[0];

// Cuando el usuario hace clic en el botón, abre el modal
btn.onclick = function () {
    modal.style.display = "block";
    setTimeout(function () {
        modal.classList.add("show");
    }, 10); // Añadimos un pequeño retardo para que la transición se vea correctamente
}

// Cuando el usuario hace clic en <span> (x), cierra el modal
span.onclick = function () {
    modal.classList.remove("show");
    setTimeout(function () {
        modal.style.display = "none";
    }, 500); // Esperamos a que la animación termine antes de ocultar el modal
}

// Cuando el usuario hace clic fuera del modal, lo cierra
window.onclick = function (event) {
    if (event.target == modal) {
        modal.classList.remove("show");
        setTimeout(function () {
            modal.style.display = "none";
        }, 500); // Esperamos a que la animación termine antes de ocultar el modal
    }
}
*/