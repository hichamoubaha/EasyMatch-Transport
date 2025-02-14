<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require "../config/email-details.php";

class Notification
{


public static function sendNotification($email, $status) {

    $mail = new PHPMailer(true);

    try {
     
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;  
        $mail->Password = PASSWORD;     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;  
        
        
        $mail->setFrom('votre_email@gmail.com', 'EasyMatch Transport');
        $mail->addAddress($email);  

       
        $mail->isHTML(true);
        $mail->Subject = 'Statut de votre demande';

        if ($status === 'accepted') {
            $mail->Body = 'Votre demande a été <b>acceptée</b>.';
        } elseif ($status === 'refused') {
            $mail->Body = 'Votre demande a été <b>refusée</b>.';
        }

        // Envoyer l'email
        $mail->send();
        echo 'Notification envoyée avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de la notification : {$mail->ErrorInfo}";
    }
}


}

$userEmail = 'abdelkarimmouss73@gmail.com'; // Remplacez par l'e-mail du destinataire
$demandeStatus = 'accepted'; // Statut de la demande

EmailNotification::sendNotification($userEmail, $demandeStatus);