<?php
/*// Assurez-vous que l'utilisateur est connecté ou a les autorisations nécessaires pour supprimer la publication
// Récupérer l'identifiant de la publication à supprimer depuis l'URL
$idPublication = isset($_GET['id']) ? $_GET['id'] : null;

if ($idPublication) {
    // Connexion à la base de données
    require_once '../access_donnees/basedonnee.php';
    $db = new basedonnee();

    // Supprimer la publication correspondante de la base de données en fonction de l'identifiant
    $sql = "DELETE FROM Publication WHERE idP = ?";
    $params = [$idPublication];
    $db->request($sql, $params);

    // Afficher un message de confirmation ou rediriger l'utilisateur vers une autre page après la suppression
   header("location:../presentation/liste_publications__a.php");
    // Redirection vers une autre page
    // header("Location: page.php");
} else {
    // Gérer l'erreur si aucun identifiant de publication n'est fourni dans l'URL
    echo "Identifiant de publication non fourni.";
}*/







require_once '../access_donnees/basedonnee.php';

// Vérifie si la méthode de requête est POST et si l'ID est défini
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Connexion à la base de données
    $db = new basedonnee();

    // Sélectionner la publication à supprimer
    $sql = "SELECT * FROM Publication WHERE idP = ?";
    $result = $db->request($sql, [$id]);
    $publication = $db->recover($result, true);

    if ($publication) {
        // Sauvegarder dans le fichier XML
        sauvegarderDansXML($publication);

        // Supprimer la publication de la base de données
        $sqlDelete = "DELETE FROM Publication WHERE idP = ?";
        $db->request($sqlDelete, [$id]);

        // Redirection vers la liste des publications après la suppression
        header("Location: ../presentation/liste_publications.php");
        exit;
    } else {
        die('Publication non trouvée.');
    }
} else {
    die('Erreur : ID de publication non spécifié.');
}

// Fonction pour sauvegarder dans un fichier XML
function sauvegarderDansXML($publication) {
    $xmlFile = '../access_donnees/supprimees.xml';

    // Créer un nouveau fichier XML s'il n'existe pas
    if (!file_exists($xmlFile)) {
        $xml = new SimpleXMLElement('<publications/>');
    } else {
        $xml = simplexml_load_file($xmlFile);
    }

    // Ajouter la publication au fichier XML
    $publicationXML = $xml->addChild('publication');
    $publicationXML->addChild('idP', $publication->idP);
    $publicationXML->addChild('titreP', $publication->titreP);
    $publicationXML->addChild('document', $publication->document);
    $publicationXML->addChild('contenuP', $publication->contenuP);
    $publicationXML->addChild('auteurP', $publication->auteurP);
    $publicationXML->addChild('dateP', $publication->dateP);
    $publicationXML->addChild('idU_Utilisateur', $publication->idU_Utilisateur);
    $publicationXML->addChild('type_document', $publication->type_document);
    $publicationXML->addChild('image_descriptive', $publication->image_descriptive);
    $publicationXML->addChild('valide', $publication->valide);
    $publicationXML->addChild('id_pays', $publication->id_pays);
    $publicationXML->addChild('id_organisation', $publication->id_organisation);
    $publicationXML->addChild('id_continent', $publication->id_continent);

    // Enregistrer les modifications dans le fichier XML
    $xml->asXML($xmlFile);
}


?>






