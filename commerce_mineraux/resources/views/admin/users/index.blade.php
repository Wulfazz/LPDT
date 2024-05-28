<head>
    @include('components.head')
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <h1>Liste des utilisateurs</h1>
            <ul>
                @foreach($users as $user)
                    <li>{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}</li>
                @endforeach
            </ul>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
