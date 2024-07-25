<?php
// Vérifie si les paramètres email et token sont présents dans l'URL
if (isset($_GET['email']) && isset($_GET['token'])) {
    // Récupère l'e-mail et le token depuis l'URL
    $email = $_GET['email'];
    $token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du mot de passe</title>
    <link rel="stylesheet" href="../presentation/formc.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
    <h2 class="active"> Modification du mot de passe </h2>
    <form action="traitement_modification_mot_de_passe.php" method="post">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="mb-3">
            <input type="password" id="password" class="fadeIn third" name="new_password" placeholder="Nouveau mot de passe" required>
        </div>
        <input type="submit" class="fadeIn fourth" value="Modifier">
    </form>
    </div>
</div>
</body>
</html>

<?php
} else {
    // Affiche un message d'erreur si les paramètres email et token sont manquants
    echo "Paramètres manquants dans l'URL.";
}
?>
