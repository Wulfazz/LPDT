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

                    <div class="cat">
                        <img src="{{ asset('img/home/brute.jpg') }}" alt="">
                        <button>
                            <p>Minéraux brutes</p>
                        </button>
                    </div>

                    <div class="cat">
                        <img src="{{ asset('img/home/pierres.jpg') }}" alt="">
                        <button>
                            <p>Pierres taillées</p>
                        </button>
                    </div>

                    <div class="cat">
                        <img src="{{ asset('img/home/bracelets.jpg') }}" alt="">
                        <button>
                            <p>Bracelets</p>
                        </button>
                    </div>

                    <div class="cat">
                        <img src="{{ asset('img/home/pendentifs.jpg') }}" alt="">
                        <button>
                            <p>Pendentifs</p>
                        </button>
                    </div>
                </section >

                <!-- Section verifs / paiements -->
                <section class="icons">
                    <div class="verifs">
                        <div>
                            <img src="" alt="">
                            <p>100% naturelles</p>
                        </div>
                        <div>
                            <img src="" alt="">
                            <p>Paiements sécurisés</p>
                        </div>
                        <div>
                            <img src="" alt="">
                            <p>Retours et livraison soignée</p>
                        </div>
                    </div>
                    <div class="payments">
                        <div>
                            <img src="" alt="">
                            <p>Paiement par chèque</p>
                        </div>
                        <div>
                            <img src="" alt="">
                            <p>Paiement Paypal</p>
                        </div>
                        <div>
                            <img src="" alt="">
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
