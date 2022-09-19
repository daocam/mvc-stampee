{{ include ('header.php', {title: 'Enchère'})}}

<nav aria-label="Breadcrumb" class="breadcrumb">
    <a href="{{ path }}home">Accueil</a>
    <span aria-current="page">Portail des enchères</span>
</nav>

<h2>Enchères</h2>

    <!-- Main -->
    <main class="main-catalogue">
    <aside class="filter">
        <div class="wrapper">
            <h2>Filtrer</h2>
            <div class="filter__encheres">
                <input type="checkbox" id="auction-current" name="auction-current">
                <label for="auction-current">Enchères en cours</label><br>
                <input type="checkbox" id="auction-passed" name="auction-passed" >
                <label for="auction-passed">Enchères passées</label><br>
                <input type="checkbox" id="certified" name="certified" >
                <label for="certified">Certifié</label><br>
                <label for="price">Prix</label><br>
                <input type="number" id="price" name="price"> - <input type="number" name="price"><br>
                <label for="year">Années</label><br>
                <input type="number" id="year" name="year" > - <input type="number" name="year" >
            </div>
        </div>
    </aside>

    <section class="encheres">
        <div class="wrapper">
            <h3>Enchères en cours</h3>

            <!-- Grille -->
            <div class="grid grid--1">

                <!-- Tuile -->
                {% for enchere in encheres %}
                    <article class="tile">
                        <a href="{{ path }}enchere/show/{{ enchere.id }}" class="tile__link">
                            <div class="tile__img-wrapper">
                                <img src="{{ path }}assets/uploads/{{ image.filename[0] }}" alt="{{ timbre.nom }}" class="tile__img">
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
    </section>
    </main>
{{ include ('footer.php')}}