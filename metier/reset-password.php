<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Chemin vers le fichier autoload.php de PHPMailer
include_once "../access_donnees/basedonnee.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Vérifier si l'e-mail existe dans la base de données
    $db = new basedonnee();
    $query_check_user = "SELECT * FROM Utilisateur WHERE email = ?";
    $params_check_user = [$email];
    $result_check_user = $db->request($query_check_user, $params_check_user);
    $user = $result_check_user->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Générer un jeton sécurisé pour la réinitialisation du mot de passe
        $token = generateRandomToken();

        // Mettre à jour le jeton dans la base de données
        $query_update_token = "UPDATE Utilisateur SET reset_token = ?, reset_token_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?";
        $params_update_token = [$token, $email];
        $db->request($query_update_token, $params_update_token);

        // Envoyer un e-mail avec le lien de réinitialisation du mot de passe
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP (à remplacer par vos propres paramètres)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'angemfangnia@gmail.com';
            $mail->Password = 'ivcxuneszypgncst';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('angemfangnia@gmail.com', 'Ange Nouga');
            $mail->addAddress($email);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body = 'Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant :<a href="http://192.168.106.68/Observatoire_en_lignes/metier/modifier_mot_de_passe.php?email=' . urlencode($email) . '&token=' . urlencode($token). '">Réinitialiser le mot de passe</a>';
            $mail->send();
            echo "Un lien pour réinitialiser votre mot de passe a été envoyé à votre adresse e-mail.";
        } catch (Exception $e) {
            echo "Échec de l'envoi de l'e-mail. Erreur : {$mail->ErrorInfo}";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cette adresse e-mail.";
    }
}

// Fonction pour générer un jeton aléatoire sécurisé
function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length));
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="../presentation/formc.css">
</head>
<body>
    
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Réinitialisation du mot de passe </h2>

    <!-- Login Form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
      <input type="submit" class="fadeIn fourth" value="Réinitialiser">
    </form>

  </div>
</div>
</body>
</html>