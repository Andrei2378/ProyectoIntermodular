function setCookie(nombre, valor, tiempo) {
    let expira = "";
    if (tiempo) {
        let date = new Date();
        date.setTime(date.getTime() + (tiempo * 24 * 60 * 60 * 1000)); //Dias de duración
        expira = ";expires=" + date.toUTCString(); // pasamos el tiempo a string
    }
    document.cookie = nombre + "=" + (valor || "") + expira + ";path=/"; //creacion de cookie
}

function deleteCookie(nombre) {
    // Establecer la fecha de expiración en el pasado para eliminar la cookie
    document.cookie = nombre + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
}

function getCookie(nombre) {
    let nombreIgual = nombre + "=";
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.startsWith(nombreIgual)) { //Si la cookie coincide con el combre que buscamos
            return cookie.substring(nombreIgual.length); //La devolvemos
        }
    }
    return null; //Cookie no encontrada
}

// Función para activar el modo oscuro
function enableDarkMode() {
    document.body.classList.add('dark');
    setCookie("darkMode", "enabled", 7);
}

// Función para desactivar el modo oscuro
function disableDarkMode() {
    document.body.classList.remove('dark');
    deleteCookie("darkMode");
}

// Función para alternar el modo oscuro
function toggleDarkMode() {
    if (getCookie('darkMode') === 'enabled') {
        disableDarkMode();
    } else {
        enableDarkMode();
    }
}

// Verificar el estado del modo oscuro al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('input');
    if (getCookie('darkMode') === 'enabled') {
        enableDarkMode();
        input.checked = true;
    }

    // Escuchar el evento 'change' del interruptor
    input.addEventListener('change', toggleDarkMode);
});