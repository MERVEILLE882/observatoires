<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Mobile metas -->
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- Site metas -->
  <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <!-- Responsive -->
  <link rel="stylesheet" href="css/responsive.css">
  <title>OBSERVATOIRE DU DROIT A L'EDUCATION</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
    body {
      font-family: sans-serif;
      margin: 0; 
      background-color: #ebebeb;
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
      padding: 1rem;
    }

    .logo img {
      height: 110px;
      width: 130px;
    }

    .navbar-nav .nav-link {
      margin-right: 20px;
      font-weight: bold;
    }

    .login_text {
      color: #3a57af;
      text-decoration: none; 
      margin-left: auto;
      margin-right: 20px;
      font-weight: bold;
    }

    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    /* CSS pour les icônes de réseaux sociaux */
    .social-icons {
      margin-top: 20px;
    }

    .social-icons a {
      display: inline-block;
      margin-right: 10px;
      font-size: 24px;
    }

    .social-icons .facebook {
      color: #3b5998; /* Bleu Facebook */
    }

    .social-icons .google {
      color: #4285F4; /* Bleu Google */
    }

    .social-icons .youtube {
      color: #FF0000; /* Rouge YouTube */
    }

    /* CSS pour la section de contact */
    .contact-section {
      padding: 50px 0;
      background-color: #f9f9f9;
    }

    .contact-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }

    .contact-section h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #333;
    }

    .contact-section .form-control {
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
    }

    .contact-section .btn-primary {
      background-color:#3a57af;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .contact-info {
      margin-top: 50px;
    }

    .contact-info h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }

    .contact-info p {
      font-size: 1.2rem;
      color: #555;
      line-height: 1.6;
    }

    .contact-info .map-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      padding-top: 56.25%;
    }

    .contact-info .map-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }

    .working-hours {
      margin-top: 30px;
    }

    .working-hours h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }

    .working-hours p {
      font-size: 1.2rem;
      color: #555;
      line-height: 1.6;
    }

    /* Footer */
    .footer_section {
      background-color: #3a57af;
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
      background-color: #fff;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    /* Responsive CSS */
    @media (max-width: 768px) { 
      .image_1 {
        min-height: 150px;
      }

      .job_section,
      .job_section_2 {
        padding: 2rem;
      }

      .subscribe_bt_2 {
        width: 100%;
        margin-right: 0;
      }
    }

    @media (max-width: 576px) { 
      .navbar-nav {
        flex-direction: column;
      }

      .navbar-nav .nav-link {
        margin-right: 0;
        margin-bottom: 1rem;
      }
    }

    .email_bt_2 {
      width: 100%;
      margin-right: 0;
    }

    .jobs_text {
      margin-left: auto;
      margin-right: 20px;
      font-weight: bold;
    }

    /* Classes pour les icônes de déconnexion */
    .logout-icon {
      color: #ff0000; /* Rouge pour l'icône de déconnexion */
    }

    .contact-section {
  padding: 50px;
  background-color: #f9f9f9;
  border: 1px solid #ddd; /* Ajoute une bordure grise */
  border-radius: 10px; /* Arrondi les coins de la bordure */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ajoute une légère ombre */
  border=1;
}
.observatoire_text {
      font-size: 1.3rem; /* Augmenter la taille du texte */
      margin-left: -500px; /* Ajouter un léger espace à gauche */
      margin-right: 100px; /* Ajouter un espace à droite */
      font-weight: bold;
    }
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

  /* Styles for the filter links */
  .filter-links {
   display: flex; /* Aligner les liens horizontalement */
   justify-content: center; /* Centrer les liens horizontalement */
   align-items: center; /* Aligner les liens verticalement */
   margin-top: -35px; /* Ajouter un espacement au-dessus des liens */
   margin-left: -190px;
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

<div id="successMessage" class="alert-success" style="display: none;">
    Votre message a été envoyé avec succès !
  </div>
  <!-- Header section start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="logo" href="#"><img src="images/logo.png"></a>
    <div class="observatoire_text">Observatoire en ligne du droit à l'éducation</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">ACCUEIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../index.php">PUBLICATIONS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="recurments.html">A PROPOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../vendor/inde.php">CHATBOT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../forum.php">FORUM</a>
        </li>
      </ul>
      <div class="login_text"><a href="../formulaire_connection.php"><i class="fas fa-user-plus"></i>Login</a></div>
   <div class="login_text"><a href="../../metier/deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous deconnecter?');"><i class="fas fa-sign-out-alt"></i>Sign out</a></div>
    </div>
  </nav>
  <!-- Header section end -->

  <!-- Contact section start -->
  <div class="contact-section layout_padding">
  <div class="container">
    <div class="contact-info">
      <br><br><br><br>
      <h3>Informations de contact</h3>
      <p>Pour toute question ou assistance, veuillez nous contacter via les moyens suivants :</p>
      <p><strong>Téléphone :</strong> +237 699 508 286, +237 651 708 379</p>
      <p><strong>Adresse :</strong> Bandjoun, Cameroun</p>
      <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127688.44274006147!2d10.315128113979316!3d5.372697621337898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10a5ac19f9e7e2c1%3A0x7065e7bdfabf7fa6!2sBandjoun%2C%20Cameroon!5e0!3m2!1sen!2sfr!4v1625643894560!5m2!1sen!2sfr" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <div class="working-hours">
        <h3>Horaires d'ouverture</h3>
        <p><strong>Disponible</strong> 24h/24, 7J/7</p>
      </div>
      <div class="social-icons">
        <a href="#" class="facebook"><i class="fab fa-facebook-square"></i></a>
        <a href="#" class="google"><i class="fab fa-google"></i></a>
        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
      </div>
      <h2>Contactez-Nous</h2>
    <form action="../../metier/process_contact.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Votre nom" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Votre email" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="message" rows="5" placeholder="Votre message" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </div>
  </div>
</div>

  <!-- Contact section end-->

  <!-- Subscribe section start-->
  <div class="footer_section layout_padding">
    <div class="container">
      <form action="../../metier/subscribe.php" method="post">
        <div class="box_main_2">
          <input type="email" class="email_bt_2 form-control" name="email" placeholder="Enter your email" required>
        </div>
        <div class="box_main_2">
          <button type="submit" class="subscribe_bt_2 btn btn-primary">Subscribe</button>
        </div>
      </form>
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

  <!-- Script pour faire disparaître le message de succès après 10 secondes -->
 <!-- Script pour faire disparaître le message de succès après 10 secondes -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (window.location.search.includes('success=1')) {
        var successMessage = document.getElementById("successMessage");
        if (successMessage) {
            successMessage.style.display = "block";
            setTimeout(function() {
                successMessage.style.display = "none";
                // Effacer le paramètre 'success' de l'URL
                var url = new URL(window.location.href);
                url.searchParams.delete('success');
                window.history.replaceState({}, document.title, url.toString());
            }, 10000); // 10 secondes
        }
    }
});
</script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
