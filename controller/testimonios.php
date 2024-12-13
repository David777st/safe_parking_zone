<?php

require_once '../model/conexion.php';
require_once '../controller/logic.php';

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $descripcion = $_POST['descripcion'];
    date_default_timezone_set('America/Bogota');
    // Obtener la fecha actual en formato YYYY-MM-DD
    $fecha = date('Y-m-d');

    $conn =  guardarTestimonio($name, $descripcion, $fecha);

    if ($conn) {
        $_SESSION['reservationMessage'] = "Nuevo testimonio guardado exitosamente.";
    } else {
        $_SESSION['reservationMessage'] = "Error: " . $conn->error;
    }

    header("Location: ../view/inicio.php");
    exit();

}

?>