<head>
    @include('components.head')
</head>
<body>

<div class="content" id="app">
    <header>@include('components.header')</header>
    <main class="admin-container admin-products-container">
        <h1>Gérer les Produits et Catégories</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Produits</h2>

        <a href="{{ route('admin.products.create') }}" class="btn-submit">Ajout produit / Gérer catégories</a>

        <!-- Filters -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="admin-form">
            <div class="form-group">
                <label for="main_category_id">Filtrer par Catégorie Principale :</label>
                <select id="main_category_id" name="main_category_id">
                    <option value="">Toutes les Catégories Principales</option>
                    @foreach($categories as $category)
                        @if($category->type == 'main')
                            <option value="{{ $category->category_id }}" {{ request('main_category_id') == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="other_category_id">Filtrer par Autre Catégorie :</label>
                <select id="other_category_id" name="other_category_id">
                    <option value="">Toutes les Autres Catégories</option>
                    @foreach($categories as $category)
                        @if($category->type == 'other')
                            <option value="{{ $category->category_id }}" {{ request('other_category_id') == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-submit">Filtrer</button>
        </form>

        <div class="admin-options">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Détails</th>
                        <th>Image</th>
                        <th>Quantité</th>
                        <th>Catégorie Principale</th>
                        <th>Autre Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr style="margin-bottom: 40px;">
                        <td data-label="Nom">{{ $product->name }}</td>
                        <td data-label="Prix">{{ $product->price }}</td>
                        <td data-label="Détails">{{ $product->details }}</td>
                        <td data-label="Image"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image"></td>
                        <td data-label="Quantité">{{ $product->quantity_available }}</td>
                        <td data-label="Catégorie Principale">{{ $product->mainCategory ? $product->mainCategory->category_name : 'N/A' }}</td>
                        <td data-label="Autre Catégorie">{{ $product->otherCategory ? $product->otherCategory->category_name : 'N/A' }}</td>
                        <td data-label="Actions" style="padding-left: 100px;">
                            <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" class="inline-form">
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

    </main>
    <footer>@include('components.footer')</footer>
</div>

@include('components.scripts')

</body>
</html>
