<?php
require_once '../../access_donnees/basedonnee.php'; // Assurez-vous que le chemin est correct

$basedonnee = new basedonnee();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Utilisateur WHERE idU = ?";
    $basedonnee->request($sql, array($id));

    header("Location: liste_utilisateurs.php");
    exit();
}
?>
