<?php
    include "../controller/logic.php";
    $reservedSpaces = traerEspaciosReservados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar - SafeParkingZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link type="../image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png">
    <script>
        const reservedSpaces = <?php echo json_encode($reservedSpaces); ?>;
    </script>
</head>
<body>
<script src="../js/nav.js"></script>
<nav></nav>
<!-- Header -->
<header class="header">
<center>
    <img src="../Imagenes/logo.png" width="150px" alt="Logo de SafeParkingZone" class="logo">
    <h1 class="header-title">Reserva tu Espacio en SafeParkingZone</h1>
    <p class="text-hover">Tu espacio seguro para estacionar</p>

</center>
</header>

<!-- Mensaje de reserva -->

<?php

    $reservationMessage = isset($_SESSION['reservationMessage']) ? $_SESSION['reservationMessage'] : null;
    unset($_SESSION['reservationMessage']);

    if (!empty($reservationMessage)) {
        echo "<div class='alert alert-info'>$reservationMessage</div>";
    }

?>

<!-- Formulario de Reserva -->
<div class="form-container">
    <form id="reservationForm" action="../controller/reservar.php" method="POST">
        <div class="mb-3">
            <label for="licensePlate" class="form-label">Placa</label>
            <input type="text" class="form-control" id="licensePlate" name="licensePlate" required>
        </div>
        <div class="mb-3">
            <label for="vehicleType" class="form-label">Tipo de Vehículo</label>
            <select class="form-select" id="vehicleType" name="vehicleType" required>
                <option value="">Selecciona</option>
                <option value="Carro">Carro</option>
                <option value="moto">Moto</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">Espacio Seleccionado</label>
            <input type="text" class="form-control" value="" id="selectedSpace" name="espacio" readonly required>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">Escriba su fecha de ingreso</label>
            <input type="datetime-local" class="form-control" value="" id="selectedSpace" name="date" required>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">Cedula</label>
            <input type="text" class="form-control" value="" id="selectedSpace" name="cedula" required>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">Nombre</label>
            <input type="text" class="form-control" value="" id="selectedSpace" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">telefono</label>
            <input type="text" class="form-control" value="" id="selectedSpace" name="telefono" required>
        </div>
        <div class="mb-3">
            <label for="selectedSpace" class="form-label">email</label>
            <input type="email" class="form-control" value="" id="selectedSpace" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Reservar</button>
    </form>
</div>

<!-- Mapa del Parqueadero -->
<strong><h2 class="text-center mt-5 text-purple">Mapa del Parqueadero</h2></strong>
<div class="parking-lot" id="parkingLot"></div>
<br>

<script src="../js/reservarAdmin.js"></script>
<br>

</body>
</html>
