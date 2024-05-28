<head>
    @include('components.head')
    <title>Panneau Admin</title>
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="admin-dashboard-container">
                <h1>Panneau Administrateur</h1>
                <div class="admin-options">
                    <a href="{{ route('admin.users.index') }}" class="admin-option">
                        <h2>Gérer les utilisateurs</h2>
                        <p>Ajouter, modifier ou supprimer des utilisateurs.</p>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="admin-option">
                        <h2>Gérer les produits</h2>
                        <p>Ajouter, modifier ou supprimer des produits.</p>
                    </a>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
