<?php
require_once './composer/vendor/autoload.php';
require_once '../model/conexion.php';

session_start();

if (isset($_GET['license_plate']) && isset($_GET['tipo'])) {

    $license_plate = $_GET['license_plate'];

    $tipo = $_GET['tipo'];

    $row = traerReservasPorPlacas($license_plate);

    $fecha_inicio = $row['fecha'];
    $fecha_fin = $row['fecha_salida'];

    eliminarReserva($license_plate);

    if ($tipo === "P"){
        $row = traerReservasPorUsuario($license_plate);

        $cedula = $row['cedula'];
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];
        $email = $row['email'];
        $placa = $license_plate;

        eliminarReservaUsuario($license_plate);
    }
    else {

        $id = $_SESSION['id'];
        $row = traerReservasPorID($id);

        $cedula = $row['cedula'];
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];
        $email = $row['email'];
        $placa = $license_plate;

    }
    
    $cobro_por_minuto = 2000 / 60;

    if ($tipo === "P"){

        date_default_timezone_set('America/Bogota');  // Establece la zona horaria de Colombia
        $fecha_fin = date('Y-m-d H:i:s');
    
        // Crear objetos DateTime
        $inicio = new DateTime($fecha_inicio);
        $fin = new DateTime($fecha_fin);
    
        // Calcular la diferencia
        $diferencia = $inicio->diff($fin); // Devuelve un objeto DateInterval
    
        // Obtener la diferencia en minutos
        $minutos_diferencia = ($diferencia->h * 60) + $diferencia->i;
    
        // Calcular el cobro según la diferencia de minutos
        $cobro_usuario = $minutos_diferencia * $cobro_por_minuto;

            // Redondear el cobro
        $cobro_usuario = round($cobro_usuario);

        // Mostrar el cobro como un precio (sin decimales, con separador de miles)
        $cobro_usuario_formateado = number_format($cobro_usuario, 0, ',', '.');

        $totalPagar = $cobro_usuario_formateado;

    }
    else {

        // Crear objetos DateTime
        $inicio = new DateTime($fecha_inicio);
        $fin = new DateTime($fecha_fin);
    
        // Calcular la diferencia
        $diferencia = $inicio->diff($fin); // Devuelve un objeto DateInterval
    
        // Obtener la diferencia en minutos
        $minutos_diferencia = ($diferencia->h * 60) + $diferencia->i;
    
        // Calcular el cobro según la diferencia de minutos
        $cobro_usuario = $minutos_diferencia * $cobro_por_minuto;

            // Redondear el cobro
        $cobro_usuario = round($cobro_usuario);

        // Mostrar el cobro como un precio (sin decimales, con separador de miles)
        $cobro_usuario_formateado = number_format($cobro_usuario, 0, ',', '.');

        $totalPagar = $cobro_usuario_formateado;

    }
    
    $pdf = new TCPDF();
    

    // Establecer las propiedades del documento
    $pdf->SetCreator('Your Application');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Factura');
    
    // Añadir una página
    $pdf->AddPage();
    
    // Establecer la fuente
    $pdf->SetFont('helvetica', '', 12);
    
    
    // Contenido
    $pdf->Cell(0, 10, "Cédula: $cedula", 0, 1);
    $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1);
    $pdf->Cell(0, 10, "Teléfono: $telefono", 0, 1);
    $pdf->Cell(0, 10, "Email: $email", 0, 1);
    $pdf->Cell(0, 10, "Placa: $placa", 0, 1);
    $pdf->Cell(0, 10, "Número de minutos: $minutos_diferencia", 0, 1);
    $pdf->Cell(0, 10, "Total a pagar: $totalPagar COP", 0, 1);
    
    // Salida del PDF al navegador
    $pdf->Output('factura-' . $cedula . '.pdf', 'D');
    
    regresar("factura");
}
?>