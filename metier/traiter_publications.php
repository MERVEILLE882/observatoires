<?php
session_start();
require_once '../access_donnees/basedonnee.php';

$basedonnee = new basedonnee();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titrePublication = $_POST['titre'];
    $contenuPublication = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $idUtilisateur = $_SESSION['idU'];
    $pays = $_POST['pays'];
    $typeDocument = $_POST['type_document'];
    $datePublication = date('Y-m-d H:i:s');

    // Fichiers téléchargés
    $document = $_FILES['document'];
    $imageDescriptive = $_FILES['image_descriptive'];

    $uploadDirectory = '../documents/';
    $errors = [];

    // Validation et téléchargement des fichiers
    if ($document['error'] == UPLOAD_ERR_OK) {
        $documentTmpName = $document['tmp_name'];
        $documentName = basename($document['name']);
        $documentPath = $uploadDirectory . $documentName;

        // Vérifier le type de fichier
        $documentMimeType = mime_content_type($documentTmpName);
        $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        if (!in_array($documentMimeType, $allowedMimeTypes)) {
            $errors[] = "Type de fichier non autorisé pour le document.";
        }

        if (empty($errors) && move_uploaded_file($documentTmpName, $documentPath)) {
            // Téléchargement réussi
        } else {
            $errors[] = "Erreur lors du téléchargement du document.";
        }
    } else {
        $errors[] = "Erreur de téléchargement du document.";
    }

    if ($imageDescriptive['error'] == UPLOAD_ERR_OK) {
        $imageDescriptiveTmpName = $imageDescriptive['tmp_name'];
        $imageDescriptiveName = basename($imageDescriptive['name']);
        $imageDescriptivePath = $uploadDirectory . $imageDescriptiveName;

        // Vérifier le type de fichier
        $imageDescriptiveMimeType = mime_content_type($imageDescriptiveTmpName);
        if (!in_array($imageDescriptiveMimeType, $allowedMimeTypes)) {
            $errors[] = "Type de fichier non autorisé pour l'image descriptive.";
        }

        if (empty($errors) && move_uploaded_file($imageDescriptiveTmpName, $imageDescriptivePath)) {
            // Téléchargement réussi
        } else {
            $errors[] = "Erreur lors du téléchargement de l'image descriptive.";
        }
    }

    if (empty($errors)) {
        try {
            // Ne pas spécifier la valeur de 'valide' pour qu'elle soit NULL par défaut
            $sql = "INSERT INTO Publication (titreP, contenuP, document, auteurP, idU_Utilisateur, pays, type_document, dateP, image_descriptive) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = [$titrePublication, $contenuPublication, $documentPath, $auteur, $idUtilisateur, $pays, $typeDocument, $datePublication, $imageDescriptivePath ?? null];
            $basedonnee->request($sql, $params);

            $redirectUrl = ($_SESSION['role'] == 'Administrateur') ? "../presentation/liste_publicationss.php" : "../presentation/message_utilisateur.php";
            header("Location: $redirectUrl");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de la publication : " . $e->getMessage();
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
