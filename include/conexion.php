<?php
$host = 'localhost'; // Por defecto
$dbname = 'sesion'; // Nombre de base de datos
$usuario = 'root'; // Por defecto
$password = ''; // en Windows no tiene password

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $conexion = new PDO($dsn, $usuario, $password);    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Modo errores
} catch (PDOException $e) {
    // En producción: Guardar error en log y mostrar mensaje genérico
    error_log("Error de conexión PDO: " . $e->getMessage());
    die("Lo sentimos, hay un problema técnico temporal con la base de datos.");
}
?>