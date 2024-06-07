<div class="menu-container">
    <div class="menu-hidden" id="mobileMenu">
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ url('/story') }}">Mon histoire</a>
        <a href="#footer" id="linkToFooter">À propos</a>
        <div class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">Boutique</a>
            <div class="dropdown-content">
                <a href="{{ url('/shop/minerals') }}">Minéraux bruts</a>
                <a href="{{ url('/shop/stone') }}">Pierres taillées</a>
                <a href="{{ url('/shop/bracelet') }}">Pendentifs</a>
                <a href="{{ url('/shop/pendant') }}">Bracelets</a>
            </div>
        </div>
        <a href="{{ url('/contact') }}">Contact</a>

        @guest
            <a href="{{ url('/login') }}">Connexion</a>
            <a href="{{ url('/register') }}">Inscription</a>
        @else
            <a href="{{ url('/profile/' . Auth::user()->user_id) }}">Profil</a>
            @if(Auth::user()->user_type === 'seller')
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropbtn">Admin</a>
                    <div class="dropdown-content">
                        <a href="{{ url('/admin/users') }}">Gérer Utilisateurs</a>
                        <a href="{{ url('/admin/products') }}">Gérer Produits</a>
                        <a href="{{ url('/admin/products/create') }}">Ajouter Produit / Gérer Catégories</a>
                    </div>
                </div>
            @endif
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
    <span id="closeMenu" style="cursor:pointer;">&times;</span>
</div>
