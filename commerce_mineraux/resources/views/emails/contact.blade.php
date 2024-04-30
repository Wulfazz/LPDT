<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <h1>Nouveau message de contact</h1>
                <p>Vous avez reçu un message de : {{ $fname }} {{ $lname }}</p>
                <p>Email : {{ $email }}</p>
                <p>Téléphone : {{ $phone }}</p>
                <p>Message : {{ $user_query }}</p>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>
<script>
    // Définir les variables JavaScript pour les messages de session
    var successMessage = "{{ session('success') }}";
</script>

</html>