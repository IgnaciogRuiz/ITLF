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
  <link rel="icon" type="image/png" href="../images/Icono_logo.png" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/owl.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>

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
              <li class="scroll-to-section"><a href="./Conocemas.html">Nosotros</a></li>
              <li class="scroll-to-section"><a href="./documentos.html">Documentos</a></li>
              <li class="scroll-to-section"><a href="../../index.html#Inscripcion" class="active">RRHH</a></li>
              <li class="scroll-to-section"><a href="../../index.html#contact">Contacto</a></li>
              <li class="scroll-to-section"><a href="https://www.latecnicalf.com.ar/kids/">La Técnica Kids</a></li>
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
  <div class="container-especialidad" id="CV">
    <div class="banner-especialidad">
      <h2>Trabaja con Nosotros</h2>
    </div>
  </div>

  <!-- Form -->
  <div class="form-cont">
    <form action="../../Functions/EnviarCurriculum.php" method="post" enctype="multipart/form-data" class="form" >
      <?php
        if (isset($_GET['error'])) {
          $error = htmlspecialchars($_GET['error']);
          echo '<div id="miMensaje"><p class="error">' . $error . '</p></div>';
        } elseif (isset($_GET['mensaje'])) {
          $mensaje = htmlspecialchars($_GET['mensaje']);
          echo '<div id="miMensaje"><p class="mensaje">' . $mensaje . '</p></div>';}
      ?>
        <h1>Formulario a completar</h1>
        <!-- Campo Nombre -->
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>
        <!-- Campo Apellido -->
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required>
        <!-- Campo DNI -->  
        <label for="dni">DNI</label>
        <input class="number-input" type="number" id="dni" name="dni" required>
        <!-- Campo telefono -->
        <label for="telefono">Telefono</label>
        <input type="number-input" id="telefono" name="telefono" required>
        <!-- Campo telefono -->
        <label for="mail">Mail</label>
        <input type="text" id="mail" name="mail" required>
        <!-- Campo nacimiento -->
        <label for="nacimiento">Fecha de nacimiento</label>
        <input type="date" id="nacimiento" name="nacimiento" required>
        <!-- Campo Profesion -->
        <label for="profesion">Puesto al que quiere aplicar</label>
        <input type="text" id="profesion" name="profesion" required>
        <!-- Campo Trayecto -->
        <label for="tdocente">Describe tu trayecto docente</label>
        <textarea name="tdocente" id="tdocente"></textarea>
        <!-- Campo CV -->
        <label for="cv">Curriculum</label>
        <input type="file" id="cv" name="cv" accept=".pdf, .doc, .docx, .txt, .rtf, .odt, .jpg, .jpeg, .png" required>
        <!-- Campos Domicillio -->
        <div class="domicilio-grid">
            <!-- Campo Localidad -->
            <div class="localidad">
                <label for="localidad">Localidad:</label>
                <select name="local" id="localidad">
                    <option value="seleccione" selected disabled>Seleccione una localidad</option>
                    <option value="Capilla del Monte">Capilla del Monte</option>
                    <option value="San Esteban">San Esteban</option>
                    <option value="Los Cocos">Los Cocos</option>
                    <option value="La Cumbre">La Cumbre</option>
                    <option value="Villa Giardino">Villa Giardino</option>
                    <option value="Huerta Grande">Huerta Grande</option>
                    <option value="La Falda">La Falda</option>
                    <option value="Valle Hermoso">Valle Hermoso</option>
                    <option value="Casa Grande">Casa Grande</option>
                    <option value="Molinari">Molinari</option>
                    <option value="Cosquín">Cosquín</option>
                    <option value="Santa María">Santa María</option>
                    <option value="Bialet Massé">Bialet Massé</option>
                </select>
            </div>

            <div class="codigoPostal">
              <!-- Campo CP -->
              <label for="cp">Codigo Postal:</label>
              <input type="number" id="cp" name="cp" required>
            </div>
            <div class="calle">
              <!-- Campo Calle -->
              <label for="calle">Calle:</label>
              <input type="text" id="calle" name="calle" required>
            </div>
            <div class="altura">
              <label for="altura">Altura:</label>
              <input type="number" id="altura" name="altura" required>
            </div>
        </div>
      <div class="form-actions">
        <button type="reset" class="reset">Limpiar Campos</button>
        <button type="submit">Enviar</button>
      </div>
</div>
<!-- Form End -->


  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p class="parrafo-con-salto">Copyright © 2024 All rights reserved. &nbsp;&nbsp;&nbsp; <br> Design: Alumnos Promo 25
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
  <script src="../js/inters.js"></script>
  <script src="../js/altura.js"></script>

</body>

</html>