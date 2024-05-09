<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <div class="container">
                    <h1>Profil de {{ $user->first_name }}</h1>
                    <p>Email: {{ $user->email }}</p>
                    <p>Adresse: {{ $user->address }}</p>
                    <p>Téléphone: {{ $user->phone }}</p>
                </div>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>

</html>