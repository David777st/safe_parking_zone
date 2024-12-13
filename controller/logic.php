<?php

// Si no hay sesión, verificar cookies
if (!isset($_SESSION['id']) && isset($_COOKIE['id']) && isset($_COOKIE['rol'])) {
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['rol'] = $_COOKIE['rol'];
    $_SESSION['nombre'] = $_COOKIE['nombre'];
}

// Validar acceso
if (!isset($_SESSION['id']) && $_COOKIE['rol'] != "admin") {
    // Redirigir a la página de inicio de sesión si no está autenticado
    header("Location: ./view/ingreso.php");
    exit;
}

require_once '../model/conexion.php';

session_start();

function factura() {
    // Crear conexión
    $id = $_COOKIE['id'];

    $reservasResult  = traerReservas($id);
    // Si no hay resultados
    if ($reservasResult->num_rows <= 0) {
        
        return "No se encontraron reservas.";

    }

    // Generar la tabla como un string
    $output = '
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Placa del Vehículo</th>
                            <th>Espacio Reservado</th>
                            <th>Fecha Ingreso</th>
                            <th>Fecha Salida</th>
                            <th>Facturar</th>
                        </tr>
                    </thead>
                    <tbody>';

    // Recorrer las reservas y agregarlas a la tabla
    while ($row = $reservasResult->fetch_assoc()) {
        $output .= '<tr>
                        <td>' . htmlspecialchars($row['tipo']) . '</td>
                        <td>' . htmlspecialchars($row['license_plate']) . '</td>
                        <td>' . htmlspecialchars($row['space_reserved']) . '</td>
                        <td>' . htmlspecialchars($row['fecha']) . '</td>
                        <td>' . htmlspecialchars($row['fecha_salida']) . '</td>
                        <td>
                            <form type="POST" action="../controller/facturar.php">
                                <input type="text" name="license_plate" value='. htmlspecialchars($row['license_plate']) .' hidden>
                                <input type="text" name="tipo" value='. htmlspecialchars($row['tipo']) .' hidden>
                                <input class="btn btn-danger" id="enviar" type="submit" value="Facturar">
                            </form>
                        </td>
                    </tr>';
    }

    // Cerrar la tabla y el div
    $output .= '</tbody></table>';

    // Cerrar la conexión

    // Retornar el string con la tabla HTML
    return $output;
}

function traeEspacios(){
    $espacios = [];

    $resultado = cantidadesP();
    $resultado2 = cantidadesV();

    $row = $resultado->fetch_assoc();
    $cantidadP = $row['cantidad'];

    $row2 = $resultado2->fetch_assoc();
    $cantidadV = $row2['cantidad'];

    $espacios[0] = $cantidadP;
    $espacios[1] = $cantidadV;


    return $espacios;

}

function traerTestimonios(){
    $testimonials = traerTestimoniosM();
    return $testimonials;

}

function traerEspaciosReservados(){

    $reservedSpaces = traerEspaciosReservadosM();

    return $reservedSpaces;
    
}

function regresar($ruta){
    header("Location: ../view/".$ruta.".php");
    
}

function traerUsuario(){

    $id = $_SESSION['id']; // Obtener el nombre de usuario desde la sesión

    $resultUsuario = traerUsuarioM($id);

    if ($resultUsuario->num_rows > 0) {
        $usuarioData = $resultUsuario->fetch_assoc();
        $idUsuario = $usuarioData['id'];
        $nombreusuario = $usuarioData['nombre'];
    
    }

    return $nombreusuario;
    
}

function traerTablas($tabla){

    $resultado = traerTablasM($tabla);

    return $resultado;
    
}


?>