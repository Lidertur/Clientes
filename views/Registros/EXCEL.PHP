<?php
/*     error_reporting(E_ALL);
    ini_set("display_errors",1);
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ?c=login'); // Si no está autenticado, redirigir al login
        exit;
    }
    // Verificar si el rol es admin
    if ($_SESSION['role'] !== 'Administrador') {
        header('Location: ?c=login'); // Si no es admin, redirigir a la página de móvil
        exit;
    } */
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= registroes.xls");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
        <table id="registroes" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>DOCUMENTO</th>
                <th>USUARIO</th>
                <th>PSL</th>
                <th>COSTO</th>
                <th>RUTA</th>
                <th>MOVIL</th>
                <th>PLACA</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($this->registro->listar() as $registro) : ?>
                    <tr>
                        <td><?=$registro['id_RE']; ?></td>
                        <td><?=$registro['fecha']; ?></td>
                        <td><?=$registro['hora']; ?></td>
                        <td><?=$registro['documento']; ?></td>
                        <td><?=$registro['nombre_usuario'] . ' ' . $registro['apellido']; ?></td>
                        <td><?=$registro['PSL']; ?></td>
                        <td><?=$registro['costo'];?></td>
                        <td><?=$registro['nombre_ruta'];?></td>
                        <td><?=$registro['N_movil'];?></td>
                        <td><?=$registro['placa']; ?></td>                        
                <?php endforeach; ?>
        </tbody>
    </table>
</head>