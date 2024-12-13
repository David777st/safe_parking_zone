<?php

require_once '../model/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['password'];$contrasena = base64_encode($contrasena);
    $rol = "client";
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $check_result = validarUsuario($cedula);

    if ($check_result->num_rows > 0) {

        $_SESSION['reservationMessage'] = "Ya se encuentra registrado";
        header("Location: ../view/registro.php");

    }
    else {

        $conn = insertarUsuario($cedula, $nombre, $contrasena, $rol, $telefono, $email);

        if ($conn) {

            // Cargar el autoload de Composer
            require './PHPMailer/src/Exception.php';
            require './PHPMailer/src/PHPMailer.php';
            require './PHPMailer/src/SMTP.php';

            // Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configuración del servidor SMTP
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'safeparkingzone.senatps.club'; // Servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'safeparkingzone@safeparkingzone.senatps.club'; // Correo del remitente
                $mail->Password = 'David123Colombia_'; // Contraseña del correo
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465; // Puerto SMTP (comúnmente 587 o 465)
                // Configuración del remitente y destinatarios
                $mail->setFrom('correo@tudominio.com', 'Info SafeParkingZone');
                $mail->addAddress($email);
                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Registro en safeParkingZone';
                $mail->Body    = '<p>El usuario se registro correctamente.</p>';

                // Enviar el correo
                $mail->send();
                $_SESSION['reservationMessage'] = "Registro exitoso.";
                header("Location: ../view/registro.php");

            } catch (Exception $e) {
                $_SESSION['reservationMessage'] = "Error al envio, revise su correo digitado.";
                header("Location: ../view/registro.php");
            }
        }
        
        else {

            $_SESSION['reservationMessage'] = "Error al registrar el usuario: " . $conn->error;
            header("Location: ../view/registro.php");

        }

    }

}



/* Agregarlo a adminregistro --- mensaje reserva  -- estilos de mensaje --- estilos general responsive */

?>