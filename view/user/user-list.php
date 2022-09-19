{{ include ('header.php', {title: 'Utilisateurs'})}}

    <h2>Liste des utilisateurs</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Privilège</th>
        </tr>
        {% for utilisateur in utilisateurs %}
        <tr>
            <td>{{ utilisateur.nom }}</td>
            <td>{{ utilisateur.courriel }}</td>
            <td>{{ utilisateur.idPrivilege }}</td>
        </tr>
        {% endfor %}
    </table>

{{ include ('footer.php')}}