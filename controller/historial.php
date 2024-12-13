<?php

require_once '../model/conexion.php';
require_once './logic.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $accion = $_POST['accion'];

    if($accion == "editarReserva"){

        $id =  $_POST['id'];
        $tipo =  $_POST['tipo'];
        $license_plate =  $_POST['license_plate'];
        $space_reserved =  $_POST	['space_reserved'];
        $fecha =  $_POST['fecha'];
        $fecha_salida =  $_POST['fecha_salida'];

        $checkQuery = actualizaReserva($tipo, $license_plate, $space_reserved, $fecha, $fecha_salida, $id);

        if ($checkQuery) {

            $_SESSION['reservationMessage'] = "Edicion exitosa";
            regresar("historial");

        }
        else {
            
            $_SESSION['reservationMessage'] = "Algo fallo al editar";
            regresar("historial");

        }

        }

        elseif($accion == "eliminarReserva") {

            $license_plate =  $_POST['license_plate'];

            $checkQuery = eliminarReserva2($license_plate);

            if ($checkQuery) {

                $_SESSION['reservationMessage'] = "Eliminacion exitosa";
                regresar("historial");

            }
            else {
                
                $_SESSION['reservationMessage'] = "Algo fallo al Elminar";
                regresar("historial");

            }

        }

        elseif($accion == "editarUsuario"){

        $id =  $_POST['id'];
        $cedula =  $_POST['cedula'];
        $nombre =  $_POST['nombre'];
        $contrasena =  $_POST['contrasena'];
        $rol =  $_POST['rol'];
        $telefono =  $_POST['telefono'];
        $email =  $_POST['email'];

        $checkQuery = actualizaUsuario($id, $cedula, $nombre, $contrasena, $rol, $telefono, $email);

        if ($checkQuery) {

            $_SESSION['reservationMessage'] = "Edicion exitosa";
            regresar("historial");

        }
        else {
            
            $_SESSION['reservationMessage'] = "Algo fallo al editar";
            regresar("historial");

        }


        }

        elseif($accion == "eliminarUsuario") {

            $cedula =  $_POST['cedula'];

            $checkQuery = eliminarUsuario($cedula);

            if ($checkQuery) {

                $_SESSION['reservationMessage'] = "Eliminacion exitosa";
                regresar("historial");

            }
            else {
                
                $_SESSION['reservationMessage'] = "Algo fallo al Elminar";
                regresar("historial");

            }


        }

        else{
            
            $id =  $_POST['id'];

            $checkQuery = eliminarContacto($id);

            if ($checkQuery) {

                $_SESSION['reservationMessage'] = "Eliminacion exitosa";
                regresar("historial");

            }
            else {
                
                $_SESSION['reservationMessage'] = "Algo fallo al Elminar";
                regresar("historial");

            }


        }

}

?>