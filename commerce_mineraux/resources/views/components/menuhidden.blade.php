<div class="menu-container">
    <div class="menu-hidden" id="mobileMenu">
        <a href="{{ route('home') }}">Accueil</a>
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
            <a href="{{ route('login.form') }}">Connexion</a>
            <a href="{{ route('register.form') }}">Inscription</a>
        @else
            @if(Auth::check() && Auth::user()->user_id)
                <a href="{{ route('profile', ['user_id' => Auth::user()->user_id]) }}">Profil</a>
                @if(Auth::user()->user_type === 'seller')
                    <a href="{{ route('admin.dashboard') }}">Panneau Admin</a>
                @endif
            @endif
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
    <span id="closeMenu" style="cursor:pointer;">&times;</span>
</div>
