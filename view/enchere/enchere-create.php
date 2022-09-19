{{ include ('header.php', {title: 'Enchère'})}}

    <h2>Nouvelle enchère</h2>
    {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
    {% endif %}

    <form class="add" action="{{ path }}enchere/store" method="post">
        <input type="hidden" name="prix_actuel" value="0">
        <input type="hidden" name="favori" value="non">
        
        <div class="form-item">
            <label for="idTimbre">Timbre</label>
            <select name="idTimbre" id="idTimbre">
                {% for timbre in timbres %}
                <option value="{{ timbre.id }}" selected>{{ timbre.nom }}</option>
                {% endfor %}
            </select>
        </div> 
        <div class="form-item">
            <label>Nom</label>
            <input type="text" name="nom" value="{{ enchere.nom }}" required>
        </div>
        <div class="form-item">
            <label>Date de début</label>
            <input type="date" name="date_debut" value="{{ enchere.date_debut }}" required>
        </div>
        <div class="form-item">
            <label>Date de fin</label>
            <input type="date" name="date_fin" value="{{ enchere.date_fin }}" required>
        </div>
        <div class="form-item">
            <label>Prix plancher</label>
            <input type="text" name="prix_plancher" value="{{ enchere.prix_plancher }}" required>
        </div>

        <input class="btn-sub" type="submit" value="Soumettre">
    </form>

    <ul class="btns-box">
        <a href="{{ path }}timbre/create">Ajouter un timbre</a>
    </ul>

{{ include ('footer.php')}}