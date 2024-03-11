<?php
/*
Template Name: Шаблон:  Почта
Template Post Type: page
*/
?>

<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['firstname'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$comment = $_POST['message'];


//$mail->SMTPDebug = 3;                           

$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'mr.bagfreeman@yandex.ru';
$mail->Password = 'dnzmvxraqzamnfvs';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('mr.bagfreeman@yandex.ru');
$mail->addAddress('mr.bagfreeman@yandex.ru');
// $mail->addAddress('');              
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');        
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
$mail->isHTML(true);

$mail->Subject = 'Заявка c сайта ТатСпецТранспорт';
$mail->Body = 'Имя: <b>' . $name . '</b><br>' . 'Телефон: <b>' . $phone . '</b><br>' . 'Почта: <b>' . $email . '</b><br>' . 'Сообщение: <b>' . $comment . '</b><br>';
$mail->AltBody = '';

$mail->send();
