function chistes() {
    fetch("https://api.chucknorris.io/jokes/random")
        .then(res => res.json())
        .then(data => {
            let chistes = document.getElementById("chistes");
            if (chistes) {
                chistes.innerText = data.value;
            } else {
                console.error("El elemento con id 'chistes' no existe.");
            }
        })
        .catch(error => {
            console.error("Error: " + error);
        });
}

setInterval(chistes, 5000);
