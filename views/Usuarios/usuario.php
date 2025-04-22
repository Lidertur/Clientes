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
        <title>Usuarios</title>
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
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=usuario">👪 Pasajeros</a>
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
                        <h1 class="text-center">Inventario Usuarios</h1>
                        <a class="btn btn-success mb-4 float-end" href= "?c=usuario&a=Formcrear">Agregar</a>
                        <div class="table-responsive">
                            <table id="usuario" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Acciones</th>
                                        <th>id_U</th>
                                        <th>documento</th>
                                        <th>nombre</th>
                                        <th>apellido</th>
                                        <th>telefono</th>
                                        <th>correo</th>
                                        <th>direccion></th>
                                        <th>cargo</th>
                                        <th>Base</th>
                                        <th>zona</th>
                                        <th>psl</th>
                                        <th>id_C</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                        <?php foreach ($this->Registro->listar() as $Registro): ?>
                                            <tr>
                                                <td>
                                                    <a href="?c=usuario&a=Formcrear&id_U=<?= $usuario['id_U']; ?>" class="btn btn-warning btn-sm" title="Editar">✏️</a>
                                                    <a href="?c=usuario&a=Borrar&id_U=<?= $usuario['id_U']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')" title="Eliminar">🗑️</a>
                                                </td>
                                                <td><?=$registro['id_U'] ?></td>
                                                <td><?=$registro['documento'] ?></td>
                                                <td><?=$registro['nombre'] ?></td>
                                                <td><?=$registro['apellido'] ?></td>
                                                <td><?=$registro['telefono'] ?></td>
                                                <td><?=$registro['correo'] ?></td>
                                                <td><?=$registro['direccion'] ?></td>
                                                <td><?=$registro['cargo'] ?></td>
                                                <td><?=$registro['Base'] ?></td>
                                                <td><?=$registro['zona'] ?></td>
                                                <td><?=$registro['psl'] ?></td>
                                                <td><?=$registro['id_C'] ?></td>
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
                $('#usuarios').DataTable({
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
