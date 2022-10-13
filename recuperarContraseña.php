<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 include("conexion.php");
  $correo=$_REQUEST['txtBuscar'];
  $quey=  mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
     $nr=mysqli_num_rows($quey);
     if($nr==1){
        foreach ($conexion->query("SELECT * FROM usuarios WHERE  correo='$correo'") as $row)
        $a=$row['nombreC'];
        $b=$row['nombre'];
        $c=$row['pass'];
        
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$hola="esta es tu contraseña:";
$correo1="coscamila20@gmail.com";
try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jonnylucero47@gmail.com';
    $mail->Password = 'torbellino20';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('jonnylucero47@gmail.com', 'Sistema de Estacionamiento y Autolavado');
    $mail->addAddress($correo, 'Receptor');
 

   // $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

    $mail->isHTML(true);
    $mail->Subject = 'ESTACIONAMIENTO';
    $mail->Body = 'Saludos Gracias por solicitar la recuperacion de contraseña. <br/>
    Tu contraseña se ha enviado <b>Nombre Completo:</b>.'.$a.'<br/> <b>Nombre de usuario:</b>'.$b.
    '<br/> <b>Contraseña: </b>'.$c;
    $mail->send();
    echo  "<SCRIPT >
    alert('Recuperacion de contraseña exitosamente');
    document.location=('index.php');
    </SCRIPT>"; 
    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}
}else{
    echo "<script> alert('El correo no se encuentra asociado a ningun usuario'); window.location='index.php'</script>";
}