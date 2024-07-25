<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search</title>
<link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<style>
   body {
  font-family: sans-serif; /* Choisissez une police par défaut */
  margin: 0; 
}

.layout_padding {
  padding-top: 90px;
  padding-bottom: 90px;
}

.padding_0 {
  padding-right: 0px !important;
  padding-left: 0px !important;
}

/* Header */
.navbar {
  padding: 1rem; /* Ajustez l'espacement interne */
}

.logo img {
  height: 50px; /* Ajustez la hauteur du logo */
}

.navbar-nav .nav-link {
  margin-right: 20px; /* Espacement entre les liens du menu */
  font-weight: bold;
}

.login_text a {
  color: #3a57af; /* Couleur du lien de connexion */
  text-decoration: none; 
}

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
    margin-bottom: 20px;
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
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    height: 300px; /* Adjust as needed */
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
  /* Footer */
  .footer_section {
      background-color: #333;
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }

    .subscribr_text {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .box_main_2 {
      display: inline-block;
      margin-bottom: 20px;
    }

    .email_bt_2 {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 0px;
    }

    .subscribe_bt_2 {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 0px;
      border-radius: 5px;
      cursor: pointer;
      height: 55px;
      width: 100%;
      display: block;
      margin-top: 10px;
    }

    /* Copyright */
    .copyright_section {
      background-color: #222;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    .copyright_text {
      margin: 0; /* Remove default margin */
    }

    .cookies_text {
      margin: 0; /* Remove default margin */
    }

    /* Hover effect for nav-link */
    .navbar-nav .nav-link.active:hover {
      color: #3a57af !important;
    }

    /* Footer */
    .footer_section {
      background-color: #3a57af; /* Nouvelle couleur de fond */
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }

    /* Copyright */
    .copyright_section {
      background-color: #fff; /* Nouvelle couleur de fond */
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

  /* Responsive Grid Styling */
  @media (max-width: 768px) { /* Adjust breakpoint as needed */
    .col-md-4, .col-sm-6 {
      width: 100%; /* Make each column occupy full width on smaller screens */
    }
  }
  .navbar-nav .nav-link.active:hover {
  color: #3a57af !important;
}

.subscribe_bt_2 {
        width: 100%; /* Ajuster la largeur du bouton */
        margin-right: 0;
      }
    

    @media (max-width: 576px) { 
      .navbar-nav {
        flex-direction: column; /* Aligner les liens du menu verticalement */
      }

      .navbar-nav .nav-link {
        margin-right: 0; /* Supprimer la marge */
        margin-bottom: 1rem; /* Ajouter une marge inférieure */
      }
    }

    .email_bt_2 {
      width: 100%;
      margin-right: 0;
    }

    .jobs_text{
      margin-left: auto;
      margin-right: 20px; */
      font-weight: bold;
    }
/* Your CSS styles */
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="logo" href="#"><img src="images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="acc.html">ACCUEIL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="search jobs.html">PUBLICATIONS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="recurments.html">A PROPOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="companies.html">CONTACT</a>
      </li>
    </ul>
  </div>
  <div class="login_text"><a href="login.html">Se connecter</a></div>
</nav>

<div class="search-form">
  <form method="GET" action="../metier/recherche_publications.php">
    <label>Rechercher une publication</label>
    <input type="text" name="search" id="search" placeholder="Mot-clés, titre, auteur, éditeur, sujet...">
    <select id="type_document" name="type_document">
      <option value="">Tous les types de documents</option>
      <!-- Other options -->
    </select>
    <select id="pays" name="pays">
      <option value="">Tous les pays</option>
      <!-- Other options -->
    </select>
    <button type="submit">Rechercher</button>
  </form>
</div>

<div class="container">
  <div class="row">
  <?php
  require_once '../access_donnees/basedonnee.php';
  $db = new basedonnee();
  $sql = "SELECT * FROM Publication ORDER BY dateP DESC";
  $result = $db->request($sql);
  $publications = $db->recover($result, false);
  
  if (!empty($publications)) {
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
          echo '<a class="btn btn-primary document-link" href="../contenupublication.php?id=' . $publication->idP . '">Consulter</a>'; // Envoi de l'ID de la publication
        } else {
          // Le document est un PDF, afficher l'image descriptive et le bouton consulter pour le PDF
          echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
          // Ajouter le bouton consulter pour les PDF
          echo '<a class="btn btn-primary document-link" href="../contenupublication.php?id=' . $publication->idP . '">Consulter</a>'; // Envoi de l'ID de la publication
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

  <!-- Subscribe section start-->
  <div class="footer_section layout_padding">
    <div class="container">
      <div class="box_main_2">
        <input type="email" class="email_bt_2" placeholder="Enter your email">
      </div>
      <div class="box_main_2">
        <button class="subscribe_bt_2">Subscribe</button>
      </div>
    </div>
  </div>
  <!-- Subscribe section end-->

  <!-- Copyright section start-->
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">© 2024 All Rights Reserved.</p>
    </div>
  </div>
  <!-- Copyright section end-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>