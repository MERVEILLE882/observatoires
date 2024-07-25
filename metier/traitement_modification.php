<?php
// Assurez-vous que l'utilisateur est connecté ou a les autorisations nécessaires pour traiter la modification de la publication
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idPublication = isset($_POST['idPublication']) ? $_POST['idPublication'] : null;
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
    $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
    $typedocument = isset($_POST['typedocument']) ? $_POST['typedocument'] : '';
    $organisationNom = isset($_POST['organisation']) ? $_POST['organisation'] : ''; // nom de l'organisation
    $paysNom = isset($_POST['pays']) ? $_POST['pays'] : ''; // nom du pays
    $continent = isset($_POST['continent']) ? $_POST['continent'] : '';
    $document = isset($_FILES['document']) ? $_FILES['document'] : null;
    $image_descriptive = isset($_FILES['image_descriptive']) ? $_FILES['image_descriptive'] : null;

    // Vérifiez que tous les champs nécessaires sont remplis
    if (empty($idPublication) || empty($titre) || empty($contenu) || empty($auteur) || empty($typedocument) || empty($organisationNom) || empty($paysNom) || empty($continent)) {
        echo "Erreur : tous les champs sont obligatoires.";
        exit();
    }

    // Connexion à la base de données
    require_once '../access_donnees/basedonnee.php';
    $db = new basedonnee();

    // Déboguer les valeurs reçues
    echo "idPublication: $idPublication<br>";
    echo "titre: $titre<br>";
    echo "contenu: $contenu<br>";
    echo "auteur: $auteur<br>";
    echo "typedocument: $typedocument<br>";
    echo "organisationNom: $organisationNom<br>"; // affichage du nom de l'organisation
    echo "paysNom: $paysNom<br>"; // affichage du nom du pays
    echo "continent: $continent<br>";

    // Vérifiez d'abord que $paysNom est une valeur valide dans la table pays
    $checkPaysQuery = "SELECT id_pays FROM pays WHERE nom_pays = ?";
    $paramsCheckPays = [$paysNom];
    $reqPays = $db->request($checkPaysQuery, $paramsCheckPays);
    $resultPays = $db->recover($reqPays);

    // Vérifiez que $organisationNom est une valeur valide dans la table organisationetatique
    $checkOrganisationQuery = "SELECT id_organisation FROM organisationetatique WHERE nom_organisation = ?";
    $paramsCheckOrganisation = [$organisationNom];
    $reqOrganisation = $db->request($checkOrganisationQuery, $paramsCheckOrganisation);
    $resultOrganisation = $db->recover($reqOrganisation);

    if ($resultPays && $resultOrganisation) {
        $idPays = $resultPays->id_pays; // récupérer l'ID du pays
        $idOrganisation = $resultOrganisation->id_organisation; // récupérer l'ID de l'organisation

        // Si $pays et $organisation sont valides, exécutez la requête UPDATE
        $sql = "UPDATE Publication SET titreP = ?, contenuP = ?, auteurP = ?, type_document = ?, id_organisation = ?, id_pays = ?, id_continent = ? WHERE idP = ?";
        $paramsUpdate = [$titre, $contenu, $auteur, $typedocument, $idOrganisation, $idPays, $continent, $idPublication];
        $db->request($sql, $paramsUpdate);

        // Gérer la mise à jour des fichiers (document et image descriptive) si nécessaire
        if ($document && $document['size'] > 0) {
            $documentPath = '../documents/' . basename($document['name']);
            move_uploaded_file($document['tmp_name'], $documentPath);

            $sql = "UPDATE Publication SET document = ? WHERE idP = ?";
            $params = [$documentPath, $idPublication];
            $db->request($sql, $params);
        }

        if ($image_descriptive && $image_descriptive['size'] > 0) {
            $imagePath = '../documents/' . basename($image_descriptive['name']);
            move_uploaded_file($image_descriptive['tmp_name'], $imagePath);

            $sql = "UPDATE Publication SET image_descriptive = ? WHERE idP = ?";
            $params = [$imagePath, $idPublication];
            $db->request($sql, $params);
        }

        // Redirection vers une page de confirmation ou une autre page appropriée
        header("Location: ../presentation/liste_publications__a.php");
        exit();
    } else {
        // Sinon, gestion de l'erreur (par exemple, redirection avec un message d'erreur)
        if (!$resultPays) {
            echo "Erreur : ID du pays invalide.";
        }
        if (!$resultOrganisation) {
            echo "Erreur : ID de l'organisation invalide.";
        }
        // header("Location: ../error.php?message=Invalid_Pays_or_Organisation_ID");
        exit();
    }
} else {
    echo "Erreur: méthode de requête invalide.";
}
?>
