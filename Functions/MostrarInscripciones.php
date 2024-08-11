<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta para obtener los datos de la tabla formularios
$sql = "SELECT `DNI-Alumno`, `NombreAlumno`, `ApellidoAlumno`, `DNI-Tutor`, `NombreTutor`, `ApellidoTutor`, `CP`, `Localidad`, `Calle`, `Altura` FROM formularios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["DNI-Alumno"] . "</td>
                <td>" . $row["NombreAlumno"] . "</td>
                <td>" . $row["ApellidoAlumno"] . "</td>
                <td>" . $row["DNI-Tutor"] . "</td>
                <td>" . $row["NombreTutor"] . "</td>
                <td>" . $row["ApellidoTutor"] . "</td>
                <td>" . $row["CP"] . "</td>
                <td>" . $row["Localidad"] . "</td>
                <td>" . $row["Calle"] . "</td>
                <td>" . $row["Altura"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No se encontraron resultados</td></tr>";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
