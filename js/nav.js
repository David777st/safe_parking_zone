document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector("nav"); // Seleccionar el <nav> existente

    if (nav) {
        const rol = getCookie("rol"); // Obtener el valor de 'rol' del localStorag
        if (rol === "client") {
            nav.innerHTML = `
                <a href="./inicio.php">Inicio</a>
                <a href="./reservar.php">Reservar</a>
                <a href="./cliente.php">Clientes</a>
                <a href="./factura.php">Facturas</a>
                <form action="../controller/salir.php" method="post" style="display: inline;">
                  <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            `;
        } else if (rol === "admin") {
            nav.innerHTML = `
                <a href="./inicio.php">Inicio</a>
                <a href="./reservarAdmin.php">Reservar</a>
                <a href="./administrador.php">Admin</a>
                <a href="./registro-admin.php">Registro Admin</a>
                <a href="./factura.php">Facturas</a>
                <a href="./historial.php">Historial</a>
                <form action="../controller/salir.php" method="post" style="display: inline;">
                  <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            `;
        } else {
            // Si no hay rol definido o es diferente de "client" o "admin"
            nav.innerHTML = `
                <a href="./ingreso.php">Ingreso</a>
                <a href="./registro.php">Registrar</a>
                <a href="./contacto.php">Contáctenos</a>
            `;
        }
    } else {
        console.error("El elemento <nav> no se encontró en el documento.");
    }
});


function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(";").shift();
    return null;
}