
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('searchInput');
        var menuItems = document.querySelectorAll('.sidebar nav ul li');

        searchInput.addEventListener('input', function() {
            var query = this.value.trim().toLowerCase();

            menuItems.forEach(function(item) {
                var menuItemText = item.textContent.toLowerCase();
                var subMenuItems = item.querySelectorAll('ul li');

                // Vérifier si le texte de l'élément de menu ou de ses sous-éléments contient la recherche
                var itemMatched = menuItemText.includes(query);
                subMenuItems.forEach(function(subItem) {
                    if (subItem.textContent.toLowerCase().includes(query)) {
                        itemMatched = true;
                    }
                });

                // Afficher ou masquer l'élément de menu en fonction de la correspondance
                if (itemMatched) {
                    showMenuItem(item);
                } else {
                    hideMenuItem(item);
                }
            });
        });

        function showMenuItem(item) {
            item.style.display = 'block'; // Afficher l'élément du menu principal
            var parentItem = item.closest('li'); // Trouver le parent direct (niveau supérieur) de l'élément
            if (parentItem && parentItem !== item) {
                showMenuItem(parentItem); // Récursivement afficher les éléments parents si nécessaire
            }
        }

        function hideMenuItem(item) {
            item.style.display = 'none'; // Masquer l'élément du menu principal
            var subMenuItems = item.querySelectorAll('ul li');
            subMenuItems.forEach(function(subItem) {
                hideMenuItem(subItem); // Récursivement masquer tous les sous-éléments
            });
        }
    });

