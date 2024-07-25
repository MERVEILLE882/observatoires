<?php
/*session_start();

require_once '../access_donnees/basedonnee.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idU'])) {
    header("Location: ../presentation/html/index.php"); // Redirection vers la page d'accueil si l'utilisateur n'est pas connecté
    exit;
}

$basedonnee = new basedonnee();


// Vérifier si l'ID de la publication est fourni dans l'URL
if (isset($_GET['id'])) {
    $idPublication = $_GET['id'];

    // Vérifier si l'utilisateur a le droit de supprimer cette publication (ajouter vos vérifications de sécurité si nécessaire)

    // Exécuter la requête de suppression
    $sql = "DELETE FROM Publication WHERE idP = ?";
    $stmt = $basedonnee->request($sql, array($idPublication));

    // Vérifier si la suppression a réussi
    if ($stmt) {
        // Redirection vers la page de publications de l'utilisateur après la suppression
        header("Location: ../presentation/oeuvres.php");
        exit;
    } else {
        // Gestion de l'erreur de suppression
        echo "Erreur lors de la suppression de la publication.";
    }
} else {
    // Redirection vers la page d'accueil si l'ID de la publication n'est pas fourni
    header("Location: ../presentation/html/index.php");
    exit;
}*/

session_start();

require_once '../access_donnees/basedonnee.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idU'])) {
    header("Location: ../presentation/html/index.php"); // Redirection vers la page d'accueil si l'utilisateur n'est pas connecté
    exit;
}

$basedonnee = new basedonnee();
$idUtilisateur = $_SESSION['idU'];

// Vérifier si l'ID de la publication est fourni dans l'URL
if (isset($_GET['id'])) {
    $idPublication = $_GET['id'];

    // Récupérer les détails de la publication
    $sql = "SELECT idU_Utilisateur, valide FROM Publication WHERE idP = ?";
    $publication = $basedonnee->recover($basedonnee->request($sql, array($idPublication)), true);

    if ($publication) {
        // Vérifier si l'utilisateur est l'auteur de la publication et si le statut est en attente ou refusé
        if ($publication->idU_Utilisateur == $idUtilisateur && ($publication->valide === null || $publication->valide == 0)) {
            // Exécuter la requête de suppression
            $sql = "DELETE FROM Publication WHERE idP = ?";
            $stmt = $basedonnee->request($sql, array($idPublication));

            // Vérifier si la suppression a réussi
            if ($stmt) {
                // Redirection vers la page de publications de l'utilisateur après la suppression
                header("Location: ../presentation/oeuvres.php");
                exit;
            } else {
                // Gestion de l'erreur de suppression
                echo "Erreur lors de la suppression de la publication.";
            }
        } else {
            // L'utilisateur n'a pas les droits de supprimer cette publication
            echo "Vous n'êtes pas autorisé à supprimer cette publication.";
        }
    } else {
        // Publication non trouvée
        echo "Publication non trouvée.";
    }
} else {
    // Redirection vers la page d'accueil si l'ID de la publication n'est pas fourni
    header("Location: ../presentation/html/index.php");
    exit;
}
?>
