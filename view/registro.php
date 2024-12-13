<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="../css/registro.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png">
</head>
<body>
<script src="../js/nav.js"></script>
<nav></nav>

<?php
    session_start();
    $reservationMessage = isset($_SESSION['reservationMessage']) ? $_SESSION['reservationMessage'] : null;
    unset($_SESSION['reservationMessage']);

    if (!empty($reservationMessage)) {
        echo "<div class='alert alert-info'>$reservationMessage</div>";
    }

?>

    <div class="register-container">
        <h2 class="register-title">Regístrate en SafeParkingZone</h2>
        <form method="POST" action="../controller/registro.php">
            <div class="mb-3">
                <label for="username" class="form-label">Cedula</label>
                <input minlength="6" type="text" id="cedula" name="cedula" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" minlength="8" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Telefono</label>
                <input type="text" id="telefono" name="telefono" class="form-control"  required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control"  required>
            </div>

            <button type="submit" class="btn-primary btn-register w-100">Registrarse</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
