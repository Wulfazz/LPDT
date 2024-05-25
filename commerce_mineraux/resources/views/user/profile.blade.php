<head>
    @include('components.head')
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="profile-container">
                <div class="profile-form">
                    <h2>PROFIL</h2>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($user)
                        <form method="POST" action="{{ route('profile.update', ['user_id' => $user->user_id]) }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="first_name">Prénom :</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Nom :</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone :</label>
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse :</label>
                                <input type="text" id="address" name="address" value="{{ $user->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="current_password">Mot de passe actuel :</label>
                                <input type="password" id="current_password" name="current_password" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Nouveau mot de passe :</label>
                                <input type="password" id="new_password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirmation">Confirmer le nouveau mot de passe :</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation">
                            </div>
                            <button type="submit" class="submit-button">Mettre à jour</button>
                        </form>
                    @else
                        <p>Utilisateur non trouvé.</p>
                    @endif
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
