<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>Liste des publications</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #ebebeb; /* Gris clair */
    color: #3a57af; /* Bleu foncé */
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
   display: flex; /* Utiliser flexbox pour aligner les éléments verticalement */
   flex-direction: column; /* Disposer les éléments en colonne */
   height: 100%; /* Utiliser toute la hauteur disponible */
  }



    .publication-title {
    font-size: 1.3em;
    margin-bottom: 10px;
    color: #3a57af;
    font-weight: bold;
    word-wrap: break-word; /* Permettre le retour à la ligne des mots longs */
    white-space: pre-wrap; /* Permettre le retour à la ligne pour les espaces */
    overflow: hidden; /* Masquer tout débordement */
    text-overflow: ellipsis; /* Ajouter des points de suspension pour le texte débordant */
    max-height: 3.9em; /* Limiter la hauteur du titre à 3 lignes */
    line-height: 1.3em; /* Hauteur de ligne égale à la taille de la police pour assurer 3 lignes */
}
  .publication-content {
    margin-bottom: 10px;
  }

  .publication-author {
    font-style: italic;
    margin-bottom: 10px;
  }

  .document-name {
    font-weight: bold;
    margin-bottom: 10px;
  }
  .enlarged {
   transform: scale(1.2);
  }
  /* Fixed height and width for all images */
  /*.document-image {
     /* width: 100%; /* Ajuster la largeur de l'image à 100% du conteneur */
      /*height: auto; /* Ajuster la hauteur automatiquement */
      /*margin-bottom: 10px;
      border-radius: 5px;
    }*/

    .document-image {
   width: 100%; /* Ajuster la largeur de l'image à 100% du conteneur */
   height: auto; /* Ajuster la hauteur automatiquement */
   margin-bottom: 10px;
   border-radius: 5px;
  }

  .document-link {
   background-color: #3a57af;
   color: #fff;
   border: none;
   padding: 10px 20px;
   border-radius: 5px;
   cursor: pointer;
   margin-top: auto; /* Mettre le bouton en bas du conteneur de publication */
  }

  .document-link:hover {
   background-color: #29408b; /* Bleu plus foncé au survol */
  }

  .enlarged {
   transform: scale(1.2);
  }
  .btn-modifier {
  background-color: #4CAF50; /* Vert plus standard */
  color: white; /* Plus précis que #fff */
  border: none;
  padding: 10px 5px;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 2px; /* Espace entre les boutons */
  transition: background-color 0.3s ease; /* Ajout d'une transition pour l'effet hover */
}
.btn-modifier:hover { /* Effet hover pour le bouton */
  background-color: #3e8e41; /* Vert plus foncé au survol */
}
  .btn-supprimer{
    background-color: red;
    color: #fff;
    border: none;
    padding: 10px 5px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 2px; /* Espace entre les boutons */
  }

  .document-link:hover {
    background-color: #29408b; /* Bleu plus foncé */
  }

  .enlarged {
    transform: scale(1.2);
  }

  /* Style du formulaire de recherche */
  .search-form {
    background: linear-gradient(to bottom, #3a57af, #2d439a, #1c327b);
    padding: 90px;
    display: flex;
    flex-direction: column;
    margin-bottom: 75px;
  }
  .search-form input[type="text"] {
    width: 100%; /* Champ de texte sur toute la largeur */
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px; /* Espace entre le champ de texte et les sélecteurs */
    font-size: 16px;
  }

  .search-form button {
    background-color: #3a57af;
    color: #fff;
    border: none;
    padding: 15px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px; /* Espace entre le sélecteur et le bouton */
  }

  .search-form button:hover {
    background-color: blue;
  }

  /* Style des sélecteurs */
  .search-form select {
    width: 100%;
    max-width: 550px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px; /* Espace entre les sélecteurs */
    font-size: 16px;
  }

  /* Style pour les labels */
  .search-form label {
    font-weight: bold;
    margin-bottom: 12px;
    color: #fff;
    font-family: 'Arial Black', sans-serif; /* Choisir une police plus imposante */
    font-size: 1.9em;
    text-transform: uppercase; /* Mettre le label en majuscule pour plus d'impact */
  }
  .btn-primary {
    background-color: #3a57af;
    border: none;
  }
  .btn-primary btn-modifier{
        
  }
  /* Responsive Grid Styling */
  @media (max-width: 768px) { /* Adjust breakpoint as needed */
    .col-md-4, .col-sm-6 {
      width: 100%; /* Make each column occupy full width on smaller screens */
    }
  }
  </style>
</head>
<body>

<div class="search-form">
  <form method="GET" action="../metier/recherche_publications.php">
    <label> Rechercher une publication </label>
    <input type="text" name="search" id="search" placeholder="Mot-clés, titre, auteur, éditeur, sujet..." >
    <select id="type_document" name="type_document">
      <option value="">Tous les types de documents</option>
      <option value="arrete">Arrêté</option>
      <option value="decret">Décret</option>
      <option value="communique">Communiqué</option>
      <option value="rapport">Rapport</option>
      <option value="étude">Etude</option>
      <option value="article">Article</option>
      <option value="loi">Loi</option>
      <option value="directive">Directive</option>
      <option value="regulation">Règlement</option>
      <!-- Ajoutez d'autres options selon vos besoins -->
    </select>
    <select id="pays" name="pays">
    <option value="">Tous les pays</option>
            <option value="Cameroun">Cameroun</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Togo">Togo</option>
            <option value="Niger">Niger</option>
            <option value="Namibie">Namibie</option>
            <option value="Maroc">Maroc</option>
            <option value="États-Unis">États-Unis</option>
            <option value="Canada">Canada</option>
            <option value="Australie">Australie</option>
            <option value="Chine">Chine</option>
            <option value="Japon">Japon</option>
            <option value="Inde">Inde</option>
            <option value="Brésil">Brésil</option>
            <option value="Russie">Russie</option>
      <!-- Ajoutez d'autres pays selon vos besoins -->
    </select>

    <button type="submit">Rechercher</button>
  </form>
</div>
<div style="text-align: center; margin-top: -35px;float: right;">
      <a href="effectuer_publication.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ajouter une publication</a>
</div>
    <br>

<div class="container">
  <!-- <h1>Liste des publications</h1>-->
  <div class="row">
  <?php
  require_once '../access_donnees/basedonnee.php';

  // Connexion à la base de données
  $db = new basedonnee();

  // Récupérer les publications depuis la base de données
  $sql = "SELECT * FROM Publication ORDER BY dateP DESC";
  $result = $db->request($sql);
  $publications = $db->recover($result, false);

  if (!empty($publications)) {
    // Afficher chaque publication
    foreach ($publications as $key => $publication) {
      if ($key % 3 == 0 && $key != 0) {
        echo '</div><div class="row">';
      }
          
      
      echo '<div class="col-md-4 col-sm-6">';
      echo '<div class="publication">';
      echo '<h3 class="publication-title">' . $publication->titreP . '</h3>';
      // echo '<p class="publication-content">' . $publication->contenuP . '</p>';
      // echo '<p class="publication-author">Auteur: ' . $publication->auteurP . '</p>';
      if (!empty($publication->document)) {
        // Vérifier si le document est une image
        $isImage = getimagesize($publication->document);
        if ($isImage !== false) {
          // Afficher le nom du document
          // echo '<p class="document-name">' . basename($publication->document) . '</p>';
          // Afficher l'image avec la classe document-image
          echo '<img class="document-image" src="' . $publication->document . '" alt="Image">';
          // Ajouter le bouton consulter pour les images
          echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '"><i class="fas fa-eye"></i>Consulter</a>'; // Envoi de l'ID de la publication
          echo '<a href="../metier/modifier_publications.php?id=' . $publication->idP . '" class="btn  btn-modifier" ><i class="fas fa-edit"></i> Modifier</a>';
          echo '<a href="../metier/supprimer_publication.php?id=' . $publication->idP . '" class="btn btn-danger btn-supprimer" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette publication?\');"><i class="fas fa-trash-alt"></i>Supprimer</a>';
        } else {
          // Le document est un PDF, afficher l'image descriptive et le bouton consulter pour le PDF
          echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
          // Ajouter le bouton consulter pour les PDF
          echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '"><i class="fas fa-eye"></i> Consulter</a>'; // Envoi de l'ID de la publication
          echo '<a href="../metier/modifier_publications.php?id=' . $publication->idP . '" class="btn btn-success btn-modifier"><i class="fas fa-edit"></i> Modifier</a>';
          
          echo '<a href="../metier/supprimer_publication.php?id=' . $publication->idP . '" class="btn btn-danger btn-supprimer" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette publication?\');"><i class="fas fa-trash-alt"></i> Supprimer</a>';
        }
      }
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo "Aucune publication trouvée.";
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

  function downloadPDF(url) {
    window.open(url, '_blank');
  }
</script>

</body>
</html>
