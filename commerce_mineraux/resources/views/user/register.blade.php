<head>
    @include('components.head')
</head>
<body>

    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="register-container">
                <div class="register-form">
                    <h2>INSCRIPTION</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">Prénom :</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom :</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmer le mot de passe :</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone :</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Adresse :</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <button type="submit" class="submit-button">S'inscrire</button>
                    </form>
                    <p class="login-link">
                        Déjà membre? <a href="{{ route('login.form') }}">Connectez-vous ici</a>
                    </p>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
