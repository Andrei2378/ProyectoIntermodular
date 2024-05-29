<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/register.css">
    <title>Modificar Usuario</title>
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
</head>

<body>
    <?php

        if(isset($_GET['id'])){
            
        }

    if (isset($_POST['modificar'])) {

        ?>
        <form action="" method="POST">
            <p class="title">ModificarUsuario</p>
            <label>
                <input name="usuario" type="text" class="input" value="<?php echo $_POST['nombre'] ?>" />
                <span>Nombre Usuario</span>
            </label>

            <label>
                <input name="correo" type="email" class="input" value="<?php echo $_POST['correo'] ?>" />
                <span>Correo</span>
            </label>

            <label>
                <input name="direccion" type="text" class="input" value="<?php echo $_POST['direccion'] ?>" />
                <span>direccion</span>
            </label>

            <label>
                <input name="poblacion" type="text" class="input" value="<?php echo $_POST['poblacion'] ?>" />
                <span>poblacion</span>
            </label>

            <label>
                <input name="provincia" type="text" class="input" value="<?php echo $_POST['provincia'] ?>" />
                <span>Provincia</span>
            </label>

            <label>
                <input name="CP" type="text" class="input" value="<?php echo $_POST['codigo_postal'] ?>" />
                <span>codigo postal</span>
            </label>

            <label>
                <input name="pass" id="pass1" type="text" class="input" value="<?php echo $_POST['pass'] ?>" />
                <span>Contraseña</span>
            </label>
            <button class="submit" type="submit">Guardar Cambios</button>
        <?php } ?>
    </form>
</body>

</html>