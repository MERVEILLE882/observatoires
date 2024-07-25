<?php
session_start();
include_once "../access_donnees/basedonnee.php";

if (isset($_SESSION['idU']) && isset($_GET['id'])) {
    $messageId = $_GET['id'];

    $db = new basedonnee();

    // Vérifiez que l'utilisateur est l'auteur du message
    $query = "SELECT idutil FROM message WHERE id_message = ?";
    $params = [$messageId];
    $result = $db->request($query, $params)->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['idutil'] == $_SESSION['idU']) {
        // Mettez le message à "deleted" au lieu de le supprimer physiquement
        $query = "UPDATE message SET deleted = TRUE WHERE id_message = ?";
        $db->request($query, [$messageId]);

        header("Location: ../presentation/forum.php");
        exit();
    } else {
        // Afficher une erreur si l'utilisateur n'est pas autorisé à supprimer le message
        echo "Vous n'êtes pas autorisé à supprimer ce message.";
    }
} else {
    header("Location: ../presentation/formulaire_connexion.php");
    exit();
}
?>