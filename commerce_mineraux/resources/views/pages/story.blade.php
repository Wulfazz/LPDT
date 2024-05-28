<head>@include('components.head')</head>
<body>

    @include('components.menuhidden')

    <div class="content" id="app">
            <header>@include('components.header')</header>

            <main>
                <div class="story-container">
                    <div class="story-content">
                    <img src="{{ asset('img/story/story.jpg') }}" alt="Image de présentation" class="story-image">
                        <div class="story-text">
                            <h2>Mon Histoire</h2>
                            <p>Depuis des années, ma passion pour les minéraux n'a cessé de grandir.
                                Aujourd'hui, j'ai décidé de partager cette passion avec vous à travers ce site dédié aux pierres naturelles.
                                Chaque pierre est sélectionnée avec soin pour garantir votre satisfaction, que vous soyez collectionneur ou amateur de lithotérapie.
                                <br>
                                <br>
                                Chez nous, la passion des minéraux est notre moteur, et découvrir des pièces uniques est ce qui nous motive chaque jour.
                                Nous vous invitons à parcourir notre collection et à vous laisser surprendre par la beauté et la diversité des pierres que nous avons choisies avec amour.
                                <br>
                                <br>
                                Que vous soyez à la recherche d'un minéral pour votre collection ou d'une pierre qui vous apportera bien-être et harmonie, nous sommes là pour vous aider à trouver
                                ce que vous cherchez. Venez découvrir notre univers et partager cette passion avec nous.
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        
            <footer>@include('components.footer')</footer>
    </div>

    @include('components.scripts')
</body>

</html>
