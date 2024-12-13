<?php
include "../controller/logic.php";

$id = $_SESSION['id']; // Obtener el nombre de usuario desde la sesión

$nombreusuario = traerUsuario();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parqueadero Virtual</title>
    <!-- Vincular archivo CSS -->
    <link rel="stylesheet" href="../css/cliente.css"> <!-- Verifica que la ruta sea correcta -->
    <link rel="stylesheet" href="../css/styles.css"> <!-- Verifica que la ruta sea correcta -->
    <link type="image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png">
</head>
<body>
<script src="../js/nav.js"></script>
<nav></nav>
    <!-- Contenedor Principal -->
    <div class="container">

        <!-- Saludo y agradecimiento -->
        <div class="welcome-header">
        <img src="../Imagenes/logo.png" width="150px" alt="">
            <h1>Bienvenido, <span><?php echo $nombreusuario; ?></span>!</h1>
            <p>¡Gracias por registrarte en nuestro parqueadero virtual! Te damos la bienvenida y te invitamos a aprovechar todos los servicios que ofrecemos.</p>
        </div>

        <!-- Fila con dos cards -->
        <div class="row">
            <!-- Card para realizar reserva -->
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header">
                        <h4>Reserva tu espacio ahora</h4>
                    </div>
                    <div class="card-body">
                        <p>¡Haz tu reserva hoy mismo y asegura tu lugar! Nuestro sistema es rápido, eficiente y totalmente online. No pierdas tiempo buscando espacio, ¡nosotros lo tenemos para ti!</p>
                        
                    </div>
                </div>
            </div>


    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
