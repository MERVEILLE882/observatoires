<?php
require_once '../access_donnees/basedonnee.php';

// Fonction pour restaurer une publication depuis le fichier XML vers la base de données
function restaurerPublication($idP) {
    $xmlFile = '../access_donnees/supprimees.xml';
    
    // Charger le fichier XML
    $xml = simplexml_load_file($xmlFile);
    
    // Trouver la publication à restaurer
    foreach ($xml->publication as $publication) {
        if ($publication->idP == $idP) {
            // Ajouter la publication restaurée à la base de données
            $db = new basedonnee();
            $sql = "INSERT INTO Publication (idP, titreP, document, contenuP, auteurP, dateP, idU_Utilisateur, type_document, image_descriptive, valide, id_pays, id_organisation, id_continent) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = [
                $publication->idP,
                $publication->titreP,
                $publication->document,
                $publication->contenuP,
                $publication->auteurP,
                $publication->dateP,
                $publication->idU_Utilisateur,
                $publication->type_document,
                $publication->image_descriptive,
                $publication->valide,
                $publication->id_pays,
                $publication->id_organisation,
                $publication->id_continent
            ];
            $db->request($sql, $params);
            
            // Supprimer la publication restaurée du fichier XML
            unset($publication[0]);
            file_put_contents($xmlFile, $xml->asXML());
            
            // Redirection vers la liste des publications après la restauration
            header("Location: liste_publications_supprimees.php");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des publications supprimées</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

<div class="container">
    <h1>Liste des publications supprimées</h1>
    <div class="row">
        <?php
        // Connexion à la base de données
        $db = new basedonnee();

        // Charger les publications supprimées depuis le fichier XML
        $xmlFile = '../access_donnees/supprimees.xml';
        if (file_exists($xmlFile)) {
            $xml = simplexml_load_file($xmlFile);
            foreach ($xml->publication as $publication) {
                echo '<div class="col-md-4 col-sm-6">';
                echo '<div class="publication">';
                echo '<h3 class="publication-title">' . $publication->titreP . '</h3>';
                echo '<p class="publication-content">' . $publication->contenuP . '</p>';
                echo '<p class="publication-author">Auteur: ' . $publication->auteurP . '</p>';
                echo '<p class="document-name">Document: ' . basename($publication->document) . '</p>';
                echo '<img class="document-image" src="' . $publication->image_descriptive . '" alt="Image descriptive">';
                // Bouton Restaurer
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="idP" value="' . $publication->idP . '">';
                echo '<button type="submit" name="restaurer" class="btn btn-success"><i class="fas fa-trash-restore"></i> Restaurer</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucune publication supprimée.</p>';
        }
        ?>

    </div>
</div>

</body>
</html>

<?php
// Processus de restauration lorsqu'un formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['restaurer'])) {
    $idP = $_POST['idP'];
    restaurerPublication($idP);
}
?>
