<nav class="navbar">
    <div class="navbar-mobile">
        <button id="burgerMenu" onclick="toggleMenu()">
            &#9776;
        </button>
        <div class="logo-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo">
            </a>
        </div>
        <div class="icons-right">
            <a href="{{ url('/account') }}">👤</a>
            <a href="{{ url('/cart') }}">🛒</a>
            <a href="{{ url('/search') }}">🔍</a>
        </div>
    </div>
</nav>

