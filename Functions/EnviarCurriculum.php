<?php 
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable('C:/wamp64/www/ITLF');
// $dotenv->load();

//echo $nombre . '<br>' . $apellido . '<br>' . $dni . '<br>' . $telefono . '<br>' . $Email . '<br>' . $nacimiento . '<br>' . $profesion . '<br>' . $tdocente . '<br>' . $local . '<br>' . $cp . '<br>' . $altura . '<br>' . $calle;
// contraseña del mail: testmail123   
//contraseña de aplicacion: mrre yxto lqlr jmaq
// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // $mail->SMTPDebug = 2;  // Cambia el nivel a 3 para más detalles
    // $mail->Debugoutput = 'html';
    //Configuración del servidor SMTP
    $mail->isSMTP(); // Usar SMTP
    $mail->Host       = 'smtp.gmail.com';// Servidor SMTP
    $mail->SMTPAuth   = true; // Habilitar autenticación SMTP
    $mail->Username   = 'gruizignacio3@gmail.com';
    $mail->Password   = 'rwtn ocmz pavc deyn';
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cifrado TLS
    $mail->Port       = 465;// Puerto SMTP

    // Configuración del remitente y destinatarios
    $mail->setFrom('gruizignacio3@gmail.com', 'Ruiz Ignacio');  // Remitente
    $mail->addAddress('est.ruiz.ignacio@latecnicalf.com.ar');   // Añadir destinatario
    // mail de RRHH: rh@latecnicalf.com.ar

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
    header("Location: ../html/curriculum.php?mensaje=Curriculum subido correctamente");
} catch (Exception $e) {
    //echo "El mensaje no se pudo enviar. Error: {$mail->ErrorInfo}";
    // header("Location: ../html/curriculum.php?error=Error al subir el archivo");
}

?>
