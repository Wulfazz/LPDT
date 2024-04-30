<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <div class="contact-container">
                    <h2>CONTACT</h2>
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">Prénom :</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom :</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone :</label>
                            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
                        </div>
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="submit-button">Envoyer</button>
                    </form>
                </div>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')

</body>

</html>
