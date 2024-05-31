<head>
    @include('components.head')
    <title>Gérer les produits</title>
    <link rel="stylesheet" href="{{ asset('css/admin-products.css') }}">
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="admin-products-container">
                <h1>Gérer les produits</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="admin-options">
                    <a href="{{ route('admin.products.create') }}" class="btn-add">Ajouter un produit</a>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Détails</th>
                                <th>Image</th>
                                <th>Quantité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image"></td>
                                    <td>{{ $product->quantity_available }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn-edit">Modifier</a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product->product_id) }}" class="inline-form">
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
