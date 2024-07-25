<?php
include_once "../metier/verifier_session.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site metas -->
    <title>Chatbot</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../presentation/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../presentation/html/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../presentation/html/css/responsive.css">
    <style>
        body {
            background-image: url('../images/chat.jpg');
        }

        .chat-container {
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 70vh;
        }

        .chat-container::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            z-index: 1;
        }

        .chat-container > * {
            position: relative;
            z-index: 2;
        }

        h1 {
            text-align: center;
            color: white;
            font-weight: bold;
        }

        .input-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            box-sizing: border-box;
        }

        textarea, input[type="text"], input[type="button"] {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            width: 100%;
        }

        .button {
            background-color: #3a57af;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
        }

        .button:hover {
            background-color: #2c3e91;
        }

        .button i {
            margin-right: 5px;
        }

        #response {
            margin-top: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
            min-height: 100px;
            max-width: 800px;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333;
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

        .footer_section {
            background-color: #333;
            color: #fff;
            padding: 50px 0;
            text-align: center;
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

        .copyright_section {
            background-color: #222;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

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
                    <a class="nav-link active" href="../presentation/effectuer_publication.php">REDIGER UN TEXTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../presentation/html/contact.php">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="inde.php">CHATBOT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../presentation/forum.php">FORUM</a>
                </li>
            </ul>
            <div class="login_text"><a href="../presentation/formulaire_connection.php"><i class="fas fa-user-plus"></i>Login</a></div>
   <div class="login_text"><a href="../metier/deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous deconnecter?');"><i class="fas fa-sign-out-alt"></i>Sign out</a></div>
        </div>
    </nav>
    <!-- header section end-->
    <br><br><br><br><br>
    <div class="chat-container">
        <br>
        <h1>Poser vos questions</h1>
        <br><br>
        <div class="input-container">
            <textarea id="text" rows="3" placeholder="Ecrivez votre message ici..."></textarea>
            <button class="button" onclick="generateResponse();"><i class="fas fa-paper-plane"></i> Envoyer</button>
        </div>
        <br><br>
        <div id="response"></div>
    </div>

    <!-- Subscribe section start-->
    <!-- <div class="footer_section layout_padding">
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
    </div> -->
    <!-- Subscribe section end-->

    <!-- Copyright section start-->
    <!-- <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">© 2024 All Rights Reserved.</p>
        </div>
    </div> -->
    <!-- Copyright section end-->

    <script src="../vendor/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="../presentation/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
