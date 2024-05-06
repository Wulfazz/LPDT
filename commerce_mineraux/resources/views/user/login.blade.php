<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
</head>
    <body>
        @include('components.menuhidden')

        <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <div class="login-container">
                    <div class="login-form">
                        <h2>CONNEXION</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe :</label>
                                <input type="password" name="password" required>
                            </div>
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
