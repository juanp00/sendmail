<?php
//Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contato@juandev.com.br'; // substitua pelo seu e-mail
    $mail->Password = 'Lima3463#'; // substitua pela sua senha
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configurações do e-mail
    $mail->setFrom($mail->Username, "Juan Dev");
    $mail->addAddress('contato@juandev.com.br');
    $mail->addAddress($email);
    $mail->Subject = 'Contato do Site Juan Dev';
    $mail->isHTML(true);
    $mail->Body = $message;

    // Envia o e-mail
    
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo 'Não foi possível enviar a mensagem. Erro: ', $mail->ErrorInfo;
}
?>