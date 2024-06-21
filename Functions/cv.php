<?php 
@include 'conexion.php'; // Añadimos el punto y coma al final de la línea

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir y validar los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $dni = intval($_POST['dni']);
    $nacimiento = $conn->real_escape_string($_POST['nacimiento']);
    $profesion = $conn->real_escape_string($_POST['profesion']);
    $tdocente = $conn->real_escape_string($_POST['tdocente']);
    $localidad = $conn->real_escape_string($_POST['localidad']);
    $cp = intval($_POST['cp']);
    $altura = !empty($_POST['altura']) ? intval($_POST['altura']) : -1;
    $calle = !empty($_POST['calle']) ? $conn->real_escape_string($_POST['calle']) : '';

    // Verificar si el DNI ya existe en la base de datos
    $stmt = $conn->prepare("SELECT COUNT(*) FROM curriculum WHERE DNI = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $dni);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        header("Location: ../assets/html/curriculum.php?error=Ya tiene un CV subido");
        $conn->close();
        exit();
    }

    // Manejar el archivo subido
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cv']['tmp_name'];
        $fileName = $_FILES['cv']['name'];
        $fileSize = $_FILES['cv']['size'];
        $fileType = $_FILES['cv']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Verificar extensión del archivo
        $allowedfileExtensions = array('pdf', 'doc', 'docx', 'txt', 'rtf', 'odt', 'jpg', 'jpeg', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directorio de subida
            $uploadFileDir = realpath(dirname(__FILE__) . '/../assets/uploads/');
            if (!file_exists($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $dest_path = $uploadFileDir . '/' . $fileName;

            // Mover archivo al directorio de destino
            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                // Convertir la ruta a una ruta relativa para almacenar en la base de datos
                $relativePath = 'uploads/' . $fileName;

                // Insertar datos en la base de datos en una sola consulta
                $stmt = $conn->prepare("INSERT INTO curriculum (DNI, Nombre, Apellido, Nacimiento, Profesion, Trayecto, Ruta, CP, Localidad, Calle, Altura ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Error en la preparación de la consulta: " . $conn->error);
                }

                $stmt->bind_param("issssssissi", $dni, $nombre, $apellido, $nacimiento, $profesion, $tdocente, $relativePath, $cp, $localidad, $calle, $altura );

                if ($stmt->execute()) {
                    header("Location: ../assets/html/curriculum.php?mensaje=Datos y archivo subidos correctamente");
                    exit();
                } else {
                    header("Location: ../assets/html/curriculum.php?error=Error al guardar los datos en la base de datos");
                    exit();
                }

                $stmt->close();
            } else {
                // Depuración de errores
                echo "Error al mover el archivo. TMP Path: $fileTmpPath - Dest Path: $dest_path";
                header("Location: ../assets/html/curriculum.php?error=Error al mover el archivo subido");
                exit();
            }
        } else {
            header("Location: ../assets/html/curriculum.php?error=Extensión de archivo no permitida");
            exit();
        }
    } else {
        header("Location: ../assets/html/curriculum.php?error=Error al subir el archivo");
        exit();
    }

    $conn->close();
} else {
    header("Location: ../assets/html/curriculum.php?error=Método de solicitud no permitido");
    exit();
}
?>
