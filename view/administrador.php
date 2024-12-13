<?php
include "../controller/logic.php";
$resultados = traeEspacios();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador - SafeParkingZone</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/admisnitrador.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link type="../image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png" />
    <script>
        const resultados = <?php echo json_encode($resultados); ?>;
    </script>
  </head>
  <body>
    <script src="../js/nav.js"></script>
    <nav></nav>
    <div class="container admin-container">
      <div
        style="
          width: 100%;
          height: 100%;
          background-color: #4e1c92;
          color: #fff;
          margin: 0;
        "
      >
        <!-- Título -->
        <center>
          <h1 style="padding: 40px 0">Reserva tu Espacio en SafeParkingZone</h1>
        </center>
      </div>

      <!-- Row 1: Overview -->
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Totales Presenciales</h5>
              <p class="card-text display-5">36</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Totales Virtuales</h5>
              <p class="card-text display-5">27</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Ocupados Prensenciales</h5>
              <p  id="presenciales" class="card-text display-5" id="occupiedSpaces">25</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Ocupados Vrituales</h5>
              <p id="virtuales" class="card-text display-5" id="occupiedSpaces">25</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Disponibles Presenciales</h5>
              <p id="precensialD" class="card-text display-5" id="availableSpaces">25</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Espacios Disponibles Virtuales</h5>
              <p id="virtualD" class="card-text display-5" id="availableSpaces">25</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Row 2: Detailed Statistics -->
      <div class="row g-4 mt-4">
        
    </div>
    <br />

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admisnitrador.js"></script>
  </body>
</html>