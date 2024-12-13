<?php 
include "../controller/logic.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/factura.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link type="image/png" sizes="16x16" rel="icon" href="../Imagenes/logo.png">
    <meta charset="UTF-8">
    <title>Factura</title>
</head>

<body>
    <script src="../js/nav.js"></script>
    <nav></nav>

    <main class="container my-5">
    <div class="factura">
        <h1 class="text-center">Generar Factura</h1>
        <div id="traer-resultado">
            <?php
            // Llamada a la función factura y renderización dinámica
            $resultado = factura();
            echo '<script>document.getElementById("traer-resultado").innerHTML = ' . json_encode($resultado) . ';</script>';
            ?>
        </div>
    </div>
    <script src="../js/facturar.js"></script>
</main>
</body>

</html>
