<?php

require_once '../model/conexion.php';
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanear los datos recibidos del formulario
    $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['password']);
    $contrasena_validar = base64_encode($contrasena);

    // Consulta SQL para verificar las credenciales
    
    $result = login($cedula, $contrasena_validar);

    if ($result->num_rows > 0) {
        // El usuario existe, ahora verificar la contraseña
        $row = $result->fetch_assoc();
        // Contraseña correcta, iniciar sesión
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['nombre'] = $row['nombre'];
        
        // Crear cookies para recordar al usuario
        setcookie("id", $row['id'], time() + 3600, "/"); // 1 hora
        setcookie("rol", $row['rol'], time() + 3600, "/");
        setcookie("nombre", $row['nombre'], time() + 3600, "/");
        // Redirigir según el rol
        if ("admin" == $row['rol']) {
            echo "<script>window.location.href='../view/administrador.php';</script>";
        } else {
            echo "<script>window.location.href='../view/cliente.php';</script>";

        }
    } else {
        // Usuario no encontrado
        $_SESSION['reservationMessage'] = "Usuario o contraseña incorrecta";
        header("Location: ../view/ingreso.php");
    }
}

?>