{{ include ('header.php', {title: 'User'})}}

<h2>Nouvel utilisateur</h2>
{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}
<form class="add" action="{{ path }}user/store" method="post">
    <input type="hidden" name="idPrivilege" value="1">
    <div class="form-item">
        <label>Nom</label>
        <input type="text" name="nom" value="{{ utilisateur.nom }}" required>
    </div>
    <div class="form-item">
        <label>Courriel</label>
        <input type="email" name="email" value="{{ utilisateur.email }}" required>
    </div>
    <div class="form-item">
        <label>Mot de passe</label>
        <input type="password" name="password" value="{{ utilisateur.password }}" required>
    </div>

    <input class="btn-sub" type="submit" value="Soumettre">
</form>
        
{{ include ('footer.php')}}
