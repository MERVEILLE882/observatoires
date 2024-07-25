<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
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
    margin-bottom: 99px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    /* Set fixed height for all publications */
    height: 400px;
  }


  .publication-title {
    font-size: 1.5em;
    margin-bottom: 10px;
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

  /* Fixed height and width for all images */
  .document-image {
   /* max-width:100%;*/
    width: 300px;
   /* width: 400px;*/
    height: auto;
    margin-bottom: 10px;
    height: 350px; /* Adjust as needed */
    object-fit: cover; /* Ensure images fit the container */
  }

  .document-link {
    background-color: #3a57af;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px; /* Espace entre les boutons */
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
          echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '">Consulter<i class="fas fa-eye"></i></a>'; // Envoi de l'ID de la publication
        } else {
          // Le document est un PDF, afficher l'image descriptive et le bouton consulter pour le PDF
          echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
          // Ajouter le bouton consulter pour les PDF
          echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '">Consulter<i class="fas fa-eye"></i></a>'; // Envoi de l'ID de la publication
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