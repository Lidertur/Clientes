<?php
// $contraseña = "";
// $hash = password_hash($contraseña, PASSWORD_DEFAULT);
// echo $hash;
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="max-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <img src="img/Logo.png" alt="Logo" class="mx-auto d-block mb-4" style="width: 80px;">

            <form method="POST" action="?c=login&a=authenticate">
                <!-- Mostrar mensaje de error -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="role" class="form-label">Tipo de Usuario</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Seleccione un rol</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Ruta">Ruta</option>
                    </select>
                </div>

                <!-- Campos para Administrador -->
                <div id="adminFields" style="display: none;">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="admin_nombre" name="admin_nombre">
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="admin_contraseña" name="admin_contraseña">
                        <button class="btn btn-outline-secondary" type="button" id="toggleAdminPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                        </div>
                    </div>
                </div>
                <!-- Campos para Cliente -->
                <div id="ClienteFields" style="display: none;">
                <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre">
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="cliente_contraseña" name="cliente_contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="toggleClientePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Campos para Ruta -->
                <div id="RutaFields" style="display: none;">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <h5 class="mb-2">Seleccione movil</h5>
                    <select id="movil" name="movil" class="form-control" required>
                        <?php foreach ($moviles as $movil): ?>
                            <option value="<?= $movil->id_M; ?>">
                                <?= htmlspecialchars($movil->N_movil); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="ruta_contraseña" name="contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="toggleRutaPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>
            </form>
        </div>
    </div>
    <script>
    function setupPasswordToggle(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);

        toggle.addEventListener('click', function () {
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    }

    // Llama a la función para cada rol
    setupPasswordToggle('toggleAdminPassword', 'admin_contraseña');
    setupPasswordToggle('toggleClientePassword', 'cliente_contraseña');
    setupPasswordToggle('toggleRutaPassword', 'ruta_contraseña');
</script>
    <script>
        const roleSelect = document.getElementById('role');
        const adminFields = document.getElementById('adminFields');
        const ClienteFields = document.getElementById('ClienteFields');
        const RutaFields = document.getElementById('RutaFields');

        roleSelect.addEventListener('change', () => {
            adminFields.style.display = 'none';
            ClienteFields.style.display = 'none';
            RutaFields.style.display = 'none';

            if (roleSelect.value === 'Administrador') {
                adminFields.style.display = 'block';
            } else if (roleSelect.value === 'Cliente') {
                ClienteFields.style.display = 'block';
            } else if (roleSelect.value === 'Ruta') {
                RutaFields.style.display = 'block';
            }
        });
    </script>
    <script>
        function mostrarCampo(id) {
            const campo = document.getElementById(id + 'Field');
            const input = document.getElementById(id);

            // Mostrar el campo si está oculto
            if (campo && campo.style.display === 'none') {
                campo.style.display = 'block';
            }

            // Si ambos están vacíos, ocultar el que no se está escribiendo
            const otro = id === 'placa' ? 'N_movil' : 'placa';
            const otroInput = document.getElementById(otro);
            const otroCampo = document.getElementById(otro + 'Field');

            if (input.value.trim() === '' && otroInput.value.trim() === '') {
                otroCampo.style.display = 'none';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#movil").select2({
                placeholder: "🔍 Busca y selecciona un móvil...",
                allowClear: true,
                width: "100%"
            });
            document.getElementById("updateForm").addEventListener("submit", function(event) {
                const seleccionado = $("#movil").val(); // id correcto
                const errorDiv = document.querySelector(".alert-danger");

                if (!seleccionado || seleccionado === "") {
                    if (!errorDiv) {
                        const newErrorDiv = document.createElement("div");
                        newErrorDiv.className = "alert alert-danger mt-3";
                        newErrorDiv.textContent = "❌ Debe seleccionar un móvil antes de continuar.";
                        document.querySelector(".card-body").prepend(newErrorDiv);
                    }
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
