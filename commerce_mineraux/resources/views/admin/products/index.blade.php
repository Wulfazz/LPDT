<!DOCTYPE html>
<html>
<head>
    @include('components.head')
    <link rel="stylesheet" href="{{ asset('css/admin-products.css') }}">
</head>
<body>

@include('components.menuhidden')

<div class="content" id="app">
    <header>@include('components.header')</header>
    <main class="admin-products-container">
        <h1>Gérer les Produits et Catégories</h1>

        <h2>Produits</h2>
        <a href="{{ route('admin.products.create') }}" class="btn-submit">Ajouter un Nouveau Produit</a>
        <table class="admin-options">
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
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->details }}</td>
                    <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image"></td>
                    <td>{{ $product->quantity_available }}</td>
                    <td>{{ $product->mainCategory ? $product->mainCategory->category_name : 'N/A' }}</td>
                    <td>{{ $product->otherCategory ? $product->otherCategory->category_name : 'N/A' }}</td>
                    <td>
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

        <h2>Catégories</h2>
        <div class="admin-categories-container">
            <table class="admin-options">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        @if($category->type == 'other')
                        <tr>
                            <td>
                                <form action="{{ route('admin.categories.update', $category->category_id) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="category_name" value="{{ $category->category_name }}">
                                    <button type="submit" class="btn-edit">Modifier</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endif
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
