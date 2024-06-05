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
        <h1>Ajouter un Nouveau Produit et Catégorie</h1>
        
        <h2>Ajouter Produit</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" class="admin-options">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Nom du Produit" required>
            </div>
            <div class="form-group">
                <input type="number" name="price" placeholder="Prix du Produit (€)" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <textarea name="details" placeholder="Détails du Produit" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="image_url" placeholder="URL de l'Image du Produit" required>
            </div>
            <div class="form-group">
                <input type="number" name="quantity_available" placeholder="Quantité Disponible" min="0" step="1" required>
            </div>
            
            <h3>Choisir Catégorie Principale</h3>
            <div class="form-group">
                <select name="main_category_id" required>
                    @foreach($categories as $category)
                        @if($category->type == 'main')
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <h3>Choisir Autre Catégorie</h3>
            <div class="form-group">
                <select name="other_category_id" required>
                    @foreach($categories as $category)
                        @if($category->type == 'other')
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn-submit">Ajouter Produit</button>
        </form>

        <h2>Ajouter Catégorie</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="admin-options">
            @csrf
            <div class="form-group">
                <input type="text" name="category_name" placeholder="Nom de la Catégorie" required>
            </div>
            <button type="submit" class="btn-submit">Ajouter Catégorie</button>
        </form>
    </main>
    <footer>@include('components.footer')</footer>
</div>

@include('components.scripts')

</body>
</html>
