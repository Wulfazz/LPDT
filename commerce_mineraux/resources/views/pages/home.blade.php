<head>@include('components.head')</head>
<body>

    <div>@include('components.menuhidden')</div>

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
