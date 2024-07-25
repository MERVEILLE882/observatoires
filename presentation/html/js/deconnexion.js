
    function confirmLogout() {
        if (confirm("Voulez-vous vraiment vous déconnecter ?")) {
            // L'utilisateur a confirmé, rediriger vers la page de déconnexion
            window.location.href = "../formulaire_connection.php";
        } else {
            // L'utilisateur a annulé, ne rien faire
            // Vous pouvez aussi rediriger vers une autre page ou ne rien faire
        }
    }
