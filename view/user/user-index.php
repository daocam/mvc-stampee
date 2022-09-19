{{ include ('header.php', {title: 'Utilisateur'})}}

    <h2>Utilisateurs</h2>
    <ul class="btns-box">
        <a href='{{ path }}user/list'>Liste</a>
        <a href='{{ path }}user/create'>Ajouter</a>
    </ul>

{{ include ('footer.php')}}

