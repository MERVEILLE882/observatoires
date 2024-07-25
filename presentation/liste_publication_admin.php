<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Liste des publications en attente de validation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #ebebeb;
      color: #3a57af;
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .publication {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .publication-title {
      font-size: 1.5em;
      margin-bottom: 10px;
    }

    .publication-author {
      font-style: italic;
      margin-bottom: 10px;
    }

    .document-image {
      width: 100%;
      height: auto;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .btn-consulter {
      background-color: #3a57af;
      color: #fff;
      border: none;
      padding: 10px 5px;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 2px;
    }

    .btn-valider {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 5px;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 2px;
      transition: background-color 0.3s ease;
    }

    .btn-valider:hover {
      background-color: #3e8e41;
    }

    .btn-refuser {
      background-color: red;
      color: #fff;
      border: none;
      padding: 10px 5px;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 2px;
    }

    .btn-refuser:hover {
      background-color: darkred;
    }

    @media (max-width: 768px) {
      .col-md-4, .col-sm-6 {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Liste des publications en attente de validation</h1>
  <div class="row">
    <?php
    session_start();
    require_once '../access_donnees/basedonnee.php';

    // Vérifier si l'utilisateur est un administrateur
    if ($_SESSION['role'] !== 'Administrateur') {
      echo "<p>Accès non autorisé.</p>";
      exit;
    }

    // Connexion à la base de données
    $db = new basedonnee();

    // Récupérer les publications en attente de validation
    $sql = "SELECT * FROM Publication WHERE valide IS NULL ORDER BY dateP DESC";
    $result = $db->request($sql);
    $publications = $db->recover($result, false);

    if (!empty($publications)) {
      // Afficher chaque publication
      foreach ($publications as $publication) {
        echo '<div class="col-md-4 col-sm-6">';
        echo '<div class="publication">';
        echo '<h3 class="publication-title">' . $publication->titreP . '</h3>';
        echo '<p class="publication-author">Auteur: ' . $publication->auteurP . '</p>';
        
        if (!empty($publication->document)) {
          // Vérifier si le document est une image
          $isImage = getimagesize($publication->document);
          if ($isImage !== false) {
            // Afficher l'image avec la classe document-image
            echo '<img class="document-image" src="' . $publication->document . '" alt="Image">';
          } else {
            // Le document est un PDF, afficher l'image descriptive
            echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
          }
        }

        // Boutons pour consulter, valider et refuser la publication
        echo '<a class="btn btn-primary btn-consulter" href="contenupublication.php?id=' . $publication->idP . '"><i class="fas fa-eye"></i> Consulter</a>';
        echo '<a href="../metier/valider_publication.php?id=' . $publication->idP . '" class="btn btn-success btn-valider" onclick="return confirm(\'Êtes-vous sûr de vouloir accepter cette publication?\');"><i class="fas fa-check"></i> Valider</a>';
        echo '<a href="../metier/refuser_publication.php?id=' . $publication->idP . '" class="btn btn-danger btn-refuser" onclick="return confirm(\'Êtes-vous sûr de vouloir refuser cette publication?\');"><i class="fas fa-times"></i> Refuser</a>';
        
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "<p>Aucune publication en attente de validation.</p>";
    }
    ?>
  </div>
</div>

<script>
  document.querySelectorAll('.document-image').forEach(function(image) {
    image.addEventListener('click', function() {
      this.classList.toggle('enlarged');
    });
  });
</script>

</body>
</html>
