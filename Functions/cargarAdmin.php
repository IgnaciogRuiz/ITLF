<?php
@include 'conexion.php';
//seccion para cargar un nuevo admin

// Aca ingresas los datos para cargar en la base de datos
//importante borrar los datos de la variable luego de cargar
$username = "latecAdmin";
$password = "itlf24";

// Hashear la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar datos en la tabla admin
$sql = "INSERT INTO admin (Username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario y contraseña hasheada insertados correctamente.";
} else {
    echo "Error al insertar usuario y contraseña hasheada: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();

?>