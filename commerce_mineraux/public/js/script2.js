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



// Fonction pour le menu déroulant
document.addEventListener('DOMContentLoaded', function () {
    var storeLink = document.querySelector('.menu-item a[href="{{ url("/store") }}"]');
    storeLink.addEventListener('click', function (event) {
        event.preventDefault();
        var submenu = this.nextElementSibling;
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    });
});



// Fonction pour envoyer un message pop-up en cas d'envoie dans contact
document.addEventListener('DOMContentLoaded', function() {
    var contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Email envoyé!',
                text: 'Votre message a été envoyé. Nous vous répondrons dans les 48 heures.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location.href = baseUrl;
                }
            });
        });
    }
});



// Fonction pour le déroulant
document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.dropbtn');
    dropdown.onclick = function(event) {
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    }
});