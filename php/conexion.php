<?php
// Datos de la base de datos proporcionados por AwardSpace
$host = "fdb1028.awardspace.net"; // Nombre del host
$dbname = "4557196_fotografia";  // Nombre de la base de datos
$username = "4557196_fotografia"; // Usuario de la base de datos
$password = "Klever2002";         // Contraseña de la base de datos

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
?>
