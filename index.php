<?php
include "./controller/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <link type="image/png" sizes="16x16" rel="icon" href="Imagenes/logo.png" />
    <title>SafeParkingZone</title>
  </head>
  <body>
    
    <script src="./js/nav.js"></script>
    <nav></nav>
    <!-- Header -->
    <header
      class="d-flex justify-content-center align-items-center p-3"
      style="background-color: #4b0082; color: white"
    >
      <img src="Imagenes/logo.png" width="120px" alt="Logo SafeParkingZone" />
      <h1 class="ms-3">SafeParkingZone</h1>
    </header>

    <main>
      <!-- Reseña mejorada -->
      <section class="text-center py-4">
        <p class="fs-5">
          Bienvenido a <strong>SafeParkingZone</strong>, tu aliado para
          estacionar sin preocupaciones. Nos especializamos en brindarte
          <span style="color: #4b0082">seguridad</span>,
          <span style="color: #4b0082">comodidad</span> y
          <span style="color: #4b0082">accesibilidad</span> para tus reservas.
          Estés donde estés, siempre tendrás un lugar seguro esperando por ti.
        </p>
      </section>

      <!-- Carrusel -->
      <div
        id="carouselExample"
        class="carousel slide my-4"
        data-bs-ride="carousel"
        data-bs-interval="3000"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="Imagenes/1.png"
              class="d-block w-100 img-fluid"
              alt="Primer slide"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-uppercase">Reserva Fácil</h5>
              <p>Gestiona tus reservas desde cualquier lugar.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="Imagenes/2.png"
              class="d-block w-100 img-fluid"
              alt="Segundo slide"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-uppercase">Espacios Seguros</h5>
              <p>Encuentra espacios protegidos y confiables.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="Imagenes/3.png"
              class="d-block w-100 img-fluid"
              alt="Tercer slide"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-uppercase">Acceso Personalizado</h5>
              <p>Clientes y administradores con acceso exclusivo.</p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>

      <!-- Botón de Reserva -->
      <div class="text-center my-4">
        <a
          href="/reservar.php"
          class="btn btn-primary btn-lg"
          style="background-color: #4b0082; border: none"
          >Reserva ahora</a
        >
      </div>
    </main>

    <!-- Footer -->
    <footer
      class="text-center p-3"
      style="background-color: #4b0082; color: white"
    >
      <p>
        &copy; 2024 SafeParkingZone. Diseñado con
        <span style="color: #ffd700">❤</span> para tu comodidad.
      </p>
    </footer>
  </body>
</html>
