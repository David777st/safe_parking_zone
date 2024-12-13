<?php
    require_once '../model/conexion.php';
    require_once './logic.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_SESSION['id'];
        $tipo = "P";
        $licensePlate = $_POST['licensePlate'];
        $selectedSpace = $_POST['espacio'];
        $date = $_POST['date']; 
        $fecha_salida = "9999-12-31 00:00:00";

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $result = reservar1($licensePlate);

        if ($result->num_rows <= 0) {

            $result = reservar2($selectedSpace);

            if ($result->num_rows > 0) {
                
                $result = reservar3($selectedSpace, $date);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc(); 
            
                    $_SESSION['reservationMessage'] = "El espacio está reservado entre las " . $row['fecha'] . " y las " . $row['fecha_salida'];
                    regresar("reservarAdmin");

                }
                else {

                    $_SESSION['reservationMessage'] = insertar($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida, $cedula, $nombre, $telefono, $email);
                    regresar("reservarAdmin");

                }

            }
            else {

                $_SESSION['reservationMessage'] = insertar($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida, $cedula, $nombre, $telefono, $email);
                regresar("reservarAdmin");

            }

        }
        else {

            $_SESSION['reservationMessage'] = "El vehiculo ya se encuentra en este parqueadero";
            regresar("reservarAdmin");

        }
    }



?>