<?php
require_once('../library/TCPDF/tcpdf.php');

include 'conexion.php';
// Consulta SQL para obtener los datos de la tabla formularios
$sql = "SELECT `DNI-Alumno`, `NombreAlumno`, `ApellidoAlumno`, `DNI-Tutor`, `NombreTutor`, `ApellidoTutor`, `CP`, `Localidad`, `Calle`, `Altura` FROM formularios";
$result = $conn->query($sql);

// Crear un nuevo objeto TCPDF
$pdf = new TCPDF('P', PDF_UNIT, 'A3', true, 'UTF-8', false);

// Establecer la información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nombre Autor');
$pdf->SetTitle('Exportar tabla de formularios a PDF');
$pdf->SetSubject('Tabla de formularios');
$pdf->SetKeywords('TCPDF, PDF, tabla, formularios');

// Agregar una página
$pdf->AddPage();

// Establecer la fuente y tamaño de la fuente para el contenido de la tabla
$pdf->SetFont('dejavusans', '', 8);

// Crear tabla en el PDF
$pdf->SetFont('dejavusans', 'B', 8); // Fuente en negrita para los títulos de columna
$pdf->Cell(22, 10, 'DNI Alumno', 1, 0, 'C');
$pdf->Cell(35, 10, 'Nombre Alumno', 1, 0, 'C');
$pdf->Cell(35, 10, 'Apellido Alumno', 1, 0, 'C');
$pdf->Cell(22, 10, 'DNI Tutor', 1, 0, 'C');
$pdf->Cell(35, 10, 'Nombre Tutor', 1, 0, 'C');
$pdf->Cell(35, 10, 'Apellido Tutor', 1, 0, 'C');
$pdf->Cell(17, 10, 'CP', 1, 0, 'C');
$pdf->Cell(25, 10, 'Localidad', 1, 0, 'C');
$pdf->Cell(35, 10, 'Calle', 1, 0, 'C');
$pdf->Cell(17, 10, 'Altura', 1, 1, 'C');

// Restaurar la configuración de fuente normal para los datos de la tabla
$pdf->SetFont('dejavusans', '', 8);

// Recorrer los resultados de la consulta y agregar filas a la tabla del PDF
while($row = $result->fetch_assoc()) {
    $pdf->Cell(22, 10, $row['DNI-Alumno'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['NombreAlumno'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['ApellidoAlumno'], 1, 0, 'C');
    $pdf->Cell(22, 10, $row['DNI-Tutor'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['NombreTutor'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['ApellidoTutor'], 1, 0, 'C');
    $pdf->Cell(17, 10, $row['CP'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['Localidad'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['Calle'], 1, 0, 'C');
    $pdf->Cell(17, 10, $row['Altura'], 1, 1, 'C');
}

// Cerrar conexión
$conn->close();

// Finalizar y generar el PDF
$pdf->Output('tabla_formularios.pdf', 'I'); // Abrir en el navegador
?>
