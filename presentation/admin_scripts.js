document.addEventListener('DOMContentLoaded', function() {
    const submenuLinks = document.querySelectorAll('.has-submenu > a');
    const menuLinks = document.querySelectorAll('.menu a[data-target]');
    const sections = document.querySelectorAll('.main-content section');
    const searchInput = document.getElementById('searchMenu');

    submenuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const submenu = this.nextElementSibling;
            submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
        });
    });

    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.getAttribute('data-target');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(targetId).classList.add('active');
        });
    });

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        const menuItems = document.querySelectorAll('.menu ul li');

        menuItems.forEach(item => {
            const link = item.querySelector('a');
            if (link) {
                const text = link.textContent.toLowerCase();
                item.style.display = (text.includes(filter)) ? 'block' : 'none';
                showAllParents(item);
            }
        });

        document.querySelectorAll('.submenu').forEach(submenu => {
            const visibleItems = Array.from(submenu.children).some(child => child.style.display !== 'none');
            submenu.style.display = (visibleItems) ? 'block' : 'none';
        });
    });

    function showAllParents(item) {
        let parent = item.parentElement.closest('.submenu');
        while (parent) {
            parent.style.display = 'block';
            parent = parent.parentElement.closest('.submenu');
        }
    }

    document.getElementById('accueil').classList.add('active'); // Afficher la section d'accueil par défaut
});

