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
                    <a href="./index.html">
                        <span class="material-symbols-sharp">grid_view</span>
                        <h3>Dashbord</h3>
                    </a>
                    <a href="#" class="active">
                        <span class="material-symbols-sharp">person_outline</span>
                        <h3>Inscripciones</h3>
                    </a>
                    <a href="./showCv.php">
                        <span class="material-symbols-sharp">description</span>
                        <h3>Curriculums</h3>
                    </a>
                    <a href="./Login.html">
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
                    <a href="../Functions/imprimir_inscripciones.php" target="_blank">Imprimir Tabla</a>
                </div>
                <!-- end insights -->
                <div class="recent_order">
                    <h2>Inscripciones</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>DNI Alumno</th>
                                <th>Nombre Alumno</th>
                                <th>Apellido Alumno</th>
                                <th>DNI Tutor</th>
                                <th>Nombre Tutor</th>
                                <th>Apellido Tutor</th>
                                <th>CP</th>
                                <th>Localidad</th>
                                <th>Calle</th>
                                <th>Altura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../Functions/MostrarInscripciones.php'; ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <!-- Main End -->
        </div>
    </div>
    <script src="./js/script.js"></script>
    <script src="./js/logout.js"></script>
</body>

</html>