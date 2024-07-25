<?php
/*session_start();

require_once '../access_donnees/basedonnee.php';

$basedonnee = new basedonnee();

// Vérifie si l'utilisateur est connecté et est administrateur
if (!isset($_SESSION['idU']) || $_SESSION['role'] !== 'Administrateur') {
    header("Location: ../index.php"); // Redirection vers la page d'accueil si l'utilisateur n'est pas administrateur
    exit;
}

// Vérifie si l'ID de la publication à valider est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID de la publication non spécifié.";
    exit;
}

$idPublication = $_GET['id'];

try {
    // Vérifie si la publication existe dans la base de données
    $sqlCheck = "SELECT * FROM Publication WHERE idP = ?";
    $publication = $basedonnee->request($sqlCheck, array($idPublication))->fetch();

    if (!$publication) {
        echo "Publication non trouvée.";
        exit;
    }

    // Met à jour l'état de validation de la publication
    $sqlUpdate = "UPDATE Publication SET valide = true WHERE idP = ?";
    $basedonnee->request($sqlUpdate, array($idPublication));

    echo "Publication validée avec succès.";

    // Redirection vers la page d'administration
    header("Location: ../presentation/liste_publication_admin.php");

} catch (PDOException $e) {
    echo "Erreur lors de la validation de la publication: " . $e->getMessage();
}*/


session_start();

require '../vendor/autoload.php';
require_once '../access_donnees/basedonnee.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$basedonnee = new basedonnee();

// Vérifie si l'utilisateur est connecté et est administrateur
if (!isset($_SESSION['idU']) || $_SESSION['role'] !== 'Administrateur') {
    header("Location: ../index.php"); // Redirection vers la page d'accueil si l'utilisateur n'est pas administrateur
    exit;
}

// Vérifie si l'ID de la publication à valider est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID de la publication non spécifié.";
    exit;
}

$idPublication = $_GET['id'];

try {
    // Vérifie si la publication existe dans la base de données
    $sqlCheck = "SELECT * FROM Publication WHERE idP = ?";
    $publication = $basedonnee->request($sqlCheck, array($idPublication))->fetch();

    if (!$publication) {
        echo "Publication non trouvée.";
        exit;
    }

    // Met à jour l'état de validation de la publication
    $sqlUpdate = "UPDATE Publication SET valide = true WHERE idP = ?";
    $basedonnee->request($sqlUpdate, array($idPublication));

    // Récupérer l'email de l'utilisateur associé à cette publication
    $sqlUser = "SELECT email FROM Utilisateur WHERE idU = ?";
    $userEmail = $basedonnee->request($sqlUser, array($publication['idU_Utilisateur']))->fetchColumn();

    if (!$userEmail) {
        echo "Email de l'utilisateur non trouvé.";
        exit;
    }

    // Envoi de l'email à l'utilisateur
    $sujet = "Publication Validée";
    $message = "Bonjour,\n\nVotre publication a été validée avec succès.\n\nCordialement,\nL'équipe d'administration";

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'angemfangnia@gmail.com';
    $mail->Password = 'ivcxuneszypgncst';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('angemfangnia@gmail.com', 'Ange Nouga');
    $mail->addAddress($userEmail);
    $mail->isHTML(false);
    $mail->Subject = $sujet;
    $mail->Body = $message;

    if ($mail->send()) {
        echo "Publication validée avec succès. Email envoyé à l'utilisateur.";
    } else {
        echo "Erreur lors de l'envoi de l'email: " . $mail->ErrorInfo;
    }

    // Redirection vers la page d'administration
    header("Location: ../presentation/liste_publication_admin.php");

} catch (PDOException $e) {
    echo "Erreur lors de la validation de la publication: " . $e->getMessage();
}
?>


