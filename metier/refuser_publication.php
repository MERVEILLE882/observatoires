<?php
session_start();
require_once '../access_donnees/basedonnee.php';

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'Administrateur') {
  echo "<p>Accès non autorisé.</p>";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idPublication = $_GET['id'];

    // Connexion à la base de données
    $db = new basedonnee();

    try {
        // Mettre à jour le statut de la publication à "Refusée"
        $sql = "UPDATE Publication SET valide = false WHERE idP = ?";
        $db->request($sql, [$idPublication]);

        // Redirection vers la page précédente ou une page appropriée
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors du refus de la publication : " . $e->getMessage();
    }
} else {
    echo "<p>Requête invalide.</p>";
}
?>
