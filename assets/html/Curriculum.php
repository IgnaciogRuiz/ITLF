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
  <link rel="icon" type="image/png" href="../images/ITLF-Blanco.ico" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/owl.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<?php
  $nombre = '';
  $apellido = '';
  $dni = '';
  $telefono = ''; 
  $Email = '';
  $nacimiento = '';
  $profesion = '';
  $tdocente = '';
  $local = 'seleccione';
  $cp = '';
  $altura = '';
  $calle = '';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir y validar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = intval($_POST['dni']);
    $telefono = $_POST['telefono']; 
    $Email = strval($_POST['mail']);
    $nacimiento = $_POST['nacimiento'];
    $profesion = $_POST['profesion'];
    $tdocente = $_POST['tdocente'];
    $local = $_POST['local'] ?? '';
    $cp = $_POST['cp'];
    $altura = $_POST['altura'];
    $calle = $_POST['calle'];
    // Ruta temporal del archivo subido
    $tmpFilePath = $_FILES['cv']['tmp_name'];
    // Nombre del archivo subido
    $fileName = $_FILES['cv']['name'];

    // VALIDACIONES
    $alertas = [];

    // Validar nombre
    if (empty($nombre)) {
        $alertas[] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $alertas[] = "El nombre solo puede contener letras y espacios.";
    }

    // Validar apellido
    if (empty($apellido)) {
        $alertas[] = "El apellido es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $apellido)) {
        $alertas[] = "El apellido solo puede contener letras y espacios.";
    }

    // Validar DNI (solo números y longitud específica)
    if (empty($dni)) {
        $alertas[] = "El DNI es obligatorio.";
    } elseif (!filter_var($dni, FILTER_VALIDATE_INT) || strlen((string)$dni) < 7 || strlen((string)$dni) > 8) {
        $alertas[] = "El DNI debe ser un número de 7 u 8 dígitos.";
    }

    // Validar teléfono (solo números)
    if (empty($telefono)) {
        $alertas[] = "El teléfono es obligatorio.";
    } elseif (!preg_match("/^[0-9]{10}$/", $telefono)) {
        $alertas[] = "El teléfono debe contener 10 dígitos numéricos.";
    }

    // Validar Email
    if (empty($Email)) {
        $alertas[] = "El email es obligatorio.";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $alertas[] = "El formato del email no es válido.";
    }

    // Validar fecha de nacimiento
    if (empty($nacimiento)) {
        $alertas[] = "La fecha de nacimiento es obligatoria.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $nacimiento)) {
        $alertas[] = "La fecha de nacimiento debe tener el formato AAAA-MM-DD.";
    }

    // Validar profesión
    if (empty($profesion)) {
        $alertas[] = "La profesión es obligatoria.";
    }

    // Validar localidad
    if (empty($local)) {
        $alertas[] = "La localidad es obligatoria.";
    }

    // Validar código postal (CP)
    if (empty($cp)) {
        $alertas[] = "El código postal es obligatorio.";
    } elseif (!preg_match("/^\d{4,5}$/", $cp)) {
        $alertas[] = "El código postal debe contener entre 4 y 5 dígitos.";
    }

    // Validar calle
    if (empty($calle)) {
        $alertas[] = "La calle es obligatoria.";
    }

    // Mostrar alertas si hay alguna
    if (empty($alertas)) {
      include '../../Functions/EnviarCurriculum.php';
    } 
  }
