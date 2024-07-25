<?php
// Démarrer la session si ce n'est pas déjà fait
session_start();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Supprimer les cookies
setcookie('loggedin', '', time() - 3600, '/');
setcookie('email', '', time() - 3600, '/');
setcookie('idU', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');

// Redirection vers la page de connexion après déconnexion
header('Location: ../presentation/formulaire_connection.php');
exit;
?>

