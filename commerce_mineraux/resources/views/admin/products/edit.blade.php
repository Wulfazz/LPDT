<!DOCTYPE html>
<html>
<head>@include('components.head')</head>
<body>

@include('components.menuhidden')

<div class="content" id="app">
    <header>@include('components.header')</header>
    <main>
        <h1>Modifier Produit</h1>
        <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $product->name }}" placeholder="Nom du Produit">
            <input type="text" name="price" value="{{ $product->price }}" placeholder="Prix du Produit">
            <textarea name="details" placeholder="Détails du Produit">{{ $product->details }}</textarea>
            <input type="text" name="image_url" value="{{ $product->image_url }}" placeholder="URL de l'Image du Produit">
            <input type="number" name="quantity_available" value="{{ $product->quantity_available }}" placeholder="Quantité Disponible">
            <select name="main_category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}" @if($category->category_id == $product->main_category_id) selected @endif>{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button type="submit">Modifier Produit</button>
        </form>
    </main>
    <footer>@include('components.footer')</footer>
</div>

@include('components.scripts')

</body>
</html>
