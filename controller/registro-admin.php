<?php

require_once '../model/conexion.php';
require_once './logic.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['password'];$contrasena = base64_encode($contrasena);
    $rol = "admin";
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $check_result = validarUsuario($cedula);

    if ($check_result->num_rows > 0) {

        $_SESSION['reservationMessage'] = "Ya se encuentra registrado";
        regresar("registro-admin");

    }
    else {

        $conn = insertarUsuario($cedula, $nombre, $contrasena, $rol, $telefono, $email);

        if ($conn) {

            $_SESSION['reservationMessage'] = "Registro exitoso.";
            regresar("registro-admin");

        }
        
        else {

            $_SESSION['reservationMessage'] = "Error al registrar el usuario: " . $conn->error;
            regresar("registro-admin");

        }

    }

}

?>