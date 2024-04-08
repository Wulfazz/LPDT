{{-- resources/views/index.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pierres de la Terre</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <!-- Insérez vos styles CSS ici ou liez un fichier CSS externe -->
</head>
<body>

    <div>@include('components.menuhidden')</div>

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <h1>Les pierres de la Terre</h1>
                <p>Je test parce que le CSS veut pas marcher</p>
                <!-- Autre contenu -->
            
            </main>
        
            <footer>@include('components.footer')</footer>

    </div>

</body>

<script>
function toggleMenu() {
    var menu = document.getElementById("mobileMenu");
    var content = document.querySelector(".content"); // Assurez-vous que ceci cible correctement votre contenu principal

    // Cette vérification peut ne pas être nécessaire si cette fonction est uniquement appelée pour ouvrir le menu
    menu.classList.toggle('active');
    content.classList.toggle('blurred');
}

// Fonction spécifique pour fermer le menu
function closeMenu() {
    var menu = document.getElementById("mobileMenu");
    var content = document.querySelector(".content"); // Cible le contenu principal pour retirer le flou

    menu.classList.remove('active');
    content.classList.remove('blurred');
}

// Ajoutez un écouteur d'événement au bouton de fermeture
document.getElementById('closeMenu').addEventListener('click', closeMenu);
</script>

</html>
