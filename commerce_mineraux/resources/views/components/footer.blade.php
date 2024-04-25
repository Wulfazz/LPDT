<footer id="footer" class="footer">
    <div class="infos">
        <div class="footer-section">
            <h4>Informations</h4>
            <ul>
                <li><a href="{{ url('/info/shipping') }}">> Livraison</a></li>
                <li><a href="{{ url('/info/legal-notice') }}">> Mentions Légales</a></li>
                <li><a href="{{ url('/info/terms') }}">> Conditions générales de vente</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Contact</h4>
            <ul>
                <li>06.28.56.08.70</li>
                <li>contact@lpdterre.fr</li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Réseaux</h4>
            <ul>
                <li><a href="{{ url('https://www.facebook.com/profile.php?id=100064659552834') }}"><img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="icon"></a>
                <a href="{{ url('https://www.instagram.com/lespierresdelaterre%3Figshid%3DOGQ5ZDc2ODk2ZA%3D%3D/?fbclid=IwZXh0bgNhZW0CMTAAAR2hje6r0qf3bKapP6aEZY5iPT792lAjAhetk6tA8Tb4yzpjp1uk6xfiKvg_aem_ATvP7fTorbCzS6p78CVnPVwExYrk0Q7GEU4HTAQa_wQFxOaOvx2FFST6fQZ7zq8UHYUjy5rql_c8Y1Z_RmEuhPa_') }}"><img src="{{ asset('img/instagram.png') }}" alt="Instagram" class="icon"></a></li>
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
