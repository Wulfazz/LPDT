<head>
    @include('components.head')
</head>
<body>

<div class="content" id="app">
    <header>@include('components.header')</header>
    <main class="admin-edit-product-container">
        <h1>Modifier Produit</h1>
        <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST" class="admin-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom du Produit</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Nom du Produit" required>
            </div>
            <div class="form-group">
                <label for="price">Prix du Produit</label>
                <input type="text" id="price" name="price" value="{{ $product->price }}" placeholder="Prix du Produit" required>
            </div>
            <div class="form-group">
                <label for="details">Détails du Produit</label>
                <textarea id="details" name="details" placeholder="Détails du Produit" required>{{ $product->details }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_url">URL de l'Image du Produit</label>
                <input type="url" id="image_url" name="image_url" value="{{ $product->image_url }}" placeholder="URL de l'Image du Produit" required>
            </div>
            <div class="form-group">
                <label for="quantity_available">Quantité Disponible</label>
                <input type="number" id="quantity_available" name="quantity_available" value="{{ $product->quantity_available }}" placeholder="Quantité Disponible" required>
            </div>
            <div class="form-group">
                <label for="main_category_id">Catégorie Principale</label>
                <select id="main_category_id" name="main_category_id" required>
                    @foreach($categories as $category)
                        @if($category->type == 'main')
                            <option value="{{ $category->category_id }}" @if($category->category_id == $product->main_category_id) selected @endif>{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="other_category_id">Autre Catégorie</label>
                <select id="other_category_id" name="other_category_id" required>
                    @foreach($categories as $category)
                        @if($category->type == 'other')
                            <option value="{{ $category->category_id }}" @if($category->category_id == $product->other_category_id) selected @endif>{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-submit">Modifier Produit</button>
        </form>
    </main>
    <footer>@include('components.footer')</footer>
</div>

@include('components.scripts')

</body>
</html>
