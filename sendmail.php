<?php
//Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$message = $_POST['message'];
$mensagem_formatada = "Nome: " . $name . "<br>E-mail: " . $email . "<br>Assunto: " . $assunto . "<br>Mensagem: " . $message;
$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'insira aqui ex: smt.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'insira seu e-mail aqui'; // substitua pelo seu e-mail
    $mail->Password = 'insira a senha do seu'; // substitua pela sua senha
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465'; 

    // Configurações do e-mail
    $mail->setFrom($mail->Username, "Juan Dev");
    $mail->addAddress('contato@juandev.com.br');
    $mail->addAddress($email);
    $mail->Subject = 'Contato do Site Juan Dev';
    $mail->isHTML(true);
    $mail->Body = $mensagem_formatada;

    // Envia o e-mail
    $mail->send();

    echo 'Mensagem enviada com sucesso!';
    
} catch (Exception $e) {
    echo 'Não foi possível enviar a mensagem. Erro: ', $mail->ErrorInfo;
}
?>