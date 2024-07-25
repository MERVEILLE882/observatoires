<?php
// Connexion à la base de données
require_once "../access_donnees/basedonnee.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ email est rempli et valide
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];

        // Vérifier si l'e-mail est déjà abonné
        $db = new basedonnee();
        $query_check_email = "SELECT COUNT(*) FROM Subscribers WHERE email = ?";
        $params_check_email = [$email];
        $result_check_email = $db->request($query_check_email, $params_check_email);
        $is_subscribed = $result_check_email->fetchColumn();

        if ($is_subscribed) {
            echo "Vous êtes déjà abonné à notre newsletter.";
        } else {
            // Insérer l'e-mail dans la table Subscribers
            $query_insert_email = "INSERT INTO Subscribers (email) VALUES (?)";
            $params_insert_email = [$email];

            try {
                $db->request($query_insert_email, $params_insert_email);
                echo "Vous êtes maintenant abonné à notre newsletter.";
            } catch (Exception $e) {
                echo "Erreur lors de l'abonnement. Veuillez réessayer plus tard.";
            }
        }
    } else {
        echo "Veuillez entrer une adresse e-mail valide.";
    }
} else {
    echo "Accès non autorisé.";
}
?>

