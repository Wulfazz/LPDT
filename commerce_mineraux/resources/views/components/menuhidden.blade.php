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
    </div>
    <span id="closeMenu" style="cursor:pointer;">&times;</span>
</div>
