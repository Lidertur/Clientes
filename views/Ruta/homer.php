<?php
           /* session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ?c=login'); // Si no está autenticado, redirigir al login
        exit;
    } 

    if ($_SESSION['role'] !== 'Administrador') {
        header('Location: ?c=login'); // Si no es admin, redirigir a la página de móvil
        exit;
    } */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio Administrador</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
        <style>
            
            @media (max-width: 992px) {

                .content {
                    margin-left: 0;
                }
            }
            .content {
                margin-top: 50px;
                margin-left: 100px;
                padding: 0px;
            }
            @media (max-width: 992px) {
                .content {
                    margin-left: 0;
                    padding: 10px;
                }
            }
            .cuadro{
                margin-left: 70px;
            }
        </style>
    </head>
    <body class="bg-light">
        <!-- Main Content -->
        <div class="content">
            <div class="container d-flex flex-column align-items-center justify-content-center min-vh-100" >
                <div class="card mx-auto mb-3" style="max-width: 400px; box-shadow: 0 0 55px 1px #000000;">
                    <div class="text-center mb-4">
                        <img src="img/Logo.png" alt="Logo" class="img-fluid " style="max-width: 100px;">
                    </div>
                    <div class="card-body text-center">
                        <h1 class="card-title text-success mb-4">
                            Bienvenido Ruta <?= htmlspecialchars($rutaSeleccionada); ?> - Móvil <?= htmlspecialchars($movilSeleccionado); ?>
                        </h1>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="" name="" placeholder="cédula">
                        </div>
                        <div id="info-conductor" style="display: none;" class="alert alert-info mt-2"></div>
                        <button type="submit" class="btn btn-success w-100">Enviar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
                document.getElementById('documento').addEventListener('blur', function () {
                    const cedula = this.value;
                    if (cedula) {
                        fetch('?c=home&a=obtenerDatosConductor', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: new URLSearchParams({ cedula })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const infoDiv = document.getElementById('info-conductor');
                            if (data.error) {
                                infoDiv.style.display = 'block';
                                infoDiv.className = 'alert alert-danger';
                                infoDiv.textContent = data.error;
                            } else {
                                infoDiv.style.display = 'block';
                                infoDiv.className = 'alert alert-info';
                                infoDiv.innerHTML = `
                                    <strong>Nombre:</strong> ${data.nombre} ${data.apellido}<br>
                                `;
                            }
                        })
                        .catch(err => console.error('Error:', err));
                    }
                });
            </script>
    </body>
</html>