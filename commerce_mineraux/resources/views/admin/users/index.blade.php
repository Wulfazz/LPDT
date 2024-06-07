<head>
    @include('components.head')
    <title>Gérer les utilisateurs</title>
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="admin-users-container">
                <h1>Gérer les utilisateurs</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="admin-options">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td data-label="ID">{{ $user->user_id }}</td>
                                    <td data-label="Nom">{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td class="center-email" style="padding-right: 30px; padding-left: 0px;">{{ $user->email }}</td>
                                    <td data-label="Action">
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->user_id) }}" class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
