<?php
require_once "../access_donnees/basedonnee.php";

if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_GET['email'];

    $db = new basedonnee();
    $query_delete_email = "DELETE FROM Subscribers WHERE email = ?";
    $params_delete_email = [$email];

    try {
        $db->request($query_delete_email, $params_delete_email);
        echo "Vous avez été désabonné de notre newsletter.";
    } catch (Exception $e) {
        echo "Erreur lors du désabonnement. Veuillez réessayer plus tard.";
    }
} else {
    echo "Adresse e-mail invalide.";
}
?>
