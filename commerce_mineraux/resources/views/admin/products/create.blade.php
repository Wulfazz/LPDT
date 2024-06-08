<head>
    @include('components.head')
    <link rel="stylesheet" href="{{ asset('css/admin-products.css') }}">
</head>
<body>

@include('components.menuhidden')

<div class="content" id="app">
    <header>@include('components.header')</header>
    <main class="admin-edit-product-container">
        <h1>Ajouter un Nouveau Produit et Catégorie</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Ajouter Produit</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" class="admin-form">
            @csrf
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Nom du Produit" required>
            </div>
            <div class="form-group">
                <input type="text" id="price" name="price" placeholder="Prix du Produit" required>
            </div>
            <div class="form-group">
                <textarea id="details" name="details" placeholder="Détails du Produit" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_url">URL de l'Image du Produit :</label>
                <input type="url" id="image_url" name="image_url" placeholder="URL de l'Image du Produit" required>
            </div>
            <div class="form-group">
                <input type="number" id="quantity_available" name="quantity_available" placeholder="Quantité Disponible" required>
            </div>
            <div class="form-group">
                <label for="main_category_id">Catégorie Principale :</label>
                <select id="main_category_id" name="main_category_id" required>
                    @foreach($mainCategories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="other_category_id">Autre Catégorie :</label>
                <select id="other_category_id" name="other_category_id" required>
                    @foreach($otherCategories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-submit">Ajouter Produit</button>
        </form>

        <!-- Ajout catégories -->
        <h2>Ajouter Catégorie</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="admin-form">
            @csrf
            <div class="form-group">
                <label for="category_name">Nom de la Catégorie</label>
                <input type="text" id="category_name" name="category_name" placeholder="Nom de la Catégorie" required>
            </div>
            <button type="submit" class="btn-submit">Ajouter Catégorie</button>
        </form>

        <!-- Index catégories -->
        <h2>Catégories</h2>
        <div class="admin-options">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($otherCategories as $category)
                        <tr>
                            <td data-label="Nom">
                                <form action="{{ route('admin.categories.update', $category->category_id) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="category_name" value="{{ $category->category_name }}" class="category-input">
                            </td>
                            <td data-label="Action" style="padding-right: 15px; padding-left: 400px;">
                                <div style="display: flex; align-items: center;">
                                        <button type="submit" class="btn-edit">Modifier</button>
                                </form>
                                    <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" class="inline-form" style="margin-left: 10px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Supprimer</button>
                                    </form>
                                </div>
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
