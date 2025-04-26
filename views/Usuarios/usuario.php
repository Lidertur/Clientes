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
            .content {
                margin-top: 50px;
                margin-left: 200px;
                padding: 0px;
            }
            .cuadro{
                margin-left: 50px;
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
                    <a class="btn btn-success nav-link text-black mb-5 " href="?c=homec">🏡 inicio</a>
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
                        <h1 class="text-center">Base de Usuarios</h1>
                        <a class="btn btn-success mb-4 float-end" href= "?c=usuario&a=Formcrear">Agregar</a>
                        <div class="table-responsive">
                            <table id="usuario" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ACCIONES</th>
                                        <th>ID</th>
                                        <th>DOCUMENTO</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>TELÉFONO</th>
                                        <th>CORREO</th>
                                        <th>DIRECCIÓN</th>
                                        <th>CARGO</th>
                                        <th>BASE</th>
                                        <th>ZONA</th>
                                        <th>PSL</th>
                                        <th>COSTO</th>
                                        <th>id_C</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->usuario->listar() as $usuario): ?>
                                    <tr>
                                        <td>
                                            <a href="?c=usuario&a=Formcrear&id_U=<?= $usuario['id_U']; ?>" class="btn btn-warning btn-sm" title="Editar">✏️</a>
                                            <a href="?c=usuario&a=Borrar&id_U=<?= $usuario['id_U']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')" title="Eliminar">🗑️</a>
                                        </td>
                                        <td><?= $usuario['id_U'] ?></td>
                                        <td><?= $usuario['documento'] ?></td>
                                        <td><?= $usuario['nombre'] ?></td>
                                        <td><?= $usuario['apellido'] ?></td>
                                        <td><?= $usuario['telefono'] ?></td>
                                        <td><?= $usuario['correo'] ?></td>
                                        <td><?= $usuario['direccion'] ?></td>
                                        <td><?= $usuario['cargo'] ?></td>
                                        <td><?= $usuario['base'] ?></td>
                                        <td><?= $usuario['zona'] ?></td>
                                        <td><?= $usuario['psl'] ?></td>
                                        <td><?= $usuario['costo']?></td>
                                        <td><?= $usuario['id_C'] ?></td>
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
                $('#usuario').DataTable({
                    scrollX: true, // Habilita el desplazamiento horizontal
                    responsive: false, // Hace la tabla adaptable
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
                    }
                });
            });
        </script>
    </body>
</html>
