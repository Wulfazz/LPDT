<div class="menu-container">
    <div class="menu-hidden" id="mobileMenu">
        <a href="{{ url('/') }}" class="menu-link">Accueil</a>
        <a href="{{ url('/story') }}" class="menu-link">Mon histoire</a>
        <a href="#footer" id="linkToFooter" class="menu-link">À propos</a>
        <div class="dropdown">
            <a href="javascript:void(0);" class="dropbtn menu-link">Boutique</a>
            <div class="dropdown-content">
                <a href="{{ url('/shop/minerals') }}" class="dropdown-link">Minéraux bruts</a>
                <a href="{{ url('/shop/stone') }}" class="dropdown-link">Pierres taillées</a>
                <a href="{{ url('/shop/bracelet') }}" class="dropdown-link">Bracelets</a>
                <a href="{{ url('/shop/pendant') }}" class="dropdown-link">Pendentifs</a>
            </div>
        </div>
        <a href="{{ url('/contact') }}" class="menu-link">Contact</a>

        @guest
            <a href="{{ url('/login') }}" class="menu-link">Connexion</a>
            <a href="{{ url('/register') }}" class="menu-link">Inscription</a>
        @else
            <a href="{{ url('/profile/' . Auth::user()->user_id) }}" class="menu-link">Profil</a>
            @if(Auth::user()->user_type === 'seller')
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropbtn menu-link">Admin</a>
                    <div class="dropdown-content">
                        <a href="{{ url('/admin/users') }}" class="dropdown-link">Gérer Utilisateurs</a>
                        <a href="{{ url('/admin/products') }}" class="dropdown-link">Gérer Produits</a>
                        <a href="{{ url('/admin/products/create') }}" class="dropdown-link">Ajouter Produit / Gérer Catégories</a>
                    </div>
                </div>
            @endif
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                Déconnexion
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
    <span id="closeMenu" style="cursor:pointer;">&times;</span>
</div>
