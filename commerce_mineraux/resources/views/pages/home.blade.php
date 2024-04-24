<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <!-- Section intro -->
                <section class="intro">
                    <div>
                        <img src="{{ asset('img/home/LPDT-home.jpg') }}" alt="">
                    </div>
                    <p>
                        La passion des minéraux, vente de minéraux et bijoux.
                        <br>
                        Ici, vous allez découvrir une collection sélectionnée par 
                        une passionnée de minéraux.
                    </p>
                </section>

                <!-- Section catalogue -->
                <section class="catalog">
                    <h2>NOTRE CATALOGUE DE MINERAUX</h2>
                    <div class="cat-container"> <!-- Conteneur pour les éléments cat -->
                        <div class="cat">
                            <img src="{{ asset('img/home/brute.jpg') }}" alt="Minéraux brutes">
                            <button>Minéraux brutes</button>
                        </div>

                        <div class="cat">
                            <img src="{{ asset('img/home/pierres.jpg') }}" alt="Pierres taillées">
                            <button>Pierres taillées</button>
                        </div>

                        <div class="cat">
                            <img src="{{ asset('img/home/bracelets.jpg') }}" alt="Bracelets">
                            <button>Bracelets</button>
                        </div>

                        <div class="cat">
                            <img src="{{ asset('img/home/pendentifs.jpg') }}" alt="Pendentifs">
                            <button>Pendentifs</button>
                        </div>
                    </div>
                </section >

                <!-- Section verifs / paiements -->
                <section class="icons">
                    <div class="verifs">
                        <div>
                            <img src="{{ asset('img/home/diamant.png') }}" alt="100% naturelles">
                            <p>100% naturelles</p>
                        </div>
                        <div>
                            <img src="{{ asset('img/home/visa.png') }}" alt="Paiements sécurisés">
                            <p>Paiements sécurisés</p>
                        </div>
                        <div>
                            <img src="{{ asset('img/home/livraison.png') }}" alt="Retour et livraison">
                            <p>Retour et livraison soignée</p>
                        </div>
                    </div>
                    <div class="payments">
                        <div>
                            <img src="{{ asset('img/home/cheque.png') }}" alt="Chèque">
                            <p>Paiement par chèque</p>
                        </div>
                        <div>
                            <img src="{{ asset('img/home/paypal.png') }}" alt="Paypal">
                            <p>Paiement Paypal</p>
                        </div>
                        <div>
                            <img src="{{ asset('img/home/virement.png') }}" alt="Virement">
                            <p>Paiement par virement</p>
                        </div>
                    </div>
                </section>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
    
</body>

</html>
