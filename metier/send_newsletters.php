<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once "../access_donnees/basedonnee.php";

session_start();

// Vérifier si l'utilisateur est connecté et est administrateur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrateur') {
    // Redirection vers une page d'accès non autorisé
    header("Location: ../index.php");
    exit();
}

// Récupérer les e-mails des abonnés
$db = new basedonnee();
$query_get_emails = "SELECT email FROM Subscribers";
$emails = $db->request($query_get_emails)->fetchAll(PDO::FETCH_COLUMN);

// Récupérer le sujet et le contenu de la newsletter depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    foreach ($emails as $email) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'angemfangnia@gmail.com'; // Mettez votre adresse email
            $mail->Password = 'ivcxuneszypgncst'; // Mettez votre mot de passe SMTP
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('angemfangnia@gmail.com', 'Ange Nouga');
            $mail->addAddress($email);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;

            $mail->send();
            echo "Newsletter envoyée à $email<br>";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail à $email : {$mail->ErrorInfo}<br>";
        }
    }
} else {
    // Redirection si la méthode de requête n'est pas POST
    header("Location: newsletter.php");
    exit();
}
?>
