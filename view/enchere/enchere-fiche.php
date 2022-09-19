{{ include ('header.php', {title: 'Enchère'})}}

<nav aria-label="Breadcrumb" class="breadcrumb">
    <a href="{{ path }}home">Accueil</a>
    <a href="{{ path }}enchere">Portail des enchères</a>
    <span aria-current="page">Fiche d'enchère</span>
</nav>

<!-- Main -->
<main class="placeholder">
    <h2>{{ enchere.nom }} - {{ timbre.date_create }}</h2>
    <div class="wrapper">
        <div class="tile-auction">
            <aside class="tile-auction__img-wrapper grid grid--1">
                <div class="tile-auction__img-item">
                    <img src="{{ path }}assets/uploads/{{ image.filename }}" alt="{{ timbre.nom }}" class="tile-auction__img">
                </div>
                <div class="tile-auction__img-item">
                    <img src="{{ path }}assets/uploads/{{ image.filename }}" alt="{{ timbre.nom }}" class="tile-auction__img">
                </div> 
                <div class="tile-auction__img-item">
                    <img src="{{ path }}assets/uploads/{{ image.filename }}" alt="{{ timbre.nom }}" class="tile-auction__img">
                </div> 
                <div class="tile-auction__img-item">
                    <img src="{{ path }}assets/uploads/{{ image.filename }}" alt="{{ timbre.nom }}" class="tile-auction__img">
                </div> 
            </aside>

            <!-- ref : https://codepen.io/markcaron/pen/MvGRYV Pure CSS Tabs -->
            <!-- Section -->
            <article class="tile-auction__text-wrapper">
                <div class="tabset">
                    <!-- Tab 1 -->
                    <input type="radio" name="tabset" id="tab1" aria-controls="enchere" checked>
                    <label for="tab1">Enchère</label>
                    <!-- Tab 2 -->
                    <input type="radio" name="tabset" id="tab2" aria-controls="detail">
                    <label for="tab2">Détails</label>

                    <div class="tab-panels">
                        <section class="tab-panel">
                            <p><strong>Période d'activité</strong></p>
                            <p><small>Date de début: {{ enchere.date_debut }}</small></p>
                            <p><small>Date de fin: {{ enchere.date_fin }}</small></p>
                            <p><strong>Prix plancher: {{ enchere.prix_plancher }}</strong></p>
                            <p><strong>Offre actuelle</strong></p>
                            <p><small>Prix: {{ prix_actuel }}</small> <i class="fas fa-gavel"></i></p>
                            <p><small>Nom du membre: {{ mise.idUtilisateur }}</small> <i class="fas fa-user"></i></p>
                            <p><strong>Quantité de mise: </strong>{{ mise.quantite }}</p>
                            <p><strong>Coups de coeur du Lord </strong>{{ enchere.favori }}</p>
                        </section>

                        <section class="tab-panel">
                            <p><strong>Nom</strong> <small>{{ enchere.nom }}</small></p>
                            <p><strong>Date de création</strong> <small>{{ timbre.date_create }}</small></p>
                            <p><strong>Couleur(s)</strong> <small>{{ timbre.couleurs }}</small></p>
                            <p><strong>Pays d'origine</strong> <small>{{ timbre.pays }}</small></p>
                            <p><strong>Condition</strong> <small>{{ timbre.conditions }}</small></p>
                            <p><strong>Tirage</strong> <small>{{ timbre.tirage }}</small></p>
                            <p><strong>Dimensions</strong>  <small>{{ timbre.dimensions }} pouces</small></p>
                            <p><strong>Certifié</strong> <small>{{ timbre.certfie }}</small></p>
                        </section>
                    </div>
                </div>
            </article>
        </div>
    </div>

    
    {% if guest %}
    {% else %}
    <ul class="btns-box">
        <a href="{{path}}enchere/show/{{enchere.id}}">Modifier</a>
    </ul>
    <form class="sup" action="{{path}}enchere/delete" method="post">
        <input type="hidden" name="id" value="{{ enchere.id }}"> 
        <input  type="submit" value="Supprimer">  
    </form>
    {% endif %}

    </main>

{{ include ('footer.php')}}