?>

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
    <form  method="post" enctype="multipart/form-data" class="form" > 
      <h1>Formulario a completar</h1>
      <?php
        if (isset($_GET['error'])) {
          $error = htmlspecialchars($_GET['error']);
          echo '<div id="miMensaje"><p class="error">' . $error . '</p></div>';
        } elseif (isset($_GET['mensaje'])) {
          $mensaje = htmlspecialchars($_GET['mensaje']);
          echo '<div id="miMensaje"><p class="mensaje">' . $mensaje . '</p></div>';}

        if (!empty($alertas)) {
            foreach ($alertas as $alerta) {
                echo '<div id="miMensaje"><p class="error">' . $alerta . '</p></div>';
            }
        }
      ?>
        <!-- Campo Nombre -->
        <label for="nombre">Nombre<span class="obligatorio">*</span></label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        <!-- Campo Apellido -->
        <label for="apellido">Apellido<span class="obligatorio">*</span></label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
        <!-- Campo DNI -->  
        <label for="dni">DNI<span class="obligatorio">*</span></label>
        <input class="number-input" type="number" id="dni" name="dni" value="<?php echo $dni; ?>" required>
        <!-- Campo telefono -->
        <label for="telefono">Telefono<span class="obligatorio">*</span></label>
        <input type="number-input" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required>
        <!-- Campo telefono -->
        <label for="mail">Mail<span class="obligatorio">*</span></label>
        <input type="text" id="mail" name="mail" value="<?php echo $Email; ?>" required>
        <!-- Campo nacimiento -->
        <label for="nacimiento">Fecha de nacimiento<span class="obligatorio">*</span></label>
        <input type="date" id="nacimiento" name="nacimiento" value="<?php echo $nacimiento; ?>" required>
        <!-- Campo Profesion -->
        <label for="profesion">Puesto al que quiere aplicar<span class="obligatorio">*</span></label>
        <input type="text" id="profesion" name="profesion" value="<?php echo $profesion; ?>" required>
        <!-- Campo Trayecto -->
        <label for="tdocente">Describe tu trayecto docente</label>
        <textarea name="tdocente" id="tdocente"></textarea>
        <!-- Campo CV -->
        <label for="cv">Curriculum<span class="obligatorio">*</span></label>
        <input type="file" id="cv" name="cv" accept=".pdf, .doc, .docx, .txt, .rtf, .odt, .jpg, .jpeg, .png"  required>
        <!-- Campos Domicillio -->
        <div class="domicilio-grid">
            <!-- Campo Localidad -->
            <div class="localidad">
                <label for="localidad">Localidad<span class="obligatorio">*</span></label>
                <select name="local" id="localidad">
                    <option value="seleccione" disabled <?php echo ($local == "seleccione" ? "selected" : ""); ?>>Seleccione una localidad</option>
                    <option value="Capilla del Monte" <?php echo ($local == "Capilla del Monte" ? "selected" : ""); ?>>Capilla del Monte</option>
                    <option value="San Esteban" <?php echo ($local == "San Esteban" ? "selected" : ""); ?>>San Esteban</option>
                    <option value="Los Cocos" <?php echo ($local == "Los Cocos" ? "selected" : ""); ?>>Los Cocos</option>
                    <option value="La Cumbre" <?php echo ($local == "La Cumbre" ? "selected" : ""); ?>>La Cumbre</option>
                    <option value="Villa Giardino" <?php echo ($local == "Villa Giardino" ? "selected" : ""); ?>>Villa Giardino</option>
                    <option value="Huerta Grande" <?php echo ($local == "Huerta Grande" ? "selected" : ""); ?>>Huerta Grande</option>
                    <option value="La Falda" <?php echo ($local == "La Falda" ? "selected" : ""); ?>>La Falda</option>
                    <option value="Valle Hermoso" <?php echo ($local == "Valle Hermoso" ? "selected" : ""); ?>>Valle Hermoso</option>
                    <option value="Casa Grande" <?php echo ($local == "Casa Grande" ? "selected" : ""); ?>>Casa Grande</option>
                    <option value="Molinari" <?php echo ($local == "Molinari" ? "selected" : ""); ?>>Molinari</option>
                    <option value="Cosquín" <?php echo ($local == "Cosquín" ? "selected" : ""); ?>>Cosquín</option>
                    <option value="Santa María" <?php echo ($local == "Santa María" ? "selected" : ""); ?>>Santa María</option>
                    <option value="Bialet Massé" <?php echo ($local == "Bialet Massé" ? "selected" : ""); ?>>Bialet Massé</option>
                </select>
            </div>

            <div class="codigoPostal">
              <!-- Campo CP -->
              <label for="cp">Codigo Postal<span class="obligatorio">*</span></label>
              <input type="number" id="cp" name="cp" value="<?php echo $cp; ?>"  required>
            </div>
            <div class="calle">
              <!-- Campo Calle -->
              <label for="calle">Calle<span class="obligatorio">*</span></label>
              <input type="text" id="calle" name="calle" value="<?php echo $calle; ?>" required>
            </div>
            <div class="altura">
              <label for="altura">Altura</label>
              <input type="number" id="altura" name="altura" value="<?php echo $altura; ?>" required>
            </div>
        </div>
      <div class="form-actions">
        <button type="reset" class="reset">Limpiar Campos</button>
        <button type="submit" disabled>Enviar</button><!-- Boton deshabilitado -->
      </div>
</div>
<!-- Form End -->


  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p class="parrafo-con-salto">Copyright © 2024 All rights reserved. &nbsp;&nbsp;&nbsp; <br> Design: Alumnos Promo 25 de Programación</p>
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