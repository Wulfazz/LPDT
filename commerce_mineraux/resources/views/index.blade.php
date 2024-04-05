{{-- resources/views/index.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pierres de la Terre</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Insérez vos styles CSS ici ou liez un fichier CSS externe -->
</head>
<body>


    <div id="app">
        <header>
            @include('components.header')
        </header>

        <div class="main-content">
            <main>
                <h1>Les pierres de la Terre</h1>
                <p>Je test parce que le CSS veut pas marcher</p>
                <!-- Autre contenu -->
            
            </main>
        

            <footer>
            @include('components.footer')
            </footer>
        </div>
    </div>
    <!-- Insérez vos scripts JS ici ou liez un fichier JS externe -->


</body>

<script>
function toggleMenu() {
    var menu = document.getElementById("mobileMenu");
    var content = document.querySelector(".main-content"); // Assurez-vous que ceci cible correctement votre contenu principal

    menu.classList.toggle('active');

    // Ajoute ou retire la classe .blurred sur le contenu principal
    if (menu.classList.contains('active')) {
        content.classList.add('blurred');
    } else {
        content.classList.remove('blurred');
    }
}
</script>
</html>
