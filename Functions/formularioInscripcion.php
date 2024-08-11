<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Variables para mensajes de error y valores de campos
$nombreAlumno = $apellidoAlumno = $dniAlumno = $nombretutor = $apellidotutor = $dniTutor = $colegio = $localidad = $cp = $calle = $altura = "";
$error = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturar los datos del formulario
    $nombreAlumno = $_POST['nombreAlumno'];
    $apellidoAlumno = $_POST['apellidoAlumno'];
    $dniAlumno = $_POST['dniAlumno'];
    $nombretutor = $_POST['Ntutor'];
    $apellidotutor = $_POST['Atutor'];
    $dniTutor = $_POST['dniTutor'];
    $colegio = $_POST['colegio'];
    $localidad = $_POST['localidad'];
    $cp = $_POST['cp'];
    $calle = $_POST['calle'];
    $altura = $_POST['altura'];

    // Verificar y depurar el contenido de las variables
    // echo "Datos recibidos: <br>";
    // echo "Nombre Alumno: $nombreAlumno <br>";
    // echo "Apellido Alumno: $apellidoAlumno <br>";
    // echo "DNI Alumno: $dniAlumno <br>";
    // echo "Nombre Tutor: $nombretutor <br>";
    // echo "Apellido Tutor: $apellidotutor <br>";
    // echo "DNI Tutor: $dniTutor <br>";
    // echo "Colegio: $colegio <br>";
    // echo "Localidad: $localidad <br>";
    // echo "CP: $cp <br>";
    // echo "Calle: $calle <br>";
    // echo "Altura: $altura <br>";

    // Sentencia SQL para verificar si el DNI-Alumno ya existe
    $sql_verificar = "SELECT `DNI-Alumno` FROM formularios WHERE `DNI-Alumno` = ?";
    $stmt = $conn->prepare($sql_verificar);
    $stmt->bind_param("i", $dniAlumno);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si ya existe un registro con ese DNI-Alumno
    if ($stmt->num_rows > 0) {
        $error = "Ya existe un formulario con el mismo DNI-Alumno.";
        header("Location: ../assets/html/PreInscripcion.php?error=" . urlencode($error));
        exit();
    } else {
        // Verificar si el DNI-Alumno es igual al DNI del Tutor
        if ($dniAlumno == $dniTutor) {
            $error = "El DNI del alumno no puede ser igual al DNI del tutor.";
            header("Location: ../assets/html/PreInscripcion.php?error=" . urlencode($error));
            exit();
        } else {
            // Preparar la sentencia SQL para insertar datos
            $sql_insertar = "INSERT INTO formularios (`DNI-Alumno`, `NombreAlumno`, `ApellidoAlumno`, `DNI-Tutor`, `NombreTutor`, `ApellidoTutor`, `CP`, `Localidad`, `Calle`, `Altura`)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la declaración
            $stmt_insertar = $conn->prepare($sql_insertar);

            if ($stmt_insertar === false) {
                $error = "Error al preparar la declaración SQL: " . $conn->error;
            } else {
                // Vincular parámetros y ejecutar la declaración para insertar datos
                $stmt_insertar->bind_param("isssssissi", $dniAlumno, $nombreAlumno, $apellidoAlumno, $dniTutor, $nombretutor, $apellidotutor, $cp, $localidad, $calle, $altura);

                if ($stmt_insertar->execute()) {
                    // Éxito
                    $mensaje = "Formulario enviado correctamente.";
                    header("Location: ../assets/html/PreInscripcion.php?mensaje=" . urlencode($mensaje));
                    exit();
                    // Limpiar los valores de los campos después de la inserción
                    $nombreAlumno = $apellidoAlumno = $dniAlumno = $nombretutor = $apellidotutor = $dniTutor = $colegio = $localidad = $cp = $calle = $altura = "";
                } else {
                    $error = "Error al insertar datos: " . $stmt_insertar->error;
                }
            }
        }
    }

    // Cerrar conexiones y declaraciones
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($stmt_insertar)) {
        $stmt_insertar->close();
    }
}

// Cerrar la conexión al finalizar
$conn->close();
?>
