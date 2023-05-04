<?php
include_once "../Model/Reclamation.php";
include_once "../Controller/ReclamationC.php";

use PHPMailer\PHPMailer\PHPMailer;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';





if (
    isset($_POST['idClientadd']) &&
    isset($_POST['Emailadd']) &&
    isset($_POST['Sujetadd']) &&
    isset($_POST['Messageadd'])
) {
    if (
        !empty($_POST['idClientadd']) &&
        !empty($_POST['Emailadd']) &&
        !empty($_POST['Sujetadd']) &&
        !empty($_POST['Messageadd']) 
    ) {
        // Ajouter la réclamation dans la base de données
        $Reclamation = new Reclamation(
            null,
            $_POST['idClientadd'],
            $_POST['Emailadd'],
            $_POST['Sujetadd'],
            $_POST['Messageadd'],
            $_POST['Statutadd']
        );
        $ReclamationC = new ReclamationC();
        $ReclamationC->addReclamation($Reclamation);
        

        
        // Envoyer un e-mail à l'utilisateur
  

        $mail = new PHPMailer(true);

        // Paramètres du serveur de messagerie
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Le serveur SMTP à utiliser
        $mail->SMTPAuth = true;           // Activer l'authentification SMTP
        $mail->Username = 'regaiegmahdi30@gmail.com';   // Nom d'utilisateur SMTP
        $mail->Password = 'evejhgvpjflzknxv';   // Mot de passe SMTP
        $mail->SMTPSecure = 'ssl';        // Activer TLS
        $mail->Port = 465;  

        // Paramètres de l'e-mail
        $mail->isHTML(true);
        $mail->setFrom('regaiegmahdi30@gmail.com');   // Adresse e-mail de l'expéditeur
        $mail->addAddress($_POST['Emailadd']);       // Adresse e-mail du destinataire
        $mail->Subject = '[Sweat Society Gym]';   // Sujet de l'e-mail
        $mail->Body = 'Votre réclamation a été ajoutée avec succées.';   // Corps de l'e-mail

        // Envoyer l'e-mail
        $mail->send();

        header('location:listReclamation.php');
    } else {
        header('location:listReclamation.php');
    }
} else {
    header('location:listReclamation.php');
}
