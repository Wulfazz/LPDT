<head>
    @include('components.head')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 5000; /* Increased z-index to ensure it's on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
            z-index: 5001; /* Slightly higher to ensure content is above the overlay */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #modalImage {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        #modalName {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        #modalPrice {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        #modalDetails {
            font-size: 1em;
        }
    </style>
</head>
<body>

    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <h1 class="shop-title">Minéraux Brutes</h1>

            <!-- Form for filtering by other category -->
            <form method="GET" action="{{ route('shop.minerals') }}" class="filter-form">
                <label for="other_category_id">Type de minéral :</label>
                <select name="other_category_id" id="other_category_id" onchange="this.form.submit()">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        @if ($category->mainProducts->isEmpty())
                            <option value="{{ $category->category_id }}" {{ request('other_category_id') == $category->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endif
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
