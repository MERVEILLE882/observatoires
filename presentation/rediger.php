<?php
session_start();
require_once '../access_donnees/basedonnee.php';

$basedonnee = new basedonnee();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titrePublication = $_POST['titre'];
    $contenuPublication = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $idUtilisateur = $_SESSION['idU'];
    // La variable $pays n'est pas définie ici, elle n'existe pas dans le formulaire
    // $pays = $_POST['pays']; // ERREUR!
    $typeDocument = $_POST['type_document'];
    $datePublication = date('Y-m-d H:i:s');
    $continent = $_POST['continent'];
    $organisation = $_POST['organisation'];
    $id_pays = $_POST['id_pays']; // Récupérez l'ID du pays depuis le formulaire

    // Fichiers téléchargés
    $documentName = $_FILES['document']['name'];
    $documentTmpName = $_FILES['document']['tmp_name'];
    $imageDescriptiveName = $_FILES['image_descriptive']['name'];
    $imageDescriptiveTmpName = $_FILES['image_descriptive']['tmp_name'];

    $uploadDirectory = '../documents/';
    $documentPath = $uploadDirectory . $documentName;
    $imageDescriptivePath = $uploadDirectory . $imageDescriptiveName;

    // Déplacement des fichiers téléchargés
    if (move_uploaded_file($documentTmpName, $documentPath)) {
        // Si l'image descriptive est téléchargée
        if (!empty($imageDescriptiveName) && move_uploaded_file($imageDescriptiveTmpName, $imageDescriptivePath)) {
            $imageDescriptivePath = $imageDescriptivePath;
        } else {
            $imageDescriptivePath = null; // Si pas d'image descriptive
        }

        try {
            // Détermine si l'utilisateur est un administrateur
            if ($_SESSION['role'] == 'Administrateur') {
                $valide = 1; // Publication validée automatiquement pour les administrateurs
            } else {
                $valide = null; // Laisse 'valide' NULL pour l'attente de validation
            }

            // Requête SQL pour insérer dans la table Publication
            $sql = "INSERT INTO Publication (titreP, contenuP, document, auteurP, idU_Utilisateur, id_pays, type_document, dateP, image_descriptive, valide, id_organisation, id_continent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            // Utilisez $id_pays à la place de $pays dans la liste des paramètres
            $params = [$titrePublication, $contenuPublication, $documentPath, $auteur, $idUtilisateur, $id_pays, $typeDocument, $datePublication, $imageDescriptivePath, $valide, $organisation,$continent];

            $basedonnee->request($sql, $params);

            // Redirection après insertion
            $redirectUrl = ($_SESSION['role'] == 'Administrateur') ? "../presentation/liste_publications__a.php" : "../presentation/message_utilisateur.php";
            header("Location: $redirectUrl");
            exit;
        } catch (PDOException $e) {
            // Gestion des erreurs de la base de données
            echo "Erreur lors de la publication : " . $e->getMessage();
        }
    } else {
        // Gestion des erreurs de téléchargement
        echo "Erreur lors du téléchargement du document.";
    }
}
?>