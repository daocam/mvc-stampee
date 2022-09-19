{{ include ('header.php', {title: 'Home'})}}

<main>
<h2 class="welcome">Bienvenue chez le Lord !</h2>

<div class="currently">
    <h3>Enchères en cours</h3>
    <div class="grid grid--3">
        <!-- Tuile -->
        {% for enchere in encheres %}
            <article class="tile">
                <a href="{{ path }}enchere/show/{{ enchere.id }}" class="tile__link">
                    <div class="tile__img-wrapper">
                        <img src="{{ path }}assets/uploads/{{ image.filename }}" alt="{{ timbre.nom }}" class="tile__img">
                    </div>
                    <div class="tile__text-wrapper">
                        <h3 class="tile__title">{{ enchere.nom }} - {{ timbre.date_creation }}</h3>
                        <p class="tile__countdown">Début : {{ enchere.date_debut }}</p>
                        <p class="tile__countdown">Fin : {{ enchere.date_fin }}</p>
                        <p class="tile__countdown">Actuel : {{ enchere.prix_actuel }}$ | Mise : {{ mise.quantite }}</p> 
                        <p class="tile__countdown">Membre : {{ mise.idUtilisateur }}</p> 
                    </div>
                </a>
            </article>
        {% endfor %}
    </div>
</div>

<!-- Lord Stampee resume -->
<div class="lord">
    <div class="lord__img-wrapper">
        <img src="{{ path }}assets/img/lord-stampee.png" alt="le lord">
    </div>
    <div class="lord__text-wrapper">
        <h3 class="text-2">A propos du</h3>
        <h3  class="text-2">Lord Reginald Stampee</h3>
        <p class="lord-text">Lord Reginald Stampee, duc de Worcessteshear et philatéliste depuis sa tendre enfance au milieu des années cinquante, vous a choisi pour le développement d’une plateforme d’enchères de timbres.</p>
        <p class="lord-text"> Depuis plusieurs années, Lord Stampee caresse-t-il l’idée de faire le pas dans le numérique et étendre au-delà du Royaume-Uni ses fameuses enchères de timbres qui font accourir les plus grands philatélistes du monde.</p>
        
        <button class="btn-1">Plus d'infos</button>
    </div>
</div>


<div class="news">
    <h3>Actualités</h3>
    <div class="grid grid--1">
        <article class="tile">
            <a href="#" class="tile__link">
                <div class="tile__img-wrapper">
                    <img src="{{ path }}assets/img/timbre-can.jpeg" alt="#" class="tile__img">
                </div>
                <div class="tile__text-wrapper">
                    <h3 class="tile__title">Les timbres canadiens à l'honneur</h3>
                    <div class="btn-1">Voir l'article</div>
                </div>
            </a>
        </article>

        <!-- Tuile -->
        <article class="tile">
            <a href="#" class="tile__link">
                <div class="tile__img-wrapper">
                    <img src="{{ path }}assets/img/commencer-phil.jpeg" alt="#" class="tile__img">
                </div>
                <div class="tile__text-wrapper">
                    <h3 class="tile__title">Comment débuter la philatélie</h3>
                    <div class="btn-1">Voir l'article</div>
                </div>
            </a>
        </article>

        <!-- Tuile -->
        <article class="tile">
            <a href="#" class="tile__link">
                <div class="tile__img-wrapper">
                    <img src="{{ path }}assets/img/philateliste.jpeg" alt="#" class="tile__img">
                </div>
                <div class="tile__text-wrapper">
                    <h3 class="tile__title">Interview d'un philatéliste</h3>
                    <div class="btn-1">Voir l'article</div> 
                </div>
            </a>
        </article>
    </div>
</div>

</main>
{{ include ('footer.php')}}

