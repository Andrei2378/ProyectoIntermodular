<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/Gardenia.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/inicio.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Pasarela de Pago</title>
</head>

<body>
    <?php include('../includes/usernav.php'); ?>
    <main class="container my-5">
        <h2 class="text-center mb-4">Pasarela de Pago</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div id="marron" class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Información de Pago</h5>
                        <form id="formPago" action="../api/compra.php?accion=procesarPago" method="POST">
                            <div class="mb-3">
                                <label for="nombreTitular" class="form-label">Nombre del Titular</label>
                                <input type="text" class="form-control" id="nombreTitular" name="nombreTitular"
                                    placeholder="Ej: Juan Pérez" required>
                            </div>
                            <div class="mb-3">
                                <label for="numeroTarjeta" class="form-label">Número de Tarjeta</label>
                                <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta"
                                    placeholder="1234 5678 9012 3456" maxlength="19" required>
                                <small id="tarjeta" style="display: none;">El número de tarjeta debe tener el formato:
                                    1234 5678 9012
                                    3456.</small>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fechaExpiracion" class="form-label">Fecha de Expiración</label>
                                    <input type="text" class="form-control" id="fechaExpiracion" name="fechaExpiracion"
                                        placeholder="MM/AA" maxlength="5" required>
                                    <small id="fecha" style="display: none;">La fecha de expiración debe tener el
                                        formato: MM/AA.</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123"
                                        required>
                                    <small id="CVV" style="display: none;">El CVV debe ser un número de 3
                                        dígitos.</small>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-success w-100">Completar Pago</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.getElementById('formPago').addEventListener('submit', function (event) {
            event.preventDefault();
            let valido = true;
            // Obtener valores del formulario
            const numeroTarjeta = document.getElementById('numeroTarjeta').value;
            const fechaExpiracion = document.getElementById('fechaExpiracion').value;
            const cvv = document.getElementById('cvv').value;

            // Validar formato de la tarjeta
            const regexTarjeta = /^\d{4} \d{4} \d{4} \d{4}$/;
            const regexFecha = /^(0[1-9]|1[0-2])\/\d{2}$/;
            const regexCVV = /^\d{3}$/;

            if (!regexTarjeta.test(numeroTarjeta)) {
                let tarjeta = document.getElementById("tarjeta");
                tarjeta.style.color = "red";
                tarjeta.style.display = "block";
                valido = false;
            }

            if (!regexFecha.test(fechaExpiracion)) {
                let fecha = document.getElementById("fecha");
                fecha.style.color = "red";
                fecha.style.display = "block";
                valido = false;
            }

            if (!regexCVV.test(cvv)) {
                let CVV = document.getElementById("CVV");
                CVV.style.color = "red";
                CVV.style.display = "block";
                valido = false;
            }

            if(!valido){
                return
            }

            // Simulación de proceso de pago
            Swal.fire({
                        icon: "success",
                        title: "Pago correcto!",
                        text: "Pago procesado exitosamente. ¡Gracias por tu compra!"
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.href = '../api/carrito.php?accion=vaciarCarrito'; // Redirigir para vaciar el carrito
                        }
                        
                    })
        });
    </script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>