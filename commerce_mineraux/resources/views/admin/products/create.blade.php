<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
    <title>Ajouter un produit</title>
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="admin-products-container">
                <h1>Ajouter un produit</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Détails :</label>
                        <textarea id="details" name="details" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_url">URL de l'image :</label>
                        <input type="text" id="image_url" name="image_url" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity_available">Quantité disponible :</label>
                        <input type="number" id="quantity_available" name="quantity_available" required>
                    </div>
                    <div class="form-group">
                        <label for="main_category_id">Catégorie principale :</label>
                        <select id="main_category_id" name="main_category_id" required>
                            @foreach($main_categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">Autres catégories :</label>
                        <select id="categories" name="categories[]" multiple required>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn-submit">Ajouter</button>
                    </div>
                </form>

                <!-- Section de gestion des catégories -->
                <div class="admin-categories-container">
                    <h2>Gérer les catégories</h2>
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Nouvelle catégorie :</label>
                            <input type="text" id="category_name" name="category_name" required>
                            <input type="hidden" id="type" name="type" value="other">
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn-submit">Ajouter catégorie</button>
                        </div>
                    </form>
                    <h3>Catégories existantes</h3>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                {{ $category->category_name }}
                                <form method="POST" action="{{ route('admin.categories.destroy', $category->category_id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                                <form method="POST" action="{{ route('admin.categories.update', $category->category_id) }}" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <input type="text" name="category_name" value="{{ $category->category_name }}" required>
                                    <button type="submit" class="btn-submit">Modifier</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
