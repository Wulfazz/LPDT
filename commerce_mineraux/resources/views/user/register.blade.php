<head>
    @include('components.head')
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="signup-container">
                <div class="signup-form">
                    <h2>INSCRIPTION</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Prénom :</label>
                            <input type="text" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label>Nom :</label>
                            <input type="text" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" name="address" required>
                        </div>
                        <div class="form-group">
                            <label>Téléphone :</label>
                            <input type="tel" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe :</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmation du mot de passe :</label>
                            <input type="password" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="submit-button">S'inscrire</button>
                    </form>
                    <p class="login-link">
                        Déjà inscrit? <a href="{{ route('login.form') }}">Connectez-vous ici</a>
                    </p>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
