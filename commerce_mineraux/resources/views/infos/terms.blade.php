<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                @include('components.articles')
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>

</html>