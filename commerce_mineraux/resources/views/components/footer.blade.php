<footer id="footer" class="footer">
    <div class="footer-section">
        <h4>Informations</h4>
        <ul>
            <li><a href="{{ url('/shipping') }}">> Livraison</a></li>
            <li><a href="{{ url('/legal-notice') }}">> Mentions Légales</a></li>
            <li><a href="{{ url('/terms') }}">> Conditions générales de vente</a></li>
            <li><a href="{{ url('/payments') }}">> Paiements sécurisés</a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h4>Contact</h4>
        <ul>
            <li><i class="icon-address"></i>Adresse</li>
            <li><i class="icon-phone"></i>Téléphone</li>
            <li><i class="icon-email"></i>Mail</li>
        </ul>
    </div>

    <div class="footer-section">
        <h4>Réseaux</h4>
        <ul>
            <li><a href="{{ url('/facebook') }}"><i class="icon-facebook"></i>Facebook</a></li>
        </ul>
    </div>

    <div class="footer-logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo">
        </a>
    </div>
    
    <p id="copyrights">© 2024 Les pierres de la Terre. Tous droits réservés.</p>
</footer>

<!-- Vous pouvez ajouter vos propres icônes ou utiliser une bibliothèque comme FontAwesome pour les icônes d'adresse, de téléphone, d'e-mail et de Facebook. -->
