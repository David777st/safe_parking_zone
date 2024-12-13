<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - SafeParkingZone</title>
    <link href="../css/inicio.css" rel="stylesheet">  <!-- Hoja de estilos personalizada -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="../image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png"> <!-- Icono de la página -->
</head>
<body>
    <script src="../js/nav.js"></script> <!-- Archivo de JavaScript para la barra de navegación -->
    <nav></nav>

    <!-- Header -->
    <header class="header text-center">
        <img src="../Imagenes/logo.png" width="150px" alt="Logo SafeParkingZone"> 
        <h1>Bienvenidos a SafeParkingZone</h1>
        <p>Tu estacionamiento seguro y confiable</p>
    </header>

    <!-- Sección de Cards -->
    <section class="cards-section container">
        <div class="row gy-4">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="https://manofmany.com/_next/image?url=https%3A%2F%2Fapi.manofmany.com%2Fwp-content%2Fuploads%2F2023%2F01%2FMost-Popular-Cars-in-Australia.jpg&w=1024&q=75" alt="Espacio para Carros">
                    <div class="card-body">
                        <h5 class="card-title">Espacio para Carros</h5>
                        <p class="card-text">Tu carro merece lo mejor, y en SafeParkingZone lo tenemos cubierto. Estacionamientos amplios y monitoreados.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="https://th.bing.com/th/id/OIP.jIyrOgXXu4z0vM8yqri7aQHaE5?rs=1&pid=ImgDetMain" alt="Espacio para Motos">
                    <div class="card-body">
                        <h5 class="card-title">Espacio para Motos</h5>
                        <p class="card-text">Espacios diseñados para proteger tu motocicleta. Seguridad, accesibilidad y confianza en cada reserva.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Testimonios -->
    <section class="testimonials-section container">
        <h2>Testimonios de nuestros clientes</h2>
        <center><p>¿Cómo ha sido tu experiencia con nosotros? ¡Deja tu testimonio!</p></center>
        
        <form id="testimonial-form" action="../controller/testimonios.php" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="testimonial">Tu Testimonio:</label>
            <textarea id="testimonial" name="descripcion" rows="4" required></textarea>

            <button type="submit" class="btn btn-primary">Enviar Testimonio</button>
        </form>

        <div id="testimonials-list">

            <?php

                require_once '../controller/logic.php';

                $reservationMessage = isset($_SESSION['reservationMessage']) ? $_SESSION['reservationMessage'] : null;
                unset($_SESSION['reservationMessage']);

                if (!empty($reservationMessage)) {
                    echo "<div class='alert alert-info'>$reservationMessage</div>";
                }

                $testimonials = traerTestimonios();

                if (count($testimonials) > 0) {

                    foreach ($testimonials as $testimonial) {

                        echo "<div class='testimonial-item'><p><strong>" . $testimonial['nombre'] . ":</strong> " . $testimonial['descripcion'] . "</p></div>";

                    }

                } else {

                    echo "<p>No hay testimonios disponibles.</p>";
                }
            ?>
        </div>
    </section>

    <!-- Mapa de la ubicación -->
    <section class="map-section">
        <h2>¿Cómo llegar a nuestro parqueadero?</h2>
        <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15911.316302129624!2d-75.23867045628552!3d4.442892419801846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1733175763455!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 SafeParkingZone | Todos los derechos reservados</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
