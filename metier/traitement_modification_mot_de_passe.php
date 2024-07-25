<?php
require_once "../access_donnees/basedonnee.php";

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs email, token et nouveau mot de passe sont définis
    if (isset($_POST['email'], $_POST['token'], $_POST['new_password'])) {
        // Récupère les données du formulaire
        $email = $_POST['email'];
        $token = $_POST['token'];
        $new_password = $_POST['new_password'];

        // Vérifie si l'e-mail et le token sont non vides
        if (!empty($email) && !empty($token)) {
            // Vérifie si le token est valide dans la base de données
            $db = new basedonnee();
            $query_check_token = "SELECT * FROM Utilisateur WHERE email = ? AND reset_token = ? AND reset_token_expiration > NOW()";
            $params_check_token = [$email, $token];
            $result_check_token = $db->request($query_check_token, $params_check_token);
            $user = $result_check_token->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Le token est valide, met à jour le mot de passe
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query_update_password = "UPDATE Utilisateur SET password = ? WHERE email = ?";
                $params_update_password = [$hashed_password, $email];
                $db->request($query_update_password, $params_update_password);

                // Efface le token de réinitialisation du mot de passe de la base de données
                $query_clear_token = "UPDATE Utilisateur SET reset_token = NULL, reset_token_expiration = NULL WHERE email = ?";
                $params_clear_token = [$email];
                $db->request($query_clear_token, $params_clear_token);

               /* echo "Mot de passe modifié avec succès.";*/
               echo "Mot de passe modifié avec succès. Redirection en cours...";
           echo '<script>window.setTimeout(function(){ window.location = "../presentation/formulaire_connection.php"; }, 3000);</script>';

            } else {
                echo "Le lien de réinitialisation du mot de passe est invalide ou a expiré.";
            }
        } else {
            echo "Données manquantes dans le formulaire.";
        }
    } else {
        echo "Données manquantes dans le formulaire.";
    }
} else {
    echo "Accès non autorisé.";
}
?>
