<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
</head>
<body>
    @include('components.menuhidden')
    <div class="content" id="app">
        <header>@include('components.header')</header>
        <main>
            <h1>Liste des produits</h1>
            <a href="{{ route('admin.products.create') }}">Ajouter un produit</a>
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }} - {{ $product->price }}€</li>
                @endforeach
            </ul>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
