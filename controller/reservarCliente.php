<?php
    require_once '../model/conexion.php';
    require_once './logic.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_SESSION['id'];
        $tipo = "V";
        $licensePlate = $_POST['licensePlate'];
        $selectedSpace = $_POST['espacio'];
        $date = $_POST['date'];
        $horas = intval($_POST['horas']); 
        $date2 = new DateTime($date);
        $date2->modify("+$horas hours");
        $fecha_salida = $date2->format('Y-m-d H:i');


        $result = reservar1($licensePlate);

        if ($result->num_rows <= 0) {

            $result = reservar2($selectedSpace);

            if ($result->num_rows > 0) {
                
                $result = reservar3($selectedSpace, $date);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc(); 
                    $_SESSION['reservationMessage'] = "El espacio está reservado entre las " . $row['fecha'] . " y las " . $row['fecha_salida'];
                    regresar("reservar");

                }
                else {
                    $_SESSION['reservationMessage'] = insertar2($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida);
                    regresar("reservar");

                }

            }
            else {
                $_SESSION['reservationMessage'] = insertar2($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida);
                regresar("reservar");

            }

        }
        else {

            $_SESSION['reservationMessage'] = "El vehiculo ya se encuentra en este parqueadero";
            regresar("reservar");

        }
    }



?>