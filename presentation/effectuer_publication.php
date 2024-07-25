<?php
include_once "../metier/verifier_session.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire de publication</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
   body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  margin: 0;
  padding: 20px;
  font-family: Arial, sans-serif;
  background: linear-gradient(45deg, #f4f4f4, #e0e0e0, #f4f4f4);
  background-size: 400% 400%;
  animation: gradientBG 10s ease infinite;
}

@keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

    .container {
      max-width: 600px;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-size: 2rem; /* Taille de police */
      font-weight: bold;
      text-align: center; /* Centrage du texte */
      color: #007bff; /* Couleur bleue */
      margin-bottom: 20px; /* Marge en bas pour espacement */
    }

    .form-label {
      font-weight: bold;
      color: #333333;
    }

    /* Style pour les champs de saisie */
    .form-control {
      border: 1px solid #ced4da; /* Bordure grise */
      border-radius: 4px; /* Coins arrondis */
      padding: 8px 12px; /* Espacement interne */
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Transition douce pour la bordure et l'ombre */
    }

    /* Focus sur les champs de saisie */
    .form-control:focus {
      border-color: #80bdff; /* Bordure bleue lorsqu'en focus */
      outline: 0; /* Supprime l'ombre du focus par défaut */
      box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25); /* Ombre légère bleue */
    }

    /* Style pour les zones de texte */
    textarea.form-control {
      min-height: 120px; /* Hauteur minimale pour la zone de texte */
      resize: vertical; /* Redimensionnement vertical seulement */
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="form-title mb-4">Formulaire de publication</h1>
    <form method="POST" action="../metier/traitement_publication.php" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
      </div>
      <div class="mb-3">
        <label for="contenu" class="form-label">Contenu</label>
        <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
      </div>
      <div class="row g-3">
        <div class="col-md-6 mb-3">
          <label for="auteur" class="form-label">Auteur</label>
          <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="type_document" class="form-label">Type de document</label>
          <select class="form-select" id="type_document" name="type_document">
            <option value="">Tous les types de documents</option>
            <option value="arrete">Arrêté</option>
            <option value="decret">Décret</option>
            <option value="communique">Communiqué</option>
            <option value="rapport">Rapport</option>
            <option value="étude">Étude</option>
            <option value="article">Article</option>
            <option value="loi">Loi</option>
            <option value="directive">Directive</option>
            <option value="regulation">Règlement</option>
          </select>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-4 mb-3">
          <label for="continent" class="form-label">Continent</label>
          <select class="form-select" id="continent" name="continent">
            <option value="">Sélectionnez un continent</option>
            <?php
              require_once '../access_donnees/basedonnee.php';
              $db = new basedonnee();
              $sql = "SELECT * FROM Continent";
              $result = $db->request($sql);
              $continents = $db->recover($result, false);
              foreach ($continents as $continent) {
                echo '<option value="' . $continent->id_continent . '">' . $continent->nom_continent . '</option>';
              }
            ?>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="pays" class="form-label">Pays</label>
          <select class="form-select" id="pays" name="id_pays"> 
            <option value="">Sélectionnez un pays</option>
            <?php
              require_once '../access_donnees/basedonnee.php';
              $db = new basedonnee();
              $sql = "SELECT * FROM Pays";
              $result = $db->request($sql);
              $pays = $db->recover($result, false);
              foreach ($pays as $pays) {
                echo '<option value="' . $pays->id_pays . '">' . $pays->nom_pays . '</option>';
              }
            ?>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="organisation" class="form-label">Organisation étatique</label>
          <select class="form-select" id="organisation" name="organisation">
            <option value="">Sélectionnez une organisation</option>
            <?php
              require_once '../access_donnees/basedonnee.php';
              $db = new basedonnee();
              $sql = "SELECT * FROM OrganisationEtatique";
              $result = $db->request($sql);
              $organisations = $db->recover($result, false);
              foreach ($organisations as $organisation) {
                echo '<option value="' . $organisation->id_organisation . '">' . $organisation->nom_organisation . '</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="document" class="form-label">Document</label>
        <input type="file" class="form-control" id="document" name="document">
      </div>
      <div class="mb-3">
        <label for="image_descriptive" class="form-label">Image descriptive (pour les documents PDF)</label>
        <input type="file" class="form-control" id="image_descriptive" name="image_descriptive">
      </div>
      <button type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>