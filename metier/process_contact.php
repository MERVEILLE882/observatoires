<?php
// Inclure le fichier de connexion à la base de données
require_once '../access_donnees/basedonnee.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Créer une instance de la classe basedonnee
    $db = new basedonnee();

    // Préparer la requête d'insertion
    $sql = "INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)";
    $params = [
        ':nom' => $nom,
        ':email' => $email,
        ':message' => $message
    ];

    // Exécuter la requête
    $db->request($sql, $params);

    // Rediriger l'utilisateur avec un message de confirmation
    header('Location: ../presentation/html/contact.php?success=1');
    exit();
}
?>
