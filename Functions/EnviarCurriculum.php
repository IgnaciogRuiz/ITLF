<?php 
require '../library/PHPMailer/Exception.php';
require '../library/PHPMailer/PHPMailer.php';
require '../library/PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



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
    

//echo $nombre . '<br>' . $apellido . '<br>' . $dni . '<br>' . $telefono . '<br>' . $mail . '<br>' . $nacimiento . '<br>' . $profesion . '<br>' . $tdocente . '<br>' . $local . '<br>' . $cp . '<br>' . $altura . '<br>' . $calle;
// contraseña del mail: testmail123   
//contraseña de aplicacion: mrre yxto lqlr jmaq
// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    //Configuración del servidor SMTP
    $mail->isSMTP(); // Usar SMTP
    $mail->Host       = 'smtp.gmail.com';// Servidor SMTP
    $mail->SMTPAuth   = true; // Habilitar autenticación SMTP
    $mail->Username   = 'gruizignacio3@gmail.com'; // Usuario SMTP
    $mail->Password   = 'mrre yxto lqlr jmaq'; // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cifrado TLS
    $mail->Port       = 465;// Puerto SMTP

    // Configuración del remitente y destinatarios
    $mail->setFrom('gruizignacio3@gmail.com', 'Ruiz Ignacio');  // Remitente
    $mail->addAddress('est.ruiz.ignacio@latecnicalf.com.ar');   // Añadir destinatario

    // Configuración del correo
    $mail->isHTML(true); // Definir el correo como HTML
    $mail->Subject = 'Curriculum ' . $apellido . ' ' . $nombre;// Asunto del correo
    $mail->Body  = "
    <html>
        <body style='font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f9; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);'>
                <h1 style='color: #4CAF50; font-size: 24px; text-align: center;'>Datos del Formulario ITLF</h1>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Apellido:</strong> $apellido</p>
                <p><strong>DNI:</strong> $dni</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Correo Electrónico:</strong> <a href='mailto:$Email' style='color: #4CAF50; text-decoration: none;'>$Email</a></p>
                <p><strong>Fecha de Nacimiento:</strong> $nacimiento</p>
                <p><strong>Puesto al que quiere aplicar:</strong> $profesion</p>
                <p><strong>Trayecto Docente:</strong> $tdocente</p>
                <p><strong>Localidad:</strong> $local</p>
                <p><strong>Código Postal:</strong> $cp</p>
                <p><strong>Calle:</strong> $calle</p>
                <p><strong>Altura:</strong> $altura</p>
            </div>
        </body>
    </html>"; 


    $mail->AltBody = "Datos del Formulario\n\n".
    "Nombre: $nombre\n".
    "Apellido: $apellido\n".
    "DNI: $dni\n".
    "Teléfono: $telefono\n".
    "Correo Electrónico: $Email\n".
    "Fecha de Nacimiento: $nacimiento\n".
    "Puesto al que quiere aplicar: $profesion\n".
    "Trayecto Docente: $tdocente\n".
    "Localidad: $local\n".
    "Código Postal: $cp\n".
    "Calle: $calle\n".
    "Altura: $altura\n"; 

    //Attachments
    $mail->addAttachment($tmpFilePath, $fileName);   

    // Enviar el correo
    $mail->send();
    //echo 'El correo ha sido enviado correctamente';
    header("Location: ../assets/html/curriculum.php?mensaje=Curriculum subido correctamente");
} catch (Exception $e) {
    //echo "El mensaje no se pudo enviar. Error: {$mail->ErrorInfo}";
    header("Location: ../assets/html/curriculum.php?error=Error al subir el archivo");
}


} else {
    header("Location: ../assets/html/curriculum.php?error=Método de solicitud no permitido");
    exit();
}
?>
