<?php
session_start();
include_once "../access_donnees/basedonnee.php";

// Votre clé secrète
$secret = "6LfJ-P0pAAAAAKnhDkCDmzAIUdXr7ad76TzhzRTT";

// Réponse du reCAPTCHA
$response = $_POST['g-recaptcha-response'];

// Vérifiez la réponse du reCAPTCHA
$remoteip = $_SERVER['REMOTE_ADDR'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
$responseKeys = json_decode(file_get_contents($url), true);

if(intval($responseKeys["success"]) !== 1) {
    $erreur = "Veuillez vérifier que vous n'êtes pas un robot.";
    header("Location: ../presentation/formulaire_connection.php?erreur=$erreur");
    exit();
}

// Vérifier si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données soumises par le formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Créer une instance de la classe basedonnee pour la connexion à la base de données
    $db = new basedonnee();

    // Vérifier si l'utilisateur est déjà inscrit
    $query_check_user = "SELECT * FROM Utilisateur WHERE email = ?";
    $params_check_user = [$email];
    $result_check_user = $db->request($query_check_user, $params_check_user);

    if ($result_check_user->rowCount() == 0) {
        // L'utilisateur n'est pas encore inscrit
        $erreur = "Vous n'êtes pas encore inscrit. Veuillez vous inscrire.";
        header("Location: ../presentation/formulaire_inscription.php?erreur=$erreur");
        exit();
    }

    // Vérifier l'authentification de l'utilisateur
    $query_authenticate = "SELECT * FROM Utilisateur WHERE email = ?";
    $params_authenticate = [$email];
    $result_authenticate = $db->request($query_authenticate, $params_authenticate);

    if ($result_authenticate->rowCount() > 0) {
        // Récupérer les informations de l'utilisateur
        $user = $result_authenticate->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $user["password"];
        $idCategorie = $user["id_Categorie"];
        // Vérifier si le mot de passe soumis correspond au mot de passe haché enregistré
        if (password_verify($password, $hashedPassword)) {
            // Authentification réussie
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email; // Stocker l'email dans la session
            $_SESSION["idU"] = $user["idU"];
            $_SESSION["categorie"] = ($idCategorie == 1) ? 'Administrateur' : 'Utilisateur';

            // Définir un cookie de session persistant
             // Définir un cookie de session pour maintenir la connexion
             setcookie("loggedin", true, time() + (86400 * 30), "/"); // 86400 = 1 jour
             setcookie("email", $email, time() + (86400 * 30), "/");
             setcookie("idU", $user["idU"], time() + (86400 * 30), "/");
             setcookie("role", $_SESSION["categorie"], time() + (86400 * 30), "/");
 

            // Vérifier la catégorie de l'utilisateur
            if ($idCategorie == 1) {
                // L'utilisateur est un Administrateur
                $_SESSION["role"] = "Administrateur";
                header("Location: ../presentation/html/accueil_admin.php"); // Rediriger vers la page d'administration
                exit();
            } elseif ($idCategorie == 2) {
                // L'utilisateur est un Utilisateur
                $_SESSION["role"] = "Utilisateur";
                header("Location: ../presentation/index.php"); // Rediriger vers la page utilisateur
                exit();
            }
        } else {
            // Mot de passe incorrect
            echo "mot de passe incorrect";
            $erreur = "Mot de passe incorrect.";
            header("Location: ../presentation/formulaire_connection.php?erreur=$erreur");
            exit();
        }
    } else {
        // Erreur de connexion inattendue
        $erreur = "Une erreur s'est produite. Veuillez réessayer plus tard.";
        header("Location: ../presentation/formulaire_connection.php?erreur=$erreur");
        exit();
    }
} else {
    // Rediriger vers la page de connexion si la méthode de requête n'est pas POST
    header("Location: ../presentation/formulaire_connection.php");
    exit();
}
?>
