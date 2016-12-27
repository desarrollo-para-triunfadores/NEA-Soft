<?php
require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');
$name       = $_POST['name'];
$from       = $_POST['email'];
$message    = $_POST['message'];

$correo = new PHPMailer();
$correo->IsSMTP();
$correo->SMTPAuth = true;
$correo->SMTPSecure = 'ssl';
$correo->Host = "smtp.gmail.com";
$correo->Port = 465;
$correo->Username   = "mail.delivery@gmail.com";
$correo->Password   = "cacereskuszniruk";
$correo->SetFrom("mail.delivery@gmail.com", "www.NeaSoft.com.ar");
$correo->AddAddress("info.neasoft@hotmail.com");
$correo->addCC("jpcaceres.nea@gmail.com","Copia desde NeaSoft.com");
$correo->addCC("hacho.kuszniruk@gmail.com","Copia desde NeaSoft.com.com");

$correo->Subject = ("Mensaje de visitante de www.NeaSoft.com.ar");
$correo->MsgHTML("Mensaje: ". $message ."\n(Nombre del emisor: ".$name .". \nEmail de contacto: ".$from.")");

if(!$correo->Send()) {
  //echo  "Hubo un error: " . $correo->ErrorInfo;
   echo '<p class="text-warning">Hubo un problema al eviar su mensaje. Por favor utilice otra de manera de contactarse con nosotros. Disculpe las molestias.</p>';
} else {
   echo '<p class="text-success">Gracias por ponerse en contacto con nosotros. Tan pronto como sea posible nos pondremos en contacto con usted.</p>';
}
