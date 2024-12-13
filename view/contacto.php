<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctenos - SafeParkingZone</title>
    <link href="../css/contactenos.css" rel="stylesheet">
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

    <!-- Header -->
    <header class="header">
        <img src="../Imagenes/logo.png" width="150px" alt="">
        <h1>SafeParkingZone</h1> 
        <p>Tu espacio seguro para estacionar</p>
    </header>

    <!-- Servicios -->
    <section class="services-section">
        <h2>Nuestros Servicios</h2>
        <div class="services-container">
            <div class="service-item">
                <i class="bi bi-shield-lock-fill"></i>
                <p>Seguridad 24/7</p>
            </div>
            <div class="service-item">
                <i class="bi bi-camera-video-fill"></i>
                <p>Vigilancia HD</p>
            </div>
            <div class="service-item">
                <i class="bi bi-car-front-fill"></i>
                <p>Espacios Amplios</p>
            </div>
            <div class="service-item">
                <i class="bi bi-clock-fill"></i>
                <p>Acceso 24 Horas</p>
            </div>
            <div class="service-item">
                <i class="bi bi-geo-alt-fill"></i>
                <p>Ubicación Estratégica</p>
            </div>
        </div>
    </section>

    <!-- Formulario de contacto -->
    <div class="contact-form">
        <h2>Contáctanos</h2>
        <form action="../controller/contacto.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Número de Teléfono</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ingresa tu número de teléfono" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Mensaje</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Escribe tu mensaje..." required></textarea>
            </div> 
            <button type="submit" class=" btn-primary w-100">Enviar Mensaje</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SafeParkingZone | Todos los derechos reservados</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
