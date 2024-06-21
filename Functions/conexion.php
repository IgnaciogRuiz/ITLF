<?php

// Datos de conexión a la base de datos
$servername = "localhost"; // Servidor
$username = "root";    // Nombre de usuario de la base de datos
$password = ""; // Contraseña del usuario
$dbname = "itlf"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    // echo "Conexion exitosa";
}

?>