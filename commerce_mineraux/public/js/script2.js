document.addEventListener('DOMContentLoaded', function () {
    function toggleMenu(open) {
        var menu = document.getElementById("mobileMenu");
        var closeIcon = document.getElementById("closeMenu");

        if (open === false) {
            menu.classList.remove('active');
            closeIcon.style.display = 'none';
            menu.style.display = 'none';
        } else {
            menu.classList.toggle('active');
            if (menu.classList.contains('active')) {
                closeIcon.style.display = 'block';
                menu.style.display = 'block';
            } else {
                closeIcon.style.display = 'none';
                menu.style.display = 'none';
            }
        }
    }

    document.getElementById('burgerMenu').addEventListener('click', function() { toggleMenu(); });
    document.getElementById('closeMenu').addEventListener('click', function() { toggleMenu(false); });
    document.getElementById('linkToFooter').addEventListener('click', function(event) {
        if (window.innerWidth >= 1024) {
            event.stopPropagation();
        } else {
            toggleMenu(false);
        }
    });

    var dropdownButtons = document.querySelectorAll('.dropbtn');
    dropdownButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            } else {
                document.querySelectorAll('.dropdown-content').forEach(function (content) {
                    content.style.display = 'none';
                });
                dropdownContent.style.display = 'block';
            }
        });
    });

    window.addEventListener('click', function (event) {
        if (!event.target.matches('.dropbtn')) {
            document.querySelectorAll('.dropdown-content').forEach(function (content) {
                content.style.display = 'none';
            });
        }
    });

    document.querySelectorAll('.dropdown-content').forEach(function (content) {
        content.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });

    document.getElementById('closeMenu').addEventListener('click', function () {
        document.getElementById('mobileMenu').style.display = 'none';
    });

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


    // Peut-être pour plus tard, mode d'achat
    document.querySelectorAll('.buy-button').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            addToCart(productId);
        });
    });
});

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

    $('.signup-btn').on('click', function (e) {
        e.preventDefault();
        $('#signupModal').modal('show');
    });
});

function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(response => {
        if (response.ok) {
            alert('Produit ajouté au panier');
        } else {
            response.json().then(data => {
                alert(data.message || 'Erreur lors de l\'ajout du produit au panier');
            });
        }
    }).catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de l\'ajout du produit au panier');
    });
}
