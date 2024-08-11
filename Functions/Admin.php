<?php
@include 'conexion.php';

// Verificar si el formulario de login ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];


  // Consultar la base de datos para verificar si el usuario existe
  $sql = "SELECT password FROM admin WHERE Username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];

    // Verificar si la contraseña ingresada coincide con la contraseña hasheada en la base de datos
    if (password_verify($password, $hashed_password)) {
      // Autenticación exitosa, iniciar sesión del administrador
      session_start();
      $_SESSION["admin_logged_in"] = true;
      $_SESSION["admin_username"] = $username;
      header("Location: ../Admin/dash.html"); // Redirigir al dashboard del administrador
      exit;
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    echo "Usuario no encontrado";
  }
}


// Cerrar la conexión
$stmt->close();
$conn->close();
?>
