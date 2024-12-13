<?php
session_start();

// Eliminar las cookies configuradas
if (isset($_COOKIE['id'])) {
    setcookie('id', '', time() - 3600, '/'); // Expira la cookie
}
if (isset($_COOKIE['rol'])) {
    setcookie('rol', '', time() - 3600, '/'); // Expira la cookie
}

if (isset($_COOKIE['nombre'])) {
    setcookie('nombre', '', time() - 3600, '/'); // Expira la cookie
}

if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 3600, '/'); // Expira la cookie PHPSESSID
}

// Destruir la sesión
session_unset();
session_destroy();

header("Location: ../view/ingreso.php");
exit;
?>