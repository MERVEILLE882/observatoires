<?php
require_once '../access_donnees/basedonnee.php';
$db = new basedonnee();

// Construire la requête de base pour sélectionner les publications validées
$sql = "SELECT * FROM Publication WHERE valide = true";

// Récupérer les paramètres de recherche
$search = isset($_GET['search']) ? $_GET['search'] : '';
$type_document = isset($_GET['type_document']) ? $_GET['type_document'] : '';
$pays = isset($_GET['pays']) ? $_GET['pays'] : '';
$continent = isset($_GET['continent']) ? $_GET['continent'] : '';
$organisation = isset($_GET['organisation']) ? $_GET['organisation'] : '';

// Ajouter les filtres à la requête SQL si les paramètres sont définis
if (!empty($search)) {
    // Ajouter la condition de recherche à la requête SQL
    $sql .= " AND (titreP LIKE '%$search%' OR auteurP LIKE '%$search%' OR contenuP LIKE '%$search%')";
}

if (!empty($type_document)) {
    $sql .= " AND type_document = '$type_document'";
}

if (!empty($pays)) {
    $sql .= " AND id_pays = (SELECT id_pays FROM Pays WHERE nom_pays = '$pays')";
}

if (!empty($continent)) {
    $sql .= " AND id_continent = '$continent'";
}

if (!empty($organisation)) {
    $sql .= " AND id_organisation = '$organisation'";
}

// Ajouter l'ordre de tri par date décroissante
$sql .= " ORDER BY dateP DESC";

// Exécuter la requête SQL
$result = $db->request($sql);
$publications = $db->recover($result, false);


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Résultat de recherche</title>
<link rel="stylesheet" type="text/css" href="../presentation/bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../presentation/html/css/style.css">
<link rel="stylesheet" href="../presentation/html/css/responsive.css">
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #ebebeb; /* Gris clair */
    color: #3a57af; /* Bleu foncé */
}

.container {
    padding-top: 30px; /* Espacement en haut */
    padding-bottom: 30px; /* Espacement en bas */
}

.navbar {
    padding: 1rem; /* Ajustez l'espacement interne */
}

.logo img {
      height: 110px;
      width: 130px;
    }

.navbar-nav .nav-link {
    margin-right: 20px; /* Espacement entre les liens du menu */
    font-weight: bold;
}

.login_text {
    color: #3a57af; /* Couleur du lien de connexion */
    text-decoration: none; 
    margin-left: auto;
    margin-right: 20px;
    font-weight: bold;
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
    .observatoire_text {
   font-size: 1.3rem; /* Taille du texte pour les écrans normaux */
   margin-left: -500px; /* Marge à gauche pour ajuster la position */
   margin-right: 100px; /* Marge à droite pour ajuster la position */
   font-weight: bold;
}

@media (max-width: 768px) {
  .observatoire_text {
    font-size: 1.1rem; /* Taille du texte réduite pour les écrans plus petits */
    margin-left: 0; /* Aucune marge à gauche */
    margin-right: 0; /* Aucune marge à droite */
    text-align: center; /* Centrer le texte */
  }
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" href="#"><img src="../presentation/html/images/logo.png"></a>
    <div class="observatoire_text">Observatoire en ligne du droit à l'éducation</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="../presentation/html/index.php">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../presentation/index.php">PUBLICATIONS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="recurments.html">A PROPOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../presentation/html/contact.php">CONTACT</a>
            </li>
            <li>
               <a class="nav-link active" href="../vendor/inde.php">CHATBOT</a>
             </li>
            <li class="nav-item">
              <a class="nav-link active" href="../presentation/forum.php">FORUM</a>
            </li>
      </ul>
      <div class="login_text"><a href="../presentation/formulaire_connection.php"><i class="fas fa-user-plus"></i>Login</a></div>
      <div class="login_text"><a href="../metier/deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous deconnecter?');"><i class="fas fa-sign-out-alt"></i>Sign out</a></div>
    </div>
</nav>

<div class="container">
    <h1 style="text-align:center;">Résultats de la recherche</h1>
    <div class="row">
        <?php
        if (!empty($publications)) {
            foreach ($publications as $key => $publication) {
                if ($key % 3 == 0 && $key != 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-md-4 col-sm-6">';
                echo '<div class="publication">';
                echo '<h3 class="publication-title">' . htmlspecialchars($publication->titreP) . '</h3>';
                
                if (!empty($publication->document)) {
                    $isImage = @getimagesize($publication->document);
                    if ($isImage !== false) {
                        echo '<img class="document-image" src="' . htmlspecialchars($publication->document) . '" alt="Image">';
                    } else {
                        echo '<img class="document-image" src="' . htmlspecialchars($publication->image_descriptive) . '" alt="Image descriptive">';
                    }
                    echo '<a class="btn btn-primary document-link" href="../presentation/contenupublicationr.php?id=' . htmlspecialchars($publication->idP) . '">Consulter <i class="fas fa-eye"></i></a>';
                }
                
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p class='col-md-12'>Aucune publication trouvée.</p>";
        }
        ?>
    </div>
</div>

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

<script>
$(document).ready(function() {
    // Function to load publications based on search filters
    function loadPublications() {
        $.ajax({
            url: '<?php echo $_SERVER["PHP_SELF"]; ?>',
            type: 'GET',
            dataType: 'html',
            data: $('#searchForm').serialize(), // Serialize form data
            success: function(response) {
                $('#publicationContainer').html($(response).find('#publicationContainer').html());
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Load publications on initial page load
    loadPublications();

    // Submit form to load publications on form submit
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        loadPublications(); // Load publications based on form data
    });
});
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="../presentation/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
















