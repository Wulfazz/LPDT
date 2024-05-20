<head>
    @include('components.head')
</head>
<body>
    @include('components.menuhidden')

    <div class="content" id="app">
        <header>@include('components.header')</header>

        <main>
            <div class="container">
                <h1>Profil de l'utilisateur</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update', ['user_id' => $user->user_id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Prénom :</label>
                        <input type="text" id="first_name" name="first_name" required value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nom :</label>
                        <input type="text" id="last_name" name="last_name" required value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone :</label>
                        <input type="tel" id="phone" name="phone" required value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" required value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                    <p>Pour modifier vos informations, veuillez vérifier votre mot de passe.</p>
                        <label for="current_password">Mot de passe actuel :</label>
                        <input type="password" id="current_password" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <p>Si vous souhaitez changer de mot de passe : </p>
                        <label for="new_password">Nouveau mot de passe :</label>
                        <input type="password" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirmer le nouveau mot de passe :</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
            </div>
        </main>

        <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>
</html>
