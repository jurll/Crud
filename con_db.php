<?php
// con_db.php
$conex = mysqli_connect("localhost", "root", "", "encuestas");

// Verificar la conexión
if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
