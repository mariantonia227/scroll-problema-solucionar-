<?php
session_start();

// VALIDAR LOGIN
if (!isset($_SESSION['nombre'])) {
    header("Location: /LEAFY_PROYECTO_2/login.php");
    exit();
}

require_once("php/conexion.php");

if (!isset($_GET['id'])) {
    header("Location: principal.php");
    exit();
}

$id = $_GET['id'];

// Obtener precio desde la BD
$result = $enlace->query("SELECT precio FROM productos WHERE id_producto='$id'");
$producto = $result->fetch_assoc();

$precio = $producto['precio'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// ✅ GUARDAR BIEN (ARRAY)
$_SESSION['carrito'][] = [
    "id_producto" => $id,
    "precio" => $precio
];

// Redirección
if (isset($_GET['volver'])) {
    header("Location: " . $_GET['volver']);
} else {
    header("Location: principal.php");
}

exit();
?>