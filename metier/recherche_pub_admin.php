<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../presentation/formulaire_connection.php");
    exit();
}

require_once '../access_donnees/basedonnee.php';

// Connexion à la base de données
$db = new basedonnee();

// Récupérer les termes de recherche de l'utilisateur
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Préparer la requête SQL pour la recherche
$sql = "SELECT * FROM Publication WHERE titreP LIKE :search OR contenuP LIKE :search OR auteurP LIKE :search ORDER BY dateP DESC";
$params = array(':search' => '%' . $search . '%');

// Exécuter la requête SQL en utilisant des requêtes préparées avec des paramètres liés
$result = $db->request($sql, $params);
$publications = $db->recover($result, false);

// Afficher les résultats de la recherche
if (!empty($publications)) {
    // Afficher chaque publication
    foreach ($publications as $publication) {
        echo '<div class="publication">';
        echo '<h3 class="publication-title">' . $publication->titreP . '</h3>';
        echo '<p class="publication-content">' . $publication->contenuP . '</p>';
        echo '<p class="publication-author">Auteur: ' . $publication->auteurP . '</p>';
        if (!empty($publication->document)) {
            // Afficher le nom du document
            echo '<p class="document-name">' . basename($publication->document) . '</p>';
            // Vérifier si le document est une image
            $isImage = getimagesize($publication->document);
            if ($isImage !== false) {
                // Afficher l'image avec la classe document-image
                echo '<img class="document-image" src="' . $publication->document . '" alt="Image">';
            } else {
                // Afficher le lien de téléchargement
                echo '<a class="document-link" href="' . $publication->document . '" download>Télécharger le document</a>';
            }
        }

        // Boutons Modifier et Supprimer
        echo '<div class="btn-group" role="group" aria-label="Actions">';
        echo '<a href="../metier/modifier_publications.php?id=' . $publication->idP . '" class="btn btn-primary">Modifier</a>';
        echo '<a href="../metier/supprimer_publication.php?id=' . $publication->idP . '" class="btn btn-danger">Supprimer</a>';
        echo '</div>';

        echo '</div>';
    }
} else {
    echo "Aucune publication trouvée pour la recherche : " . htmlspecialchars($search); // Utilisation de htmlspecialchars pour échapper les caractères spéciaux
}
?>
