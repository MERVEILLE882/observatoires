<?php
require_once '../../access_donnees/basedonnee.php'; // Assurez-vous que le chemin est correct

$basedonnee = new basedonnee();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mise à jour des informations de l'utilisateur
    $id = $_POST['idU'];
    $nom = $_POST['nomU'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['dateNaissance'];
    $categorie = $_POST['id_Categorie'];

    $sql = "UPDATE Utilisateur SET nomU = ?, email = ?, dateNaissance = ?, id_Categorie = ? WHERE idU = ?";
    $params = array($nom, $email, $dateNaissance, $categorie, $id);
    $basedonnee->request($sql, $params);

    header("Location: liste_utilisateurs.php");
    exit();
} else {
    // Récupération des informations de l'utilisateur
    $id = $_GET['id'];
    $sql = "SELECT * FROM Utilisateur WHERE idU = ?";
    $req = $basedonnee->request($sql, array($id));
    $utilisateur = $basedonnee->recover($req);

    $sql_categories = "SELECT * FROM Categorie";
    $req_categories = $basedonnee->request($sql_categories);
    $categories = $basedonnee->recover($req_categories, false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="../formc.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <h2 class="active"> Modifier Utilisateur </h2>

        <!-- Login Form -->
        <form action="modifier_utilisateur.php" method="post">
            <input type="hidden" name="idU" value="<?php echo htmlspecialchars($utilisateur->idU); ?>">
            <input type="text" id="nomU" class="fadeIn second" name="nomU" placeholder="Nom" value="<?php echo htmlspecialchars($utilisateur->nomU); ?>" required>
            <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" value="<?php echo htmlspecialchars($utilisateur->email); ?>" required>
            <input type="date" id="date" class="fadeIn third" name="dateNaissance" placeholder="dateNaissance" value="<?php echo htmlspecialchars($utilisateur->dateNaissance); ?>" required>

            <label for="id_Categorie">Catégorie:</label>
            <select name="id_Categorie" required>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?php echo $categorie->id; ?>" <?php if ($categorie->id == $utilisateur->id_Categorie) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($categorie->nom); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" class="fadeIn fourth" value="Modifier" onclick="return confirm('Êtes-vous sûr de vouloir modifier cet utilisateur?');">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="liste_utilisateurs.php">Retour à la liste</a>
        </div>

    </div>
</div>
</body>
</html>
