<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daouda CAMARA - 2195833">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ path }}assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a5ca57e131.js" crossorigin="anonymous"></script>

    <title>{{ title }}</title>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="wrapper-small">
            <a class="wrapper-logo" href="{{ path }}home">
                <img src="{{ path }}assets/img/logo-2.png" alt="logo" class="img-logo">
            </a>
            <form class="search-bar">
                <input class="search-bar__input" type="search" placeholder="Rechercher un timbre">
                <button class="search-bar__button" type="submit"><i class="fas fa-search"></i></button>  
            </form>

            <!-- Navigation -->
            <nav class="navbar">
                <a class="navbar__item" href="{{path}}enchere">Enchères</a>
                {% if guest %}
                    <a class="navbar__item" href="{{ path }}login">Se connecter</a>
                    <a class="navbar__item" href='{{ path }}user/create'>Devenir membre</a>
                {% else %}
                    <a class="navbar__item" href="{{path}}user" title="Mon compte"><i class="fas fa-user-circle"></i></a>
                    <a class="navbar__item" href="{{path}}login/logout">Se déconnecter</a>
                    <a class="navbar__item navbar__auction" href="{{ path }}enchere/create" title="Créer une enchère"><i class="fas fa-gavel"></i></a>
                {% endif %}
            </nav>
        </div>
    </header>
   
    