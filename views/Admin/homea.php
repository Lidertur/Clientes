<?php
    /*     session_start();
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
            .sidebar {
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                width: 220px;
                background-color: #f8f9fa;
                border-right: 1px solid #dee2e6;
                padding-top: 50px;
                z-index: 1050;
            }
            @media (max-width: 992px) {
                .sidebar {
                    position: relative;
                    width: 100%;
                    height: auto;
                    border-right: none;
                }
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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- Sidebar -->
        <div class="sidebar collapse d-lg-block" id="sidebarMenu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-success nav-link text-black mb-5 " href="?c=homea">🏡 inicio</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=registro">👷 Registros</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=ruta">👪 Rutas</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=usuario">👪 Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=movil">🚌 Móviles</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="content">
            <div class="container d-flex flex-column align-items-center justify-content-center min-vh-100" >
                <div class="card mx-auto mb-3" style="max-width: 400px; box-shadow: 0 0 55px 1px #000000;">
                    <div class="text-center mb-4">
                        <img src="img/Logo.png" alt="Logo" class="img-fluid " style="max-width: 100px;">
                    </div>
                    <div class="card-body text-center">
                        <h1 class="card-title text-success mb-4">Bienvenido Administrador</h1>
                        <a class="btn btn-success btn-lg w-100 mb-3" href="?c=registro">Reistros</a>
                        <a class="btn btn-success btn-lg w-100" href="?c=usuario">Pasajeros</a>
                        <a class="btn btn-success btn-lg w-100" href="?c=clientes">Clientes</a>
                        <a class="btn btn-success btn-lg w-100" href="?c=ruta">Rutas</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
