{{ include ('header.php', {title: 'Timbre'})}}

    <h2>Nouveau timbre</h2>
    {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
    {% endif %}
    <form class="add" action="{{ path }}timbre/store" enctype="multipart/form-data" method="post">

        <div class="form-item">
            <label for="image">Choisissez vos images:</label>
            <input id="image" name="filename" type="file"/>
        </div>
        <div class="form-item">
            <label>Dénomination</label>
            <input type="text" name="nom" value="{{ timbre.nom }}" required>
        </div>
        <div class="form-item">
            <label>Année de création</label>
            <input type="text" name="date_creation" value="{{ timbre.date_creation }}" required>
        </div>
        <div class="form-item">
            <label>Couleur(s)</label>
            <input type="text" name="couleurs" value="{{ timbre.couleurs }}" >
        </div>
        <div class="form-item">
            <label>Pays</label>
            <input type="text" name="pays" value="{{ timbre.pays }}" required>
        </div>
        <div class="form-item">
            <label for="conditions">Condition</label>
            <select name="conditions" id="conditions">
                <option value="parfaite">Parfaite</option>
                <option value="excellente">Excellente</option>
                <option value="bonne">Bonne</option>
                <option value="moyenne">Moyenne</option>
                <option value="endommage">Endommagé</option>
            </select>
        </div> 
        <div class="form-item">
            <label>Tirage</label>
            <input type="text" name="tirage" value="{{ timbre.tirage }}">
        </div>
        <div class="form-item">
            <label>Dimensions</label>
            <input type="text" name="dimensions" value="{{ timbre.dimensions }}">
        </div>
        <div class="form-item">
            <p>Certifié</p>
            <input type="radio" name="certifie" value="Oui" checked>
            <label>Oui</label><br><br>
            <input type="radio" name="certifie" value="Non">
            <label>Non</label><br><br>
        </div>

        <input class="btn-sub" type="submit" value="Soumettre">
    </form>

{{ include ('footer.php')}}