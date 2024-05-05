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
                <div class="container">
                    <div class="forms-container">
                        <!-- Formulaire de connexion -->
                        <div class="form-container login-form">
                            <h2>CONNEXION</h2>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="login-email">Email :</label>
                                    <input type="email" id="login-email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="login-password">Mot de passe :</label>
                                    <input type="password" id="login-password" name="password" required>
                                </div>
                                <button type="submit" class="submit-button">Se connecter</button>
                            </form>
                        </div>

                        <!-- Formulaire d'inscription -->
                        <div class="form-container signup-form">
                            <h2>INSCRIPTION</h2>
                            <form action="{{ route('register') }}" method="POST">
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
                                    <label for="address">Adresse :</label>
                                    <input type="text" id="address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone :</label>
                                    <input type="tel" id="phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-email">Email :</label>
                                    <input type="email" id="register-email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-password">Mot de passe :</label>
                                    <input type="password" id="register-password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmation du mot de passe :</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="submit-button">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <footer>@include('components.footer')</footer>
        </div>

        @include('components.scripts')
    </body>
</html>
