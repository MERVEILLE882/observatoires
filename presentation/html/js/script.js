// // Sélectionnez tous les éléments avec la classe "nav-item dropdown"
// var dropdownElements = document.querySelectorAll('.nav-item.dropdown');

// // Ajoutez un gestionnaire d'événements mouseover sur chaque élément
// dropdownElements.forEach(function(element) {
//   element.addEventListener('mouseover', function() {
//     // Ajouter la classe "show" pour afficher le dropdown
//     this.classList.add('show');
//     this.querySelector('.dropdown-menu').classList.add('show');
//   });

//   // Ajoutez un gestionnaire d'événements mouseout sur chaque élément
//   element.addEventListener('mouseout', function() {
//     // Supprimer la classe "show" pour masquer le dropdown
//     this.classList.remove('show');
//     this.querySelector('.dropdown-menu').classList.remove('show');
//   });
// });

// // Sélectionnez tous les éléments avec la classe "dropdown-submenu"
// var dropdownSubmenuElements = document.querySelectorAll('.dropdown-submenu');

// // Ajoutez un gestionnaire d'événements mouseover sur chaque sous-menu
// dropdownSubmenuElements.forEach(function(element) {
//   element.addEventListener('mouseover', function() {
//     // Ajouter la classe "show" pour afficher le sous-menu
//     this.querySelector('.dropdown-menu').classList.add('show');
//   });

//   // Ajoutez un gestionnaire d'événements mouseout sur chaque sous-menu
//   element.addEventListener('mouseout', function() {
//     // Supprimer la classe "show" pour masquer le sous-menu
//     this.querySelector('.dropdown-menu').classList.remove('show');
//   });
// });









document.addEventListener('DOMContentLoaded', function() {
  var gestionToggle = document.getElementById('gestionToggle');
  var publicationsToggle = document.getElementById('publicationsToggle');
  var utilisateursToggle = document.getElementById('utilisateursToggle');

  gestionToggle.addEventListener('click', function(event) {
      event.preventDefault();
      var gestionMenu = document.getElementById('gestionMenu');
      gestionMenu.classList.toggle('show');
  });

  publicationsToggle.addEventListener('click', function(event) {
      event.preventDefault();
      var publicationsMenu = document.getElementById('publicationsMenu');
      publicationsMenu.classList.toggle('show');
  });

  utilisateursToggle.addEventListener('click', function(event) {
      event.preventDefault();
      var utilisateursMenu = document.getElementById('utilisateursMenu');
      utilisateursMenu.classList.toggle('show');
  });
});

$(document).ready(function(){
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});