{{-- resources/views/index.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pierres de la Terre</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <!-- Insérez vos styles CSS ici ou liez un fichier CSS externe -->
</head>
<body>

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                Page d'Accueil
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    <!-- Les scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
</body>

</html>
