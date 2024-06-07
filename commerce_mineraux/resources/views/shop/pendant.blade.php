<!DOCTYPE html>
<html lang="fr">
<head>@include('components.head')</head>
<body>
    @include('components.menuhidden')

    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <h1 class="shop-title">Pendentifs</h1>
            <div class="products-grid">
                @forelse ($products as $product)
                    <div class="product-item">
                        <img class="product-image" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-price">Prix: {{ $product->price }} €</p>
                        <p class="product-description">{{ $product->details }}</p>
                        <button class="buy-button">Acheter</button>
                    </div>
                @empty
                    <p>Aucun produit disponible dans cette catégorie.</p>
                @endforelse
            </div>
        </main>
        <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>
</html>
