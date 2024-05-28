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
            <h1>Panneau Admin</h1>
        </main>
        <footer>@include('components.footer')</footer>
    </div>
    @include('components.scripts')
</body>
</html>
