<?php

require_once '../model/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    $nombre = $_POST['name'];
    $correo = $_POST['email']; 
    $telefono = $_POST['phone']; 
    $mensaje = $_POST['message']; 

    $conn = enviarContacto($nombre, $correo, $telefono, $mensaje);

    if ($conn) {

        $_SESSION['reservationMessage'] = "Su contacto fue enviado";
        header("Location: ../view/contacto.php");

    }
    else {

            $_SESSION['reservationMessage'] = "Error al realizar contacto";
            header("Location: ../view/contacto.php");

    }

}

?>