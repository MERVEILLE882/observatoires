<?php
include_once "../access_donnees/basedonnee.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insérer les données dans la base de données
    $db = new basedonnee();
    $sql = "INSERT INTO formulaire_contact (email, subject, message) VALUES (?, ?, ?)";
    $params = [$email, $subject, $message];
    $db->request($sql, $params);

    // Redirection après l'envoi du formulaire
    header("Location: ../presentation/succes.php");
    exit();
}
?>
