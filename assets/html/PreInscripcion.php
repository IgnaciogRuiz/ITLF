<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Instituto Técnico La Falda</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="assets/images/Icono_logo.png" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/owl.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body id="body-form">



  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="../../index.html" class="logos">
              <h1><img src="../images/ITLF-DetalladoBlanco.png" alt=""></h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="../../index.html#top">Inicio</a></li>
              <li class="scroll-to-section"><a href="../../index.html#Especialidades">Especialidades</a></li>
              <li class="scroll-to-section"><a href="../../index.html#Nosotros">Nosotros</a></li>
              <li class="scroll-to-section"><a href="./documentos.html">Documentos</a></li>
              <li class="scroll-to-section"><a href="../../index.html#Inscripcion" class="active">Inscripciones</a></li>
              <li class="scroll-to-section"><a href="../../index.html#contact">Contacto</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>

            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


  <!-- Banner -->
  <div class="container-especialidad" id="Pre">
    <div class="banner-especialidad">
      <h2>Inscripciones</h2>
    </div>
  </div>
  <!-- Banner End -->

  <!-- Form -->
  <div class="form-cont">
    <form action="../../Functions/formularioInscripcion" method="post" class="form" >
      <?php
        if (isset($_GET['error'])) {
          $error = htmlspecialchars($_GET['error']);
          echo '<div id="miMensaje"><p class="error">' . $error . '</p></div>';
        } elseif (isset($_GET['mensaje'])) {
          $mensaje = htmlspecialchars($_GET['mensaje']);
          echo '<div id="miMensaje"><p class="mensaje">' . $mensaje . '</p></div>';
        }
      ?>
      <h1>Formulario a completar</h1>
        <p><strong>Importante: </strong>Si su hijo/a posee un hermano/a en el instituto la preinscripcion sera de manera presencial. </p>
        <!-- Campo Nombre Alumno -->
        <label for="nombreAlumno">Nombre del Alumno</label>
        <input type="text" id="nombreAlumno" name="nombreAlumno" required>
        <!-- Campo Apellido Alumno -->
        <label for="apellidoAlumno">Apellido del Alumno</label>
        <input type="text" id="apellidoAlumno" name="apellidoAlumno" required>
        <!-- Campo DNI Alumno -->
        <label for="dniAlumno">DNI del Alumno</label>
        <input class="number-input" type="number" id="dniAlumno" name="dniAlumno" required>
        <!-- Campo Nombre Tutor -->
        <label for="tutor">Nombre Padre/Madre o Tutor</label>
        <input type="text" id="Ntutor" name="Ntutor" required>
        <!-- Campo Apellido Tutor -->
        <label for="tutor">Apellido Padre/Madre o Tutor</label>
        <input type="text" id="Atutor" name="Atutor" required>
        <!-- Campo DNI Tutor -->
        <label for="dniTutor">DNI del Padre/Madre o Tutor</label>
        <input class="number-input" type="number" id="dniTutor" name="dniTutor" required>
        <!-- Campo Colegio del que proviene -->
        <label for="colegio">Colegio del que proviene</label>
        <input type="text" id="colegio" name="colegio" required>
        <!-- Campos Domicillio -->
        <div class="domicilio-grid">
          <!-- Campo Localidad -->
          <label for="localidad">Localidad:</label>
          <input type="text" id="localidad" name="localidad" required>
          <!-- Campo CP -->
          <label for="cp">Codigo Postal:</label>
          <input type="number" id="cp" name="cp" required>
          <!-- Campo Calle -->
          <label for="calle">Calle:</label>
          <input type="text" id="calle" name="calle" required>
          <!-- Campo Altura -->
          <label for="altura">Altura:</label>
          <input type="number" id="altura" name="altura" required>         
        </div>
            <div class="form-actions">
                <button type="reset" class="reset">Limpiar Campos</button>
                <button type="submit">Enviar</button>
            </div>
</div>
<!-- Form End-->

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p class="parrafo-con-salto">Copyright © 2024 All rights reserved. &nbsp;&nbsp;&nbsp; <br> Design: Alumnos 6to
          Programación</p>
      </div>
    </div>
  </footer>
  <!-- fin de footer -->

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/isotope.min.js"></script>
  <script src="../js/owl-carousel.js"></script>
  <script src="../js/counter.js"></script>
  <script src="../js/custom.js"></script>
  <script src="../js/altura.js"></script>
  <script src="../js/timeout.js"></script>
</body>

</html>