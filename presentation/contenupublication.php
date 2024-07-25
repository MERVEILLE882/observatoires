<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Détails de la Publication</title>
  
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
    }

    .left-side {
      width: 30%;
      margin-right: 20px;
    }

    .right-side {
      width: 70%;
    }

    h1 {
      font-size: 2em;
      color: #3a57af;
      margin-bottom: 15px;
    }

    .image-container {
      margin-top: 20px;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .details {
      margin-top: 20px;
    }

    .details p {
      line-height: 1.6;
    }

    a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 10px 20px;
      background-color: #3a57af;
      display: block;
      margin-top: 10px;
      border-radius: 5px;
      text-align: center;
    }

    a:hover {
      text-decoration: underline;
    }
    p{
        text-align: justify;
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
  </style>
</head>
<body>
  <?php
  require_once '../access_donnees/basedonnee.php';

  // Connexion à la base de données
  $db = new basedonnee();

  // Récupérer l'ID de la publication à partir de l'URL
  $publicationId = isset($_GET['id']) ? $_GET['id'] : '';

  // Vérifier si l'ID est fourni
  if (empty($publicationId)) {
    // Rediriger si l'ID est manquant
    header('Location: index.php');
    exit;
  }

  // Récupérer les détails de la publication
  $sql = "SELECT * FROM Publication WHERE idP = :id";
  $result = $db->request($sql, ['id' => $publicationId]);
  $publication = $db->recover($result, false)[0]; // Récupère le premier résultat (car il n'y en a qu'un)

  // Afficher les détails de la publication dans un format étendu
  ?>
  <div class="container">
    <div class="left-side">
    <h3 class="publication-title"> <?php echo $publication->titreP ?></h3>
      <div class="image-container">
        <img src="<?php echo ($publication->image_descriptive != "") ? $publication->image_descriptive : $publication->document; ?>" alt="<?php echo $publication->titreP; ?>">
      </div>
    </div>

    <div class="right-side">
      <div class="details">
        <p><?php echo $publication->contenuP; ?></p>
        <?php
        $isImage = getimagesize($publication->document);
        if ($isImage !== false) {
            echo '<a href="' . $publication->document . '" download>Télécharger</a>';
        }
        else {
        echo '<a class="btn btn-primary document-link" href="#" onclick="downloadPDF(\'' . $publication->document . '\')"><i class="fas fa-download"></i>Télécharger</a>';
        }
        ?>
      </div>
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
