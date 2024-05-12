<head>@include('components.head')</head>
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

                <form method="POST" action="{{ route('profile.update', ['user_id' => $user->id]) }}">
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
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone :</label>
                        <input type="tel" id="phone" name="phone" required value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" required value="{{ $user->address }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </main>

        <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>
</html>
