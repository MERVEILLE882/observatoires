<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XC6nF2GxNTtTVrA9T/l7inJOLsoikspM1Kf6KbXNw2xn06Psg/6ILipJICe7U9IkZk5Ii8Xf3D0Nq5ofrL9vJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <title>OBSERVATOIRE DU DROIT A L'EDUCATION</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
    /* style.css */
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
      padding: 1rem;
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 80px; /* Ajustez la hauteur du logo */
      width: 100px;
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

    /* Sections Marketing, Industriel, Corporate */
    .marketing_section,
    .industrial_section,
    .corporate_section {
      background-color: #fff; /* Couleur de fond de la section */
    }

    .job_section,
    .job_section_2 {
      padding: 50px;
    }

    .jobs_text {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #333;
    }

    .dummy_text {
      font-size: 1.2rem;
      line-height: 1.8;
      color: #555;
      text-align: justify;
    }

   /* .image_1 {
      background
      background-size: cover;
      background-position: center;
      min-height: 400px; /* Ajustez la hauteur minimale de l'image */
    

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

    /* Responsive CSS */
    @media (max-width: 768px) { 
    /*  .image_1 {
       /* width: 150px;
        /*height: 150px; /* Réduire la hauteur de l'image */
    /* min-height: 10px;
      }*/

      .image_1{
     width: 100%;
     float: left;
}
        
     

      .job_section,
      .job_section_2 {
        padding: 2rem; /* Réduire l'espacement */
      }

      .subscribe_bt_2 {
        width: 100%; /* Ajuster la largeur du bouton */
        margin-right: 0;
      }
    }

    @media (max-width: 576px) { 
      .navbar-nav {
        flex-direction: column; /* Aligner les liens du menu verticalement */
      }

      .navbar-nav .nav-link {
        white-space: nowrap;
        /*margin-right: 0; /* Supprimer la marge */
        margin-bottom: 1rem; /* Ajouter une marge inférieure */
      }
    }

    .email_bt_2 {
      width: 100%;
      margin-right: 0;
    }

    .jobs_text{
      margin-left: auto;
      margin-right: 20px; 
      font-weight: bold;
    }






    body {
      font-family: sans-serif;
      margin: 0;
    }

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

   /* .marketing_section,
    .footer_section,
    .copyright_section {
      background-color: #fff;
      padding: 50px 0;
      text-align: center;
    }*/

    .jobs_text {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #333;
    }

    .dummy_text {
      font-size: 1.2rem;
      line-height: 1.8;
      color: #555;
      text-align: justify;
    }

    .image_1 img {
      width: 100%;
      height: auto;
    }

    /*.subscribe_bt_2 {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 0;
      border-radius: 5px;
      cursor: pointer;
      height: 55px;
      width: 100%;
      display: block;
      margin-top: 10px;
    }*/

    @media (max-width: 768px) { 
      .job_section,
      .job_section_2 {
        padding: 2rem;
      }

    /*  .subscribe_bt_2 {
        width: 100%;
      }*/
    }

    @media (max-width: 576px) { 
      .navbar-nav {
        flex-direction: column;
      }

      .navbar-nav .nav-link {
        white-space: nowrap;
        margin-bottom: 1rem;
      }
    }




    body {
  font-family: sans-serif;
  margin: 0;
}

/* Sections Marketing, Industriel, Corporate */
.marketing_section,
.industrial_section,
.corporate_section {
  background-color: #fff;
  padding: 50px 0;
  text-align: center;
}

.job_section,
.job_section_2 {
  padding: 50px;
}

.jobs_text {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #333;
}

.dummy_text {
  font-size: 1.2rem;
  line-height: 1.8;
  color: #555;
  text-align: justify;
}

.image_1 img {
  width: 100%;
  height: auto;
}

@media (max-width: 768px) {
  .job_section,
  .job_section_2 {
    padding: 2rem;
  }
}

