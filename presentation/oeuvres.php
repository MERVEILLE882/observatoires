<?php
session_start();

require_once '../access_donnees/basedonnee.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['idU'])) {
    echo "connectez vous vous n'etes pas connecte";
    header("Location: formulaire_connection.php"); // Redirection vers la page d'accueil si l'utilisateur n'est pas connecté
    exit;
}

$basedonnee = new basedonnee();
$idUtilisateur = $_SESSION['idU'];

// Récupérer les publications de l'utilisateur
$sql = "SELECT * FROM Publication WHERE idU_Utilisateur = ? ORDER BY dateP DESC";
$publications = $basedonnee->recover($basedonnee->request($sql, array($idUtilisateur)), false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="html/css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="html/css/responsive.css">
<title>OBSERVATOIRE DU DROIT A L'EDUCATION</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
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
    /* Hover effect for nav-link */
    .navbar-nav .nav-link.active:hover {
      color: #3a57af !important;
    }

    /* Publications */
    .container {
      /* background-color: #fff; */
      /* padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); */
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
      font-size: 1.5em;
      margin-bottom: 10px;
      color: #3a57af;
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
      margin-top: 13px;
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

    /* Responsive Grid Styling */
    @media (max-width: 768px) { /* Adjust breakpoint as needed */
      .col-md-4, .col-sm-6 {
        width: 100%; /* Make each column occupy full width on smaller screens */
      }

      .publication {
        height: auto; /* Remove fixed height on smaller screens */
      }
    }
    .observatoire_text {
      font-size: 1.3rem; /* Augmenter la taille du texte */
      margin-left: -500px; /* Ajouter un léger espace à gauche */
      margin-right: 100px; /* Ajouter un espace à droite */
      font-weight: bold;
    }

 /* Classes pour les statuts */
    .status-accepted {
        background-color: #d4edda; /* Vert clair */
        color: #155724; /* Vert foncé */
    }

    .status-rejected {
        background-color: #f8d7da; /* Rouge clair */
        color: #721c24; /* Rouge foncé */
    }

    .delete-link {
      background-color: #f44336; /* Rouge */
    }

    .delete-link:hover {
      background-color: #cc0000; /* Rouge plus foncé au survol */
    }
    .publication-status {
  color: white;
  background-color: green; /* Vert foncé */
  text-align: center;
}
@media (max-width: 768px) { /* Adjust breakpoint as needed */
  .col-md-4, .col-sm-6 {
    width: 100%; /* Make each column occupy full width on smaller screens */
  }

  .publication {
    height: auto; /* Remove fixed height on smaller screens */
  }
  
  .observatoire_text {
    text-align: center; /* Centrer le texte */
    margin-left: auto; /* Ajuster la marge gauche */
    margin-right: auto; /* Ajuster la marge droite */
    width: 100%; /* Ajuster la largeur du texte à 100% du conteneur */
  }
}
</style>
</head>
<body>
<!-- header section start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="logo" href="#"><img src="html/images/logo.png"></a>
    <div class="observatoire_text">Observatoire en ligne du droit à l'éducation</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="html/index.php">ACCUEIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php">PUBLICATIONS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="effectuer_publication.php">REDIGER UN TEXTE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="html/contact.php">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../vendor/inde.php">CHATBOT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="forum.php">FORUM</a>
        </li>
      </ul>
      <div class="login_text"><a href="formulaire_connection.php"><i class="fas fa-user-plus"></i>Login</a></div>
   <div class="login_text"><a href="../metier/deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous deconnecter?');"><i class="fas fa-sign-out-alt"></i>Sign out</a></div>
    </div>
</nav>
<!-- header section end-->

<br><br><br><br><br><br><br>

<div class="container">
  <div class="row">
  <?php
if (!empty($publications)) {
    foreach ($publications as $key => $publication) {
        if ($key % 3 == 0 && $key != 0) {
            echo '</div><div class="row">';
        }
        echo '<div class="col-md-4 col-sm-6">';
        echo '<div class="publication">';
        echo '<h3 class="publication-title">' . $publication->titreP . '</h3>';

        // Vérification et affichage du statut de la publication
        $status = 'En attente';  // Par défaut, le statut est "En attente"
        if ($publication->valide === 1) {
            $status = 'Acceptée';
        } elseif ($publication->valide === 0) {
            $status = 'Refusée';
        }
        echo '<p class="publication-status">Status: ' . $status . '</p>';

        if (!empty($publication->document)) {
            // Vérifier si le document est une image
            $isImage = getimagesize($publication->document);
            if ($isImage !== false) {
                // Afficher l'image avec la classe document-image
                echo '<img class="document-image" src="' . $publication->document . '" alt="Image">';
                // Ajouter le bouton consulter pour les images
                echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '"><i class="fas fa-eye"></i> Consulter</a>'; // Envoi de l'ID de la publication
                echo '<a href="../metier/supprimer_publication_utilisateur.php?id=' . $publication->idP . '" class="btn btn-danger btn-refuser" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette publication?\');"><i class="fas fa-trash-alt"></i> Supprimer</a>';
                
            } else {
                // Le document est un PDF, afficher l'image descriptive et le bouton consulter pour le PDF
                echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
                // Ajouter le bouton consulter pour les PDF
                echo '<a class="btn btn-primary document-link" href="contenupublication.php?id=' . $publication->idP . '"><i class="fas fa-eye"></i> Consulter</a>'; // Envoi de l'ID de la publication
                // Dans votre boucle foreach pour afficher les publications
                echo '<a href="../metier/supprimer_publication_utilisateur.php?id=' . $publication->idP . '" class="btn btn-danger btn-refuser" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette publication?\');"><i class="fas fa-trash-alt"></i> Supprimer</a>';

            }
        }
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<br><br>';
    echo "Aucune publication trouvée.";
}
?>

  </div>
</div>

<!-- Subscribe section start-->
<!--<div class="footer_section layout_padding">
  <div class="container">
    <form action="../metier/subscribe.php" method="post">
      <div class="box_main_2">
        <input type="email" class="email_bt_2 form-control" name="email" placeholder="Enter your email" required>
      </div>
      <div class="box_main_2">
        <button class="subscribe_bt_2">Subscribe</button>
      </div>
    </form>
  </div>
</div>-->
<!-- Subscribe section end-->

<!-- Copyright section start-->
<!--<div class="copyright_section">
  <div class="container">
    <p class="copyright_text">© 2024 All Rights Reserved.</p>
  </div>
</div>-->
<!-- Copyright section end-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>