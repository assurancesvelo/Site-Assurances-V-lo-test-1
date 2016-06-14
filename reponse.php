<?php

require 'Email/PHPMailerAutoload.php';

$return = $_POST;

$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'pierre.liduena@gmail.com';                 // SMTP username
    $mail->Password = 'Fr-dh-en';                           // SMTP password
    $mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `SSL` also accepted
    $mail->Port = 465;

    $mail->From = 'assurancesvelo@gmail.com';
    $mail->FromName = 'assurancesvelo';
    $mail->addAddress('assurancesvelo@gmail.com');     // Add a recipient
    $mail->addCC('nico-roy@hotmail.fr');
    $mail->addBCC('');

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->addAttachment('');         // Add attachments
    $mail->addAttachment('', '');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Nouvelle demande de devis';
    ob_start();   


    $mail->Body = 'bonjour'; 




                       // start capturing output
    //$mail->Body = 'Un partenaire a signalé un nouveau client potentiel : <br><br>Partenaire : ' . $_POST["email_client"] . ' ' . $_POST["prix_velo"] ;    // get the contents from the buffer




    ob_end_clean();                  // stop buffering and discard contents

    $mail->AltBody = 'Pas de HTML :(';

    if (!$mail->send()) {
    	$return["PHPMAILER"] = 'Mailer Error: ' . $mail->ErrorInfo;
    	$return["json"] = json_encode($return);
    	echo json_encode($return);
    } else {
    	$return["PHPMAILER"] = 'Message has been sent';
    	$return["json"] = json_encode($return);
    	echo json_encode($return);
    }





