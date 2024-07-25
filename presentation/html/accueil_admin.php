<?php
session_start();
include_once "../../access_donnees/basedonnee.php";
include_once "../../access_donnees/UtilisateurManager.php";
$UtilisateurManager = new UtilisateurManager();

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['idU'])) {
    $idUtilisateur = $_SESSION['idU'];
    $resultat = $UtilisateurManager->GetUserById($idUtilisateur);

    if (!$resultat) {
        echo "Aucun utilisateur trouvé avec l'ID fourni.";
        exit;
    }
} else {
    echo "Vous ne pouvez pas acceder a la page car vous n'etes pas connecte.";
    header("Location: ../formulaire_connection.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../FontAwesome Documentation/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XC6nF2GxNTtTVrA9T/l7inJOLsoikspM1Kf6KbXNw2xn06Psg/6ILipJICe7U9IkZk5Ii8Xf3D0Nq5ofrL9vJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/style_admin.css">
  <title>OBSERVATOIRE DU DROIT A L'EDUCATION</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="logo" href="#">
      <img src="images/logo.png" alt="Logo">
    </a>

    <button id="sidebarCollapse" class="btn btn-link" type="button">
      <i class="fas fa-align-justify"></i>
    </button>

     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="login_text"><a href="../../metier/deconnexion.php" onclick="return confirm('Êtes-vous sûr de vouloir vous deconnecter?');"><i class="fas fa-sign-out-alt"></i> Se Deconnecter</a></div>
      </div>
    </div>
    <br><br>
  </nav>
<div class="sidebar">
  <div class="capture"><i class="far fa-user-circle"></i></div>
    <div class="user-info">
      <p>Bienvenue:<?=$resultat->nomU;?></p>
    </div>

    <div class="sidebar-search">
  <input type="text" placeholder="Search..." class="form-control" id="sidebarSearch">
  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
</div>


<nav>
  <ul>
    <li class="sidebar-item"><a class="nav-link active" href="accueil_admin.php"><i class="fas fa-home"></i> Accueil</a></li>
    <!--<li class="sidebar-item">
      <a class="nav-link dropdown-toggle" href="#"><i class="fas fa-list-alt" id="gestion"></i> Gestion</a>
      <ul>
        <li class="sidebar-item">
          <a class="nav-link dropdown-toggle" href="#"><i class="fas fa-window-restore"></i> Publications</a>
          <ul>
            <li class="sidebar-item"><a href="../effectuer_publication.php">Effectuer publication</a></li>
            <li class="sidebar-item"><a href="../liste_publications__a.php">Liste des publications</a></li>
            <li class="sidebar-item"><a href="../liste_publication_admin.php">Gestion des soumissions</a></li>
          </ul>
        </li>-->
       <!-- <li class="sidebar-item">
          <a class="nav-link dropdown-toggle" href="#"><i class="far fa-user-circle"></i> Utilisateurs</a>
          <ul>
            <li class="sidebar-item"><a href="../formulaire_inscription_a.php">Ajouter utilisateur</a></li>
            <li class="sidebar-item"><a href="liste_utilisateurs.php">Liste des utilisateurs</a></li>
          </ul>
        </li>
      </ul>-->

      <li class="sidebar-item">
          <a class="nav-link dropdown-toggle" href="#"><i class="fas fa-window-restore"></i> Publications</a>
          <ul>
            <li class="sidebar-item"><a href="../effectuer_publication.php">Effectuer publication</a></li>
            <li class="sidebar-item"><a href="../liste_publications__a.php">Liste des publications</a></li>
            <li class="sidebar-item"><a href="../liste_publication_admin.php">Gestion des soumissions</a></li>
            <li class="sidebar-item"><a href="../liste_publications_supprimees.php">liste des publications supprimees</a></li>
          </ul>
        </li>
    </li>
    <li class="sidebar-item">
          <a class="nav-link dropdown-toggle" href="#"><i class="far fa-user-circle"></i> Utilisateurs</a>
          <ul>
            <li class="sidebar-item"><a href="../formulaire_inscription_a.php">Ajouter utilisateur</a></li>
            <li class="sidebar-item"><a href="liste_utilisateurs.php">Liste des utilisateurs</a></li>
          </ul>
        </li>

    <li class="sidebar-item"><a href="../../vendor/inde_admin.php"><i class="fas fa-window-maximize"></i> Chatbot</a></li>
    <li class="sidebar-item"><a href="../forum_admin.php"><i class="fas fa-users"></i> Forums</a></li>
    <li class="sidebar-item"><a href="../news_letters.php"><i class="fas fa-paper-plane"></i> News letter</a></li>
    
  </ul>
</nav>


  </div>

  <div class="main-content">
    <div class="card">
        <h2>Bienvenue sur la page Admin</h2>
        <p>Félicitations ! Vous avez maintenant accès à la page Admin de notre système. En tant qu'administrateur, vous aurez les privilèges et les responsabilités nécessaires pour gérer les opérations cruciales de notre plateforme..</p>
    </div>

    <!-- Blocs d'images -->
    <div class="image-block">
        <div class="image-card">
            <img src="images/observe1.jpg" alt="Description de l'image 1">
        </div>
        <div class="image-card">
            <img src="images/observe2.jpg" alt="Description de l'image 2">
        </div>
        <div class="image-card">
            <img src="images/observe3.jpg" alt="Description de l'image 3">
        </div>


       
        <div class="card">
        <h2>Gestion des Publications</h2>
        <div class="image-card">
            <img src="images/observe.jpg" alt="Description de l'image 2">
        </div></br>
        <p>
        Une politique éditoriale claire est essentielle pour définir les types de contenus acceptés et mettre en place un processus rigoureux de soumission, d'évaluation et de publication.</p>
    </div>    

    <div class="card">
    <h2>Gestion des Utilisateurs</h2>
    <div class="image-card">
            <img src="images/observe1.jpg" alt="Description de l'image 2">
        </div><br>
        
        <p>Un système d'authentification sécurisé gère les connexions et les rôles (administrateurs, chercheurs, grand public). Les utilisateurs contrôlent leurs profils et paramètres de confidentialité avec des outils de modération. Le forum favorise le dialogue et l'amélioration continue de la plateforme.<p>
    </div>


    <div class="card">
        <h2>Forums</h2>
        <div class="image-card">
            <img src="images/foruml.jpg" alt="Description de l'image 2">
        </div></br>
        <p> Ce forum constitue ainsi un espace d'échanges privilégié, favorisant une amélioration continue de la plateforme et une expérience utilisateur optimale, au plus près des usages et des attentes de la communauté</p>
    </div>
    <div class="card">
        <h2>Chatbot</h2>
        <div class="image-card">
            <img src="images/forum3.avif" alt="Description de l'image 2">
        </div></br>

        <p>L'intégration d'un chatbot au sein de l'observatoire du droit à l'éducation vise à faciliter l'accès à l'information et à offrir une assistance personnalisée aux utilisateurs.</p>
    </div>

</div>


            
    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/script.js"></script> -->
<!-- <script src="js/recherche_sidebar.js"></script>  -->
<!-- <script src="js/deconnexion.js"></script>  -->
  <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  
   <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('.sidebar').toggleClass('hidden-left');
        });
    });
</script>
<!-- <script>
   $(document).ready(function(){
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });

      $('#sidebarToggle').click(function() {
        $('#sidebar').toggleClass('hidden-left');
      });
    });

</script>-->
<script> 
    document.getElementById('sidebarCollapse').addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        var mainContent = document.getElementById('mainContent');
        sidebar.classList.toggle('hidden-right');
        mainContent.classList.toggle('full-width-content');
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const searchInput = document.getElementById('sidebarSearch');
    const items = document.querySelectorAll('.sidebar-item');

    searchInput.addEventListener('keyup', function() {
      const filter = searchInput.value.toLowerCase();

      items.forEach(function(item) {
        const text = item.textContent.toLowerCase();
        if (text.includes(filter)) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>

</body>
</html>
