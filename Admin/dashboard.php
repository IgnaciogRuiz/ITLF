<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body onload="setFechaActual()">
    <div class="dash-body">
        <div class="container">
            <!-- Aside -->
            <aside>
                <!-- Logo -->
                <div class="top">
                    <div class="logo">
                        <img src="../assets/images/ITLF-Negro.png" alt="">
                    </div>
                    <div class="close" id="close_btn">
                        <span class="material-symbols-sharp">
                            close
                        </span>
                    </div>
                </div>
                <!-- logo End -->
                <div class="sidebar">
                    <a href="#" class="active">
                        <span class="material-symbols-sharp">grid_view</span>
                        <h3>Dashbord</h3>
                    </a>
                    <a href="./showInscripciones.php">
                        <span class="material-symbols-sharp">person_outline</span>
                        <h3>Inscripciones</h3>
                    </a>
                    <a href="./showCv.php">
                        <span class="material-symbols-sharp">description</span>
                        <h3>Curriculums</h3>
                    </a>
                    <a href="../Functions/logout.php">
                        <span class="material-symbols-sharp">logout</span>
                        <h3>logout</h3>
                    </a>
                </div>
            </aside>
            <!-- Aside End -->


            <!-- Main -->
            <main>
                <h1>Dashbord</h1>
                <div class="date">
                    <input type="date" id="fechaInput" readonly>
                </div>
                <div class="insights">
                    <!-- start seling -->
                    <div class="sales">
                        <span class="material-symbols-sharp">trending_up</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Ultimas Vistas</h3>
                                <h1>505 views</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle r="30" cy="40" cx="40"></circle>
                                </svg>
                                <div class="number">
                                    <p>80%</p>
                                </div>
                            </div>
                        </div>
                        <small>Last 24 Hours</small>
                    </div>
                    <!-- end seling -->
                </div>
                <!-- end insights -->
                <div class="recent_order">
                    <h2>Movimientos Recientes</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Number</th>
                                <th>Payments</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mini USB</td>
                                <td>4563</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                            <tr>
                                <td>Mini USB</td>
                                <td>4563</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                            <tr>
                                <td>Mini USB</td>
                                <td>4563</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                            <tr>
                                <td>Mini USB</td>
                                <td>4563</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
            <!-- Main End -->
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>