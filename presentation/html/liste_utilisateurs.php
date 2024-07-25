<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../formulaire_connection.php");
    exit();
}

// Connexion à la base de données
require_once '../../access_donnees/basedonnee.php'; 
$basedonnee = new basedonnee();

// Récupération des utilisateurs
$sql = "SELECT U.idU, U.nomU, U.dateNaissance, C.nom AS categorie, U.email 
        FROM Utilisateur U 
        INNER JOIN Categorie C ON U.id_Categorie = C.id";
$req = $basedonnee->request($sql);
$utilisateurs = $basedonnee->recover($req, false);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Styles personnalisés */
                body {
            background: linear-gradient(to right, #7F7FD5, #86A8E7, #91EAE4);
            background-size: cover;
            background-repeat: no-repeat;
            padding-top: 50px;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }

        .main-content {
            background-color: rgba(255, 255, 255, 0.9); /* Fond blanc semi-transparent */
            padding: 20px; /* Espacement interne */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            width: 90%; /* Largeur maximale */
            max-width: 1200px; /* Largeur maximale */
        }

        .table {
            width: 100%; /* La table s'adapte à la largeur de l'écran */
            margin-bottom: 20px; /* Espacement en bas de la table */
            border-collapse: collapse; /* Fusion des bordures de tableau */
        }

        .table th,
        .table td {
            padding: 10px; /* Espacement interne */
            text-align: center; /* Alignement du texte au centre */
            border: 1px solid #ccc; /* Bordure légère */
        }

        .btn-primary,
        .btn-danger {
            margin-right: 5px; /* Espacement entre les boutons */
        }

        .input-group {
            width: 100%;
            margin-bottom: 15px; /* Espacement sous la barre de recherche */
        }

        .input-group-prepend {
            width: 40px; /* Largeur du conteneur de l'icône */
            padding: 0;
        }

        .input-group-prepend .input-group-text {
            background-color: #6dbdff; /* Fond bleu vif pour l'icône */
            border: none; /* Supprimer la bordure */
            width: 100%; /* Taille maximale pour l'icône */
            display: flex; /* Utilisation de flexbox pour aligner le contenu */
            justify-content: center; /* Centrer horizontalement */
            align-items: center; /* Centrer verticalement */
            border-radius: 5px 0 0 5px; /* Coins arrondis à gauche */
        }

        .input-group-prepend .input-group-text i {
            color: white; /* Couleur de l'icône */
            font-size: 1.2rem; /* Taille de l'icône */
        }

        @media (max-width: 768px) {
            /* Styles pour les écrans mobiles */
            .main-content {
                padding: 10px; /* Espacement réduit pour les petits écrans */
            }

            .table th,
            .table td {
                font-size: 0.9rem; /* Réduire la taille du texte pour les petits écrans */
                padding: 5px; /* Réduire l'espacement interne pour les petits écrans */
            }

            .btn-primary,
            .btn-danger {
                font-size: 0.8rem; /* Réduire la taille du texte des boutons pour les petits écrans */
                padding: 5px 10px; /* Réduire le padding des boutons pour les petits écrans */
            }

            .input-group-prepend .input-group-text i {
                font-size: 1rem; /* Réduire la taille de l'icône pour les petits écrans */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 main-content">
        <h2 class="text-center mb-4">Liste des Utilisateurs</h2>

        <!-- Barre de recherche -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" id="searchInput" placeholder="Rechercher dans la liste des utilisateurs">
        </div>

        <table class="table table-striped table-bordered">
            <!-- Tableau des utilisateurs -->
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date de Naissance</th>
                    <th>Catégorie</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($utilisateur->nomU); ?></td>
                        <td><?php echo htmlspecialchars($utilisateur->dateNaissance); ?></td>
                        <td><?php echo htmlspecialchars($utilisateur->categorie); ?></td>
                        <td><?php echo htmlspecialchars($utilisateur->email); ?></td>
                        <td>
                            <a href="modifier_utilisateur.php?id=<?php echo $utilisateur->idU; ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="supprimer_utilisateur.php?id=<?php echo $utilisateur->idU; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script pour la barre de recherche
        $(document).ready(function(){
            $('#searchInput').on('keyup', function(){
                var searchText = $(this).val().toLowerCase();
                $('tbody tr').each(function(){
                    var found = false;
                    $(this).find('td').each(function(){
                        if($(this).text().toLowerCase().indexOf(searchText) !== -1)
                            found = true;
                    });
                    found ? $(this).show() : $(this).hide();
                });
            });
        });
    </script>
</body>
</html>
