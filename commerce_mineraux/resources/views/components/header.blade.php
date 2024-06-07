<nav class="navbar">
    <div class="navbar-mobile">
        <button id="burgerMenu" onclick="toggleMenu()">
            &#9776;
        </button>
        <div class="logo-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/LPDT-header.jpg') }}" alt="Logo">
            </a>
        </div>
        <div class="icons-right">
        @guest
            <a href="{{ url('/user/login') }}">
                <img src="{{ asset('img/iconeUser.png') }}" alt="Utilisateur" class="iconHead">
            </a>
        @else
            <a href="{{ route('profile', ['user_id' => Auth::user()->user_id]) }}">
                <img src="{{ asset('img/iconeUser.png') }}" alt="Utilisateur" class="iconHead">
            </a>
        @endguest
            <a href="{{ url('/user/cart') }}"><img src="{{ asset('img/iconeCart.png') }}" alt="Panier" class="iconHead"></a>
        </div>
    </div>
</nav>

