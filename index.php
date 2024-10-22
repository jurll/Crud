<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Definir las credenciales
$usuario_correcto = 'jurl';
$contraseña_correcta = '2696224';

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario'])) {
    mostrarFormulario();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $contraseña = trim($_POST['contraseña']);
    if ($usuario === $usuario_correcto && $contraseña === $contraseña_correcta) {
        $_SESSION['usuario'] = $usuario;
        mostrarFormulario();
    } else {
        $error = "Usuario o contraseña incorrectos.";
        mostrarLogin($error);
    }
} else {
    mostrarLogin();
}

function mostrarLogin($error = '') {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
    </head>
    <body>
        <h2>Iniciar Sesión</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </body>
    </html>
    <?php
}

function mostrarFormulario() {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Seguro</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function toggleOtherInput(selectElement, inputId) {
                var inputElement = document.getElementById(inputId);
                if (selectElement.value === 'otro' || selectElement.value === 'Otra') {
                    inputElement.style.display = 'block';
                } else {
                    inputElement.style.display = 'none';
                }
            }
        </script>
    </head>
    <body>
        <form method="post" action="registrar.php">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <h2>1. Código <input type="text" name="codigo" placeholder="Ingrese aquí el código" required></h2>
            <h2>2. Dirección <input type="text" name="direccion" placeholder="Ingrese aquí la dirección" required></h2>
            
            <h2>3. Estado en la ruta</h2>
            <select name="estado_ruta" onchange="toggleOtherInput(this, 'otro_estado_ruta')">
                <option>Enrutado</option>
                <option>Desubicado</option>
                <option>Fraude</option>
                <option>Por averiguar</option>
                <option value="otro">Otro</option>
            </select>
            <input type="text" id="otro_estado_ruta" name="otro_estado_ruta" placeholder="Especificar otro" style="display:none;">
            
            <h2>4. Tipo de vivienda</h2>
            <select name="tipo_vivienda" onchange="toggleOtherInput(this, 'otro_tipo_vivienda')">
                <option>Residencial</option>
                <option>Comercial</option>
                <option>Oficial</option>
                <option>Usos Compartidos</option>
                <option value="otro">Otro</option>
            </select>
           <input type="text" id="otro_tipo_vivienda" name="otro_tipo_vivienda" placeholder="Especificar otro" style="display:none;">
           
           
            <h2>5. Tiene medidor</h2>
            <select name="tiene_medidor">
                <option>Si</option>
                <option>No</option>
                <option>Sin Matricula</option>
            </select>

            <h2>6. Lectura <input type="text" name="lectura" placeholder='ingrese aqui la lectura'></h2>
            
            
            <h2>7. Marca de Medidor <input type="text" name="marca_medidor" placeholder="Ingrese aquí la marca"></h2>
            <h2>8. Edad del Medidor <input type="text" name="edad_medidor" placeholder="Ingrese aquí el año del medidor"></h2>
            
            <h2>9. Estado del Medidor</h2>
            <select name="estado_medidor" onchange="toggleOtherInput(this, 'otro_estado_medidor')">
                <option>Buen Estado</option>
                <option>Frenado</option>
                <option>Dañado</option>
                <option>Tapado</option>
                <option value="otro">Otro</option>
            </select>
            <input type="text" id="otro_estado_medidor" name="otro_estado_medidor" placeholder="Especificar otro" style="display:none;">
            
            <h2>10. Número de Medidor <input type="text" name="numero_medidor" placeholder="Ingrese aquí el número del medidor"></h2>
            
            <h2>11. Estado de la acometida</h2>
            <select name="estado_acometida" onchange="toggleOtherInput(this, 'otro_estado_acometida')">
                <option>Buena</option>
                <option>Caja Sin Tapa</option>
                <option>Predio en Construcción</option>
                <option>Sin llave de Paso</option>
                <option>Lote</option>
                <option value="Otra">Otra</option>
            </select>
            <input type="text" id="otro_estado_acometida" name="otro_estado_acometida" placeholder="Especificar otro" style="display:none;">
            
            <h2>12. Acceso a la lectura</h2>
            <select name="acceso_lectura" onchange="toggleOtherInput(this, 'otro_acceso_lectura')">
                <option>Fácil</option>
                <option>Obstáculo</option>
                <option>No Permiten Ingresar</option>
                <option>Es un Edificio sin Portero</option>
                <option value="Otra">Otra</option>
            </select>
            <input type="text" id="otro_acceso_lectura" name="otro_acceso_lectura" placeholder="Especificar otro" style="display:none;">
            
            <h2>13. Georeferencia <input type="text" name="georeferencia" placeholder="Ingrese aquí la dirección"></h2>
            <h2>14. Número de Habitantes en el Predio <input type="number" name="numero_habitantes" placeholder="Ingrese aquí el número"></h2>
            <h2>15. Código de Servicio de Energía <input type="text" name="codigo_servicio" placeholder="Ingrese aquí el código"></h2>
            <h2>16. Nombre del Propietario o Arrendatario <input type="text" name="nombre_propietario" placeholder="Ingrese aquí el nombre"></h2>
            <h2>17. Número de Cédula <input type="text" name="cedula" placeholder="Ingrese aquí el número de cédula"></h2>
            <h2>18. Número de Teléfono <input type="text" name="telefono" placeholder="Ingrese aquí el número de teléfono"></h2>
            <h2>19. Correo Electrónico <input type="email" name="correo" placeholder="Ingrese aquí el correo"></h2>
            <h2>20. Notas <input type="text" name="notas" placeholder="Ingrese aquí las notas"></h2>
            
            <button type="submit" name="register" >Registrar</button>
        </form>
    </body>
    </html>
    <?php
}
?>