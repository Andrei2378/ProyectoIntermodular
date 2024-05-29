<link rel="stylesheet" href="../../css/register.css">
<style>
    form {
        display: block;
        width: 400px;
        margin: 10% 40%;
        border: 1px solid black;
        padding: 10px;
        border-radius: 5px;
    }

    form span {
        float: left;
        width: 150px;
        margin-top: 10px;
    }

    form input {
        margin-top: 10px;
        width: 150px;
    }
</style>
<script>
    const url = window.location.href;
    const urlObj = new URL(url);
    const params = new URLSearchParams(urlObj.search);
    const id = params.get("id");

    console.log(id);

    fetch(`../../api/users.php?accion=obtenerUsuario&id=${id}`)
        .then(res => res.json())
        .then(data => {
            if (data.resp === true) {
                const fragment = `
                <form action="" method="POST">
            <p class="title">ModificarUsuario</p>
            <label>
                <input name="usuario" type="text" class="input" value="${data.data.nombre}" />
                <span>Nombre Usuario</span>
            </label>

            <label>
                <input name="correo" type="email" class="input" value="${data.data.email}" />
                <span>Correo</span>
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
            <button class="submit" type="submit">Guardar Cambios</button>
    </form>
                `;
                document.body.insertAdjacentHTML("beforeend", fragment);
            }
        })

</script>