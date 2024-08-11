<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Directorio donde se guardarán los archivos de trayectos
$directorio_trayectos = '../assets/uploads/trayectos/';

// Consulta para obtener los datos de la tabla curriculum
$sql = "SELECT `DNI`, `Nombre`, `Apellido`, `Nacimiento`, `Profesion`, `Trayecto`, `Ruta`, `CP`, `Localidad`, `Calle`, `Altura` FROM curriculum";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $result->fetch_assoc()) {
        // Calcular la edad
        $fecha_nacimiento = new DateTime($row["Nacimiento"]);
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento)->y;

        // Nombre del archivo de trayecto (T + DNI + .txt)
        $nombre_archivo = 'T' . $row['DNI'] . '.txt';
        // Ruta completa del archivo de trayecto
        $ruta_archivo = $directorio_trayectos . $nombre_archivo;

        // Contenido del archivo de trayecto (en este caso, el valor de 'Trayecto')
        $contenido_trayecto = $row['Trayecto'];

        // Guardar contenido en el archivo de trayecto
        file_put_contents($ruta_archivo, $contenido_trayecto);

        // Mostrar fila en tabla HTML con enlace al archivo de trayecto
        echo "<tr>
                <td>" . $row["DNI"] . "</td>
                <td>" . $row["Nombre"] . "</td>
                <td>" . $row["Apellido"] . "</td>
                <td>" . $row["Nacimiento"] . "</td>
                <td>" . $edad . "</td>
                <td>" . $row["Profesion"] . "</td>
                <td><a href='" . $ruta_archivo . "' target='_blank'>LinkTrayecto</a></td>
                <td><a href='../assets/" . $row["Ruta"] . "' target='_blank'>" . "LinkCV" . "</a></td>
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
