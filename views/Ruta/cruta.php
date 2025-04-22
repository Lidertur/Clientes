<?php
//    session_start();
//    if (!isset($_SESSION['user'])) {
//        header('Location: ?c=login'); // Si no está autenticado, redirigir al login
//        exit;
//    }
//    // Verificar si el rol es admin
//    if ($_SESSION['role'] !== 'Administrador') {
//        header('Location: ?c=login'); // Si no es admin, redirigir a la página de móvil
//        exit;
//    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Conductor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    margin-top: 1000px;
                    position: relative;
                    width: 100%;
                    height: auto;
                    border-right: none;
                }
            }
            .content {
                margin-top: -200px;
                margin-left: 240px;
                padding: 200px;
            }
            @media (max-width: 992px) {
                .content {
                    margin-top: 0px;
                    margin-left: 0;
                    padding: 10px;
                }
            }
            .form-control:focus, .form-select:focus {
                border-color: #30884B;
                box-shadow: 0 0 0 0.25rem rgba(48, 136, 75, 0.25);
            }
            .card {
                margin: 0 auto;
                max-width: 500px;
            }
            .navbar-brand img {
                max-height: 50px;
            }
        </style>
    </head>
    <body class="bg-light-custom">
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
                    <a class="btn btn-success nav-link text-black mb-5" href="?c=usuario">👪 Pasajeros</a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="container mt-5">
                <div class="bg-white p-3" style="box-shadow: 0 0 55px 1px #000000;">
                    <!-- Logo -->  
                    <div class="text-center mb-4">
                        <img src="img/Logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                    </div>
                    <!-- Form -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-center mb-4"><?=$titulo ?> Conductor</h2>
                            <form method="POST" action="?c=conductor&a=<?= $p->getID_Conductor() > 0 ? 'crear': 'crear' ?>">
                                <div class="mb-3">
                                    <input name="ID_Conductor" type="hidden" value="<?= $p->getID_Conductor() ?? '' ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Número de Identificación</label>
                                    <input type="number" class="form-control" name="cedula" id="cedula" value="<?=$p->getcedula();?>" min="0" max="9999999999" required
                                    oninput="this.value = this.value.slice(0, 10)"/>
                                </div>                             
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$p->getNombre();?>" pattern="[a-zA-Z\s]+" required>
                                </div>
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?=$p->getApellido(); ?>" pattern="[a-zA-Z\s]+" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="number" class="form-control"  name="telefono" id="telefono" placeholder="Teléfono" value="<?=$p->gettelefono(); ?>" min="0" max="9999999999" required
                                    oninput="this.value = this.value.slice(0, 10)"/>
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" name="categoria" id="categoria" value="<?=$p->getcategoria(); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaVen" class="form-label">Fecha Vencimiento Licencia</label>
                                    <input type="date" class="form-control" name="fechaVen" id="fechaVen" value="<?= $p->getfechaVen(); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 mb-2"><?=$titulo?> Conductor</button>
                                <a class="btn btn-dark w-100" href="?c=conductor" >Volver al inventario</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Incluir Bootstrap JS y dependencias -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
