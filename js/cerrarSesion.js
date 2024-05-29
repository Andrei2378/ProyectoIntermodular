let logout = document.getElementById("logout");
logout.addEventListener("click", function (event) {
    event.preventDefault();
    fetch("../logout.php", {
        method: "POST"
    })

        .then(resp => resp.json())
        .then(data => {
            if (data.success === true) {
                window.location.href = "../views/login.view.php";
            }
        });
});