<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
    <title>Modifier un produit</title>
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <div class="admin-products-container">
                <h1>Modifier un produit</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.products.update', $product->product_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Détails :</label>
                        <textarea id="details" name="details" required>{{ $product->details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_url">URL de l'image :</label>
                        <input type="text" id="image_url" name="image_url" value="{{ $product->image_url }}" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity_available">Quantité disponible :</label>
                        <input type="number" id="quantity_available" name="quantity_available" value="{{ $product->quantity_available }}" required>
                    </div>
                    <div class="form-group">
                        <label for="main_category_id">Catégorie principale :</label>
                        <select id="main_category_id" name="main_category_id" required>
                            @foreach($main_categories as $category)
                                <option value="{{ $category->category_id }}" {{ $product->main_category_id == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">Autres catégories :</label>
                        <select id="categories" name="categories[]" multiple required>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $product->categories->contains($category->category_id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn-submit">Modifier</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
