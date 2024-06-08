<!DOCTYPE html>
<html lang="fr">
<head>
    @include('components.head')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
</head>
<body>
    @include('components.menuhidden')

    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <h1 class="shop-title">Bracelets</h1>

            <!-- Form for filtering by other category -->
            <form method="GET" action="{{ route('shop.bracelet') }}" class="filter-form">
                <label for="other_category_id">Filtrer par catégorie secondaire:</label>
                <select name="other_category_id" id="other_category_id" onchange="this.form.submit()">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" {{ request('other_category_id') == $category->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </form>

            <div class="products-grid">
                @forelse ($products as $product)
                    <div class="product-item" onclick="showProductDetails('{{ $product->name }}', '{{ $product->details }}', '{{ $product->price }}', '{{ $product->image_url }}')">
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

    <!-- Popup Modal Structure -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Product Image">
            <h2 id="modalName"></h2>
            <p id="modalPrice"></p>
            <p id="modalDetails"></p>
        </div>
    </div>

    @include('components.scripts')

    <!-- JavaScript for Modal -->
    <script>
        function showProductDetails(name, details, price, imageUrl) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalDetails').textContent = details;
            document.getElementById('modalPrice').textContent = 'Prix: ' + price + ' €';
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('productModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('productModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>
