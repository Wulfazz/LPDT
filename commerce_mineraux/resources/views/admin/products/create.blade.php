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
            <h1>Ajouter un produit</h1>
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nom du produit :</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
