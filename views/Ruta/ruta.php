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
        <title>Registros</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
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
                margin-left: 200px;
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
        <!--     Main Content -->
        <div class="content">
            <div class="container mt-5">
                <div  class="bg-white rounded-lg shadow-lg p-3">
                    <div class="text-center mb-4">
                        <img src="img/Logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                    </div>
                    <div class="container mt-5">
                        <h1 class="text-center">Inventario rutas</h1>
                        <a class="btn btn-success mb-4 float-end" href= "?c=ruta&a=Formcrear">Agregar</a>
                        <div class="table-responsive">
                            <table id="ruta" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>acciones</th>
                                        <th>Id</th>
                                        <th>nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                        <?php foreach ($this->ruta->listar() as $ruta): ?>
                                            <tr>
                                            <td>
                                            <a href="?c=ruta&a=Formcrear&id_R=<?= $ruta['id_R']; ?>" class="btn btn-warning btn-sm" title="Editar">✏️</a>
                                            <a href="?c=ruta&a=Borrar&id_R=<?= $ruta['id_R']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')" title="Eliminar">🗑️</a>
                                        </td>
                                                <td><?=$ruta['id_R'] ?></td>
                                                <td><?=$ruta['nombre'] ?></td>                                            
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script>
            // Inicialización de DataTables con soporte para desplazamiento horizontal
            $(document).ready(function () {
                $('#ruta').DataTable({
                    scrollX: true, // Habilita el desplazamiento horizontal
                    responsive: true, // Hace la tabla adaptable
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
                    }
                });
            });
        </script>
    </body>
</html>