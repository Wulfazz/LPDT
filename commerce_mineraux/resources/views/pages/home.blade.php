<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <section class="intro">
                    <div class="overlay"></div>
                    <H2>LES PIERRES DE LA TERRE</H2>
                    <p>
                        La passion des minéraux, vente de minéraux et bijoux.
                        <br>
                        Ici, vous allez découvrir une collection sélectionnée par 
                        une passionnée de minéraux.
                    </p>
                </section>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
    
</body>

</html>
