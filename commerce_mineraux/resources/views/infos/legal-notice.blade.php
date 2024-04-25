<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <h2>Mentions Légales</h2>
                <p>
                    Raison sociale : Entreprise Individuelle Caroline Santini
                    <br>
                    Nom commercial : Les Pierres de la Terre
                    <br>
                    Siège : 180 chemin de Limate 83870 Signes
                    <br>
                    Siren : 895 094 175
                    <br>
                    Tél : 06.28.56.08.70
                    <br>
                    Email : contact@lespierresdelaterre.fr
                    <br>
                </p>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>

</html>