@media (max-width: 576px) {
  .marketing_section,
  .industrial_section,
  .corporate_section {
    padding: 170px 0;
  }

  .jobs_text {
    font-size: 1.8rem;
  }

  .dummy_text {
    font-size: 1rem;
  }

  .image_1 img {
    height: auto;
  }
}

.logo-text {
      margin-left: 10px; /* Ajuster l'espace entre le logo et le texte */
      font-weight: bold;
      color: #3a57af; /* Couleur du texte */
    }

/* Customization for Observatory text */
/* The above code is defining styles for a CSS class called "observatoire_text". It is setting the font
size to 1.2rem, adding a negative margin to the left to create space, setting the text color to
#3a57af, and making the text bold. */
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
   <!-- header section start-->
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
          <a class="nav-link active" href="../effectuer_publication.php">REDIGER UN TEXTE</a>
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
  <!-- header section end-->

  <!-- banner section start-->
  <!--<div class="banner_section layout_padding">
    <div class="container">
      <h1 class="best_taital">Best Naukri Search here</h1>
      <div class="box_main">
        <input type="" class="email_bt" placeholder="Search Job" name="">
        <button class="subscribe_bt"><a href="#">Subscribe</a></button>
      </div>
      <p class="there_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alterationThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
      <div class="bt_main">
        <div class="discover_bt"><a href="#">Discover More</a></div>
      </div>
    </div>
  </div>-->
  <!-- banner section end-->
<br><br>
  <!-- marketing section start-->
  <div class="marketing_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="job_section">
            <h1 class="jobs_text">PUBLICATIONS</h1>
            <p class="dummy_text">Découvrez notre vaste collection d'articles, de rapports de recherche et d'études. Vous avez accès à plusieurs documents et images concernant le droit à l'éducation.</p>
          </div>
        </div>
        <br><br>
        <div class="col-md-6">
        <br><br>
          <div class="image_1 padding_0"><img src="images/img-1.png" alt="Publication Image"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- marketing section end-->

  <!-- Industrial section start-->
  <div class="marketing_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="image_1"><img src="images/img-2.png" alt="Industrial Image"></div>
        </div>
        <div class="col-md-6">
          <div class="job_section_2">
            <h1 class="jobs_text">A PROPOS</h1>
            <p class="dummy_text">Bienvenue sur notre application! Nous sommes dédiés à fournir des solutions innovantes et efficaces pour répondre à vos besoins.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Industrial section end-->

  <!-- Corporate section start-->
  <div class="marketing_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="job_section">
            <h1 class="jobs_text">CONTACT</h1>
            <p class="dummy_text">Nous sommes à votre écoute! Si vous avez des questions, des suggestions ou besoin d'assistance, n'hésitez pas à nous contacter. Remplissez notre formulaire de contact, envoyez-nous un e-mail ou appelez-nous directement.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image_1 padding_0"><img src="images/img-3.png" alt="Contact Image"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Corporate section end-->

    <!-- Industrial section start-->
    <div class="marketing_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="image_1"><img src="images/img-5.png" alt="Industrial Image"></div>
        </div>
        <div class="col-md-6">
          <div class="job_section_2">
            <h1 class="jobs_text">CHATBOT</h1>
            <p class="dummy_text">Besoin d'aide immédiate? Notre chatbot est à votre disposition 24h/24 et 7j/7 pour répondre à vos questions et vous assister. Interagissez avec notre assistant virtuel pour obtenir des informations rapides, des solutions à vos problèmes et des conseils personnalisés. Essayez-le maintenant!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Industrial section end-->
  
   <!-- Corporate section start-->
   <div class="marketing_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="job_section">
            <h1 class="jobs_text">FORUM</h1>
            <p class="dummy_text">Rejoignez notre communauté! Participez à des discussions, posez des questions, partagez vos expériences et trouvez des solutions grâce à notre forum. Connectez-vous avec d'autres utilisateurs, échangez des idées et obtenez des réponses de la part de nos experts et de notre communauté active.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image_1 padding_0"><img src="images/img-6.png" alt="Contact Image"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Corporate section end-->

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
