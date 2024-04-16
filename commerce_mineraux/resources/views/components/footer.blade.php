<footer id="footer" class="footer">
    <div class="infos">
        <div class="footer-section">
            <h4>Informations</h4>
            <ul>
                <li><a href="{{ url('/shipping') }}">> Livraison</a></li>
                <li><a href="{{ url('/legal-notice') }}">> Mentions Légales</a></li>
                <li><a href="{{ url('/terms') }}">> Conditions générales de vente</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Contact</h4>
            <ul>
                <li><img src="{{ asset('img/iconePhone.png') }}" alt="Téléphone" class="icon">06.28.56.08.70</li>
                <li>contact@lpdterre.fr</li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Réseaux</h4>
            <ul>
                <li><a href="{{ url('https://www.facebook.com/profile.php?id=100064659552834') }}"><img src="{{ asset('img/iconeFacebook.png') }}" alt="Facebook" class="icon">Facebook</a></li>
                <div class="footer-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/LPDT-footer.jpg') }}" alt="Logo">
                    </a>
                </div>
            </ul>
        </div>

    </div>

    <p id="copyrights">© 2024 Les pierres de la Terre. Tous droits réservés.</p>
</footer>

<!-- Vous pouvez ajouter vos propres icônes ou utiliser une bibliothèque comme FontAwesome pour les icônes d'adresse, de téléphone, d'e-mail et de Facebook. -->
