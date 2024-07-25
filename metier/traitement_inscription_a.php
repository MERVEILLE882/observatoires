<?php
require_once '../access_donnees/basedonnee.php'; // Assurez-vous que le chemin est correct

$basedonnee = new basedonnee();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $login = $_POST['nomU'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['dateNaissance'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Utilisation de password_hash pour hacher le mot de passe

    try {
        // Vérifier si l'adresse e-mail est déjà utilisée
        $sql_check_email = "SELECT COUNT(*) FROM Utilisateur WHERE email = ?";
        $params_check_email = array($email);
        $result_check_email = $basedonnee->request($sql_check_email, $params_check_email);
        $count_email = $result_check_email->fetchColumn();

        if ($count_email > 0) {
            // Si l'adresse e-mail est déjà utilisée, afficher un message d'erreur
            echo "Cette adresse e-mail est déjà associée à un compte. Veuillez utiliser une autre adresse e-mail.";
            //header("Location: ../presentation/formulaire_inscription_a.php");
        } else {
            // Si l'adresse e-mail n'est pas déjà utilisée, procéder à l'inscription
            // Préparation de la requête SQL
            $sql = "INSERT INTO Utilisateur (nomU, email, password, dateNaissance, id_Categorie) VALUES (?, ?, ?, ?, ?)";
            $params = array($login, $email, $password, $dateNaissance, 2); // Remplacez 1 par l'ID de la catégorie appropriée

            // Exécution de la requête à travers la méthode request de la classe basedonnee
            $req = $basedonnee->request($sql, $params);
            echo "Utilisateur ajoute avec succes";
        }
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur lors de l'inscription: " . $e->getMessage();
    }
}
?>
