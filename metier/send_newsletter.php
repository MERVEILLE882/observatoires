<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once "../access_donnees/basedonnee.php";

// Récupérer les e-mails des abonnés
$db = new basedonnee();
$query_get_emails = "SELECT email FROM Subscribers";
$emails = $db->request($query_get_emails)->fetchAll(PDO::FETCH_COLUMN);

// Contenu de la newsletter
$subject = 'Nouveaux produits disponibles';

foreach ($emails as $email) {
    // Déplacer la déclaration de $email à l'intérieur de la boucle foreach
    $body = '<h1>Découvrez nos nouveaux produits!</h1><p>Visitez notre site pour plus d\'informations.</p><p><a href="unsubscribe.php?email=' . urlencode($email) . '">Se désabonner</a></p>';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'angemfangnia@gmail.com';
        $mail->Password = 'ivcxuneszypgncst';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('angemfangnia@gmail.com', 'Ange Nouga');
        $mail->addAddress($email);

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        echo "Newsletter envoyée à $email<br>";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail à $email : {$mail->ErrorInfo}<br>";
    }
}

?>
