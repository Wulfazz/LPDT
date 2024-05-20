<head>
    @include('components.head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="login-container">
                <div class="login-form">
                    <h2>CONNEXION</h2>
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Se souvenir de moi</label>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LcO1d8pAAAAAIjQyroNckP1dbwf16dvLO1cNt8U"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                        <button type="submit" class="submit-button">Se connecter</button>
                    </form>
                    <p class="register-link">
                        Pas encore membre? <a href="{{ route('register.form') }}">Inscrivez-vous ici</a>
                    </p>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
