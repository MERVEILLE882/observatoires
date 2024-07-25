<?php
include_once "../metier/verifier_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="html/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="html/css/responsive.css">
    <title>OBSERVATOIRE DU DROIT A L'EDUCATION</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="forum.css">
    <style>
     .observatoire_text {
        font-size: 1.3rem; /* Augmenter la taille du texte */
        margin-left: -500px; /* Ajouter un léger espace à gauche */
        margin-right: 100px; /* Ajouter un espace à droite */
        font-weight: bold;
        
        
}

.login_text {
   color: #3a57af; /* Couleur du lien de connexion */
   text-decoration: none; 
   margin-left: auto;
   margin-right: 20px;
   font-weight: bold;
  }

.logo img {
      height: 110px;
      width: 130px;
    }
        

      .delete-button {
          cursor: pointer;
          color: #dc3545; /* Couleur rouge pour le bouton Supprimer */
          padding: 20px;
      }

      /* Styles pour les écrans plus petits */
      @media (max-width: 768px) { 
          .col-md-4, .col-sm-6 {
              width: 100%; 
          }

          .publication {
              height: auto; 
          }

          .observatoire_text {
              text-align: center;
              margin-left: auto;
              margin-right: auto;
              width: 100%;
          }
          .t{
              padding: 59px;
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
                    <a class="nav-link active" href="oeuvres.php">MES OEUVRES</a>
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


    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 class="t" style="color:white;">Forum de discussion</h1>
    <div class="container">
        <form action="../metier/post_messages.php" method="post">
            <textarea name="texte_message" placeholder="Votre message..." required></textarea>
            <button class="button" type="submit" style="background-color: #3a57af; color: white;">Envoyer</button>
        </form>
        <div id="messages">
            <?php include 'display_messages.php'; ?>
        </div>
    </div>
    <script>
        function toggleReplyForm(button) {
            const form = button.nextElementSibling;
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function toggleReplies(button) {
            const replies = button.nextElementSibling;
            if (replies.style.display === 'none' || replies.style.display === '') {
                replies.style.display = 'block';
                button.textContent = 'Masquer les réponses';
            } else {
                replies.style.display = 'none';
                button.textContent = 'Voir les réponses';
            }
        }

        function confirmDelete(messageId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce message ?")) {
                window.location.href = "../metier/delete_message.php?id=" + messageId;
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>