<?php
session_start();
include_once "../access_donnees/basedonnee.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['idU'])) {
    $texte_message = $_POST['texte_message'];
    $date_message = date('Y-m-d');
    $heure_message = date('H:i:s');
    $idutil = $_SESSION['idU'];
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;

    $db = new basedonnee();

    $query = "INSERT INTO message (texte_message, date_message, heure_message, idutil, parent_id) VALUES (?, ?, ?, ?, ?)";
    $params = [$texte_message, $date_message, $heure_message, $idutil, $parent_id];

    $db->request($query, $params);

    header("Location: ../presentation/forum.php");
    exit();
} else {
    header("Location: ../presentation/formulaire_connexion.php");
    exit();
}
?>
