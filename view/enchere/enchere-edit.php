{{ include ('header.php', {title: 'Enchère'})}}

    <h2>Modifier l'enchère</h2>
    <form class="add" action="{{ path }}enchere/update" method="post">
        <input type="hidden" name="id" value="{{ enchere.id }}">
        <div class="form-item">
            <label>Dénomination</label>
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
    <form class="btns-box" action="{{path}}enchere/delete" method="post">
        <input type="hidden" name="id" value="{{ enchere.id }}"> 
        <input type="submit" value="Effacer">  
    </form>

{{ include ('footer.php')}}