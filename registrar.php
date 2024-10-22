<?php 
session_start(); // Asegúrate de iniciar la sesión aquí

// Incluir la conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "encuestas");

// Verifica la conexión
if (mysqli_connect_errno()) {
    echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
    exit();
}

// Verificar si el formulario fue enviado
if (isset($_POST['register'])) {
    // Verificar el token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error: Token CSRF no válido.");
    }

    // Recuperar y limpiar los datos del formulario
    $codigo = trim($_POST['codigo'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $estado_ruta = trim($_POST['estado_ruta'] ?? '');
    $tipo_vivienda = trim($_POST['tipo_vivienda'] ?? '');
    $tiene_medidor = trim($_POST['tiene_medidor'] ?? '');
    $marca_medidor = trim($_POST['marca_medidor'] ?? '');
    $edad_medidor = trim($_POST['edad_medidor'] ?? '');
    $estado_medidor = trim($_POST['estado_medidor'] ?? '');
    $numero_medidor = trim($_POST['numero_medidor'] ?? '');
    $estado_acometida = trim($_POST['estado_acometida'] ?? '');
    $acceso_lectura = trim($_POST['acceso_lectura'] ?? '');
    $georeferencia = trim($_POST['georeferencia'] ?? '');
    $numero_habitantes = (int)trim($_POST['numero_habitantes'] ?? 0);
    $codigo_servicio = trim($_POST['codigo_servicio'] ?? '');
    $nombre_propietario = trim($_POST['nombre_propietario'] ?? '');
    $cedula = trim($_POST['cedula'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $notas = trim($_POST['notas'] ?? '');
    $lectura = trim($_POST['lectura'] ?? '');

    // Recuperar y limpiar los datos adicionales
    $otro_estado_ruta = trim($_POST['otro_estado_ruta'] ?? '');
    $otro_tipo_vivienda = trim($_POST['otro_tipo_vivienda'] ?? '');
    $otro_estado_medidor = trim($_POST['otro_estado_medidor'] ?? '');
    $otro_estado_acometida = trim($_POST['otro_estado_acometida'] ?? '');
    $otro_acceso_lectura = trim($_POST['otro_acceso_lectura'] ?? '');

    // Reemplazar los valores "Otro" u "Otra" por el contenido de los campos adicionales
    if ($estado_ruta === 'otro') {
        $estado_ruta = $otro_estado_ruta;
    }
    if ($tipo_vivienda === 'otro') {
        $tipo_vivienda = $otro_tipo_vivienda;
    }
    if ($estado_medidor === 'otro') {
        $estado_medidor = $otro_estado_medidor;
    }
    if ($estado_acometida === 'Otra') {
        $estado_acometida = $otro_estado_acometida;
    }
    if ($acceso_lectura === 'Otra') {
        $acceso_lectura = $otro_acceso_lectura;
    }

    // Verificar si el código ya existe
    $stmt = $conex->prepare("SELECT * FROM datos WHERE codigo = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $resultado_existente = $stmt->get_result();

    if ($resultado_existente->num_rows > 0) {
        echo "<h3 class='bad'>¡El código ya existe!</h3>";
    } else {
        // Realizar la consulta de inserción
        $consulta = "INSERT INTO datos (codigo, direccion, estado_ruta, tipo_vivienda, tiene_medidor, marca_medidor, edad_medidor, estado_medidor, numero_medidor, estado_acometida, acceso_lectura, georeferencia, numero_habitantes, codigo_servicio, nombre_propietario, cedula, telefono, correo, notas, lectura) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $conex->prepare($consulta);
        $stmt->bind_param("ssssssssssssssssssss", $codigo, $direccion, $estado_ruta, $tipo_vivienda, $tiene_medidor, $marca_medidor, $edad_medidor, $estado_medidor, $numero_medidor, $estado_acometida, $acceso_lectura, $georeferencia, $numero_habitantes, $codigo_servicio, $nombre_propietario, $cedula, $telefono, $correo, $notas, $lectura);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<h3 class='ok'>¡Datos enviados correctamente!</h3>";
        } else {
            echo "<h3 class='bad'>¡Ups, ha ocurrido un error!</h3>";
        }
    }
}
?>
