<?php
session_start();
@include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $_SESSION["username"] = $username;
      header("Location: ../Admin/dashboard.php");
    } else {
      echo "Invalid username or password.";
    }
  }

mysqli_close($conn);

?>