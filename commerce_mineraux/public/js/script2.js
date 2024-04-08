document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour basculer l'affichage du menu et de la croix
    function toggleMenu(open) {
        var menu = document.getElementById("mobileMenu");
        var content = document.querySelector(".content");
        var closeIcon = document.getElementById("closeMenu");

        // Si "open" est défini explicitement à false, fermer le menu
        if (open === false) {
            menu.classList.remove('active');
            content.classList.remove('blurred');
            closeIcon.style.display = 'none';
            menu.style.display = 'none'; // Assurez-vous que le menu est bien caché
        } else {
            // Sinon, basculer l'état du menu
            menu.classList.toggle('active');
            content.classList.toggle('blurred');
            // Ajuster la visibilité de la croix et du menu en fonction de l'état actif
            if (menu.classList.contains('active')) {
                closeIcon.style.display = 'block';
                menu.style.display = 'block';
            } else {
                closeIcon.style.display = 'none';
                menu.style.display = 'none';
            }
        }
    }

    // Attache l'écouteur d'événements au bouton burger pour basculer le menu
    document.getElementById('burgerMenu').addEventListener('click', function() { toggleMenu(); });
    document.getElementById('closeMenu').addEventListener('click', function() {
        toggleMenu(); // Utiliser toggleMenu permet de gérer à la fois l'ouverture et la fermeture
    });
    // Utilise la fonction toggleMenu avec "false" pour fermer le menu quand le lien "À propos" est cliqué
    document.getElementById('linkToFooter').addEventListener('click', function() { toggleMenu(false); });
});



//defilement pour liens dans page
$(document).ready(function(){
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
});