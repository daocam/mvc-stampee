{{ include ('header.php', {title: 'Connexion'})}}

<h2>Connexion</h2>
{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}

<form class="add" action="{{path}}login/authentication" method="post">
    <div class="form-item">
        <label>Courriel</label>
        <input type="email" name="email" value="{{ utilisateur.email }}">
    </div>
    <div class="form-item">
        <label>Mot de passe</label>
        <input type="password" name="password" value="{{ utilisateur.password }}">
    </div>

    <input class="btn-sub" type="submit" value="Soumettre">
</form>

{{ include ('footer.php')}}