<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fast 'N Friends</title>

    <link rel="shortcut icon" src="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF_logos_svg" type="image/x-icon">


      <!--
    TEMPORAIRE : LIEN POUR LA POLICE FUTURA PT, DANS LE FUTUR INTEGRER LES FICHIERS COMPLETS
    qui se trouvent déjà dans les ASSETS 
    
    POLICE POUR LE FUTURA PT :  -->
    <link rel="stylesheet" href="https://use.typekit.net/uah5lqa.css"> 

    <!-- LIEN POUR LA MUSEO MODERNO ==> logo + recher sur accueil :  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Jost:ital,wght@0,100..900;1,100..900&family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



  <!--
    FAUDRAIT LINK LE FICHIER APP CSS, POUR LINSTANT TOUT EST DANS LE HEADER
    -->



    <style>
        /* Style global : 
        ==> Problème majeur, les tailles de police, c'est la merde, la grosse merde, rien ne va !
        */

        /* STYLE POUR MUSEO MODERNO, JSP A QUOI CELA SERT !*/

.museomoderno-<uniquifier> {
  font-family: "MuseoModerno", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Futura-PT", sans-serif;
}

body {
  background-color: #ffffff;
  color: #000000;
}

p {
  font-style: normal;
  font-size: 20px;  
}

/* Styles des titres */
.titre-1-classic {
  font-style: normal;
  font-size: 26px; /* Réduit de 32px à 26px pour correspondre au H1 de la navbar */
}

.titre-2-classic {
  font-style: normal;
  font-size: 20px; /* Réduit de 24px à 20px */
}

.titre-3-classic {
  font-style: normal;
  font-size: 16px; /* Réduit de 20px à 16px */
}

/* Style de la barre de navigation */
    /* Navbar globale */

    .custom-navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Logo */
    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo-container img {
      height: 32px;
      margin-right: 8px;
    }

    .logo-container span {
      font-size: 20px;
      font-weight: bold;
      color: #4B9BEB;
    }

    /* Liens de navigation */
    .nav-links {
      display: flex;
      align-items: center;
      gap: 20px;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: #000;
      display: flex;
      align-items: center;
    }

    .nav-links img {
      width: 25px; /* Ajustez ici la taille selon vos besoins */
      height: 25px; /* Ajustez ici la taille selon vos besoins */
      margin-left: 10px;
      margin-right: 5px;
    }

    /* Bouton S'inscrire */
    .btn-primary {
      background-color: #4B9BEB;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #4B9BEB;
    }

    /* Menu hamburger */
    .hamburger {
      display: none;
      cursor: pointer;
    }

    .hamburger img {
      width: 24px;
      height: 24px;
    }

/* Bloc 1 : Titre et description */
.intro {
  text-align: center;
  background-color: #4B9BEB;
  font-size: 1.25rem; /* Réduit de 24px à 20px */
  padding: 1.875rem 0.9375rem; /* Réduit de 40px 20px à 30px 15px */
}

.intro p {
  font-size: 1rem; /* Réduit de 20px à 16px */
  color: #000000;
}

.intro h1 {
  font-size: 1.625rem; /* Réduit de 24px à 20px */
  color: #000000;
  font-style: normal;
  margin-bottom: 1.875rem;
}

/* Bloc 2 : Image et module de recherche */
.search-section {
  position: relative;
  text-align: center;
  padding: 0;
  width: 100%;
  height: 70vh; /* AJUSTEMENT DE TOUT LE BLOC !!!*/
}

.search-section .car-image {
  width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
}

.search-section .car-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 0;
}

.search-bar {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  max-width: 1200px;
  display: flex;
  gap: 0.625rem;
  padding: 0.9375rem;
  border-radius: 1.875rem;
  box-shadow: 0 0.125rem 0.625rem rgba(0, 0, 0, 0.1);
}

.search-bar > * {
  flex: 1;
  min-width: 0;
}

.search-bar input[type="text"],
.search-bar input[type="number"],
.search-bar input[type="date"] {
  padding: 0.75rem 1rem;
  border: 1px solid #ddd;
  font-size: 1rem;
  outline: none;
  border-radius: 1.5625rem;
  width: 100%;
  background: white;
}

.search-bar button.btn-search {
  padding: 0.75rem 1.5rem;
  background-color: #4B9BEB;
  color: #000000;
  border: none;
  font-size: 1rem;
  cursor: pointer;
  outline: none;
  border-radius: 1.5625rem;
  white-space: nowrap;
  flex: 0 0 auto;
  transition: background-color 0.3s;
}

.search-bar button.btn-search:hover {
  background-color: #4B9BEB;
}

.autocomplete-suggestions {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: white;
  border-radius: 0.9375rem;
  box-shadow: 0 0.125rem 0.625rem rgba(0, 0, 0, 0.1);
  margin-top: 0.3125rem;
  z-index: 1000;
}

.autocomplete-suggestions div {
  padding: 0.625rem;
  cursor: pointer;
}

.autocomplete-suggestions div:hover {
  background-color: #4B9BEB;
}

.note {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Fond noir semi-transparent */
  color: white;
  padding: 0.3125rem;
  text-align: center;
}

/* Bloc 3 : Titre et chiffre */
.stats {
  text-align: center;
  background-color: #4B9BEB;
  padding: 45px 15px; /* Réduit de 60px 20px à 45px 15px */
}

.stats h1 {
  font-size: 26px; /* Réduit de 24px à 20px */
  color: #000000;
  margin-bottom: 16px; /* Réduit de 20px à 16px */
}

.stats .number {
  font-size: 190px; /* Réduit de 96px à 72px */
  color: #000000;
  margin-bottom: 8px; /* Réduit de 10px à 8px */
}

.stats p {
  font-size: 16px;
  color: #000000;
}

/*Bloc 4 : Les cartes*/
.lescardsecolos {
  text-align: center;
  background-color: #ffffff;
  padding: 30px 15px;
}

.lescardsecolos p {
  font-size: 16px; 
  color: #000000;
}

.lescardsecolos h1 {
  font-size: 26px; 
  color: #000000;
  font-style: normal;
  margin-bottom: 30px;
}

/*Bloc 5 : Pourquoi nous ?*/
.why-us {
  text-align: center;
  background-color: #4B9BEB;
  padding: 30px 15px;
}

.why-us p {
  font-size: 16px; /* Réduit de 20px à 16px */
  color: #000000;
}

.why-us h1 {
  font-size: 26px; /* Réduit de 24px à 20px */
  color: #000000;
  font-style: normal;
  margin-bottom: 30px;
}

/*Bloc 6 */
.bloc6 {
  text-align: center;
  background-color: #ffffff;
  padding: 30px 15px;
}

.bloc6 p {
  font-size: 16px; 
  color: #000000;
}

.bloc6 h1 {
  font-size: 26px; 
  color: #000000;
  font-style: normal;
  margin-bottom: 30px;
}

/*

STYLE POUR LE FICHIER, LA PAGE D'INSCRIPTION !

*/

/* Style général pour le formulaire */
.inscription-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9; /* Fond clair */
    border: 1px solid #ddd; /* Bordure légère */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

.inscription-form h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Style des champs */
.inscription-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.inscription-form input[type="text"],
.inscription-form input[type="email"],
.inscription-form input[type="password"],
.inscription-form input[type="tel"],
.inscription-form input[type="date"],
.inscription-form textarea,
.inscription-form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    background-color: #fff;
    transition: border-color 0.2s;
}

.inscription-form input[type="text"]:focus,
.inscription-form input[type="email"]:focus,
.inscription-form input[type="password"]:focus,
.inscription-form input[type="tel"]:focus,
.inscription-form input[type="date"]:focus,
.inscription-form textarea:focus {
    border-color: #007BFF;
    outline: none;
}

/* Style des boutons radio et cases à cocher */
.inscription-form input[type="radio"],
.inscription-form input[type="checkbox"] {
    margin-right: 10px;
}

.inscription-form div {
    margin-bottom: 15px;
}

/* Style du bouton */
.inscription-form input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4B9BEB; /* Bleu */
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

.inscription-form input[type="submit"]:hover {
    background-color: #4B9BEB;
}

/* Style pour les messages d'erreur */
.error-message {
    color: #d9534f;
    background-color: #4B9BEB;
    border: 1px solid #ebccd1;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    text-align: center;
}

/* Style du textarea */
.inscription-form textarea {
    height: 100px;
    resize: vertical;
}

/* Style spécifique à la photo de profil */
.inscription-form input[type="file"] {
    margin-top: 10px;
}

/* Style des conditions et newsletter */
.inscription-form div:last-child {
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 14px;
}

/* Alignement des genres */
.inscription-form div input[type="radio"] {
    margin: 0;
    margin-right: 5px;
}






/* PAGE 404 ! */
.error-page {
    text-align: center;
    padding: 100px 50px;
    background-color: #4B9BEB;
}

.error-404 {
    max-width: 500px;
    margin: 0 auto;
}

/* Image styling */
.car-accident {
    width: 100%;
    max-width: 300px;
    margin: 0 auto 30px;
    display: block;
}

/* Title and message */
.page-title {
    font-size: 32px;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

.error-message {
    font-size: 18px;
    color: #666;
    margin-bottom: 30px;
    line-height: 1.6;
}

/* Search form styling */
.search-form-wrapper {
    margin-bottom: 30px;
}

.search-form input[type="search"] {
    width: 100%;
    max-width: 400px

/* PARTIE RESPONSIVE */
@media (max-width: 840px) {
  /* Navigation */
  .nav-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 60px;
    right: 20px;
    background: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 10;
    gap: 10px; /* Ajuster l'espacement entre les éléments */
  }

  .nav-links.show {
    display: flex;
  }

  .hamburger {
    display: block;
  }

  /* Cacher les icônes dans le menu hamburger */
  .nav-links img {
    display: none;
  }

  /* Retirer le style du bouton "S'inscrire" */
  .btn-primary {
    background-color: transparent; /* Retirer la couleur de fond */
    color: black; /* Texte noir ou neutre */
    padding: 0; /* Supprimer le padding */
    border: none; /* Retirer les bordures */
    font-weight: normal; /* Texte non gras */
  }

  /* Texte "Fast 'N Friends" */
  #fast-n-friends {
    font-size: 26px;
    font-weight: bold;
    font-family: MuseoModerno;
  }

  /* Bloc introduction */
  .intro {
    padding: 1.5rem 0.75rem;
  }

  .intro p {
    font-size: 16px;
    color: #000000;
  }

  .intro h1 {
    font-size: 30px;
    color: #000000;
    font-style: normal;
    margin-bottom: 1.875rem;
  }

  /* Barre de recherche */
  .search-bar {
    width: 95%;
    flex-direction: column;
  }

  .search-bar > * {
    flex-basis: auto;
  }

  .search-bar input[type="text"],
  .search-bar input[type="number"],
  .search-bar input[type="date"] {
    font-size: 0.9375rem;
    padding: 0.625rem 0.875rem;
  }

  .search-bar button.btn-search {
    font-size: 0.9375rem;
    padding: 0.625rem 1.25rem;
  }
}


    </style>
    
</head>

<?php wp_head(); ?>

<!-- BARRE DE NAV -->

<nav class="custom-navbar">
  <div class="logo-container">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF_logo.svg" alt="Logo">
    <span id="fast-n-friends">Fast 'N Friends</span>
  </div>
  <div class="hamburger" id="hamburger-icon">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/hambruger_menu.svg" alt="Menu">
  </div>
  <ul class="nav-links" id="nav-links">
    <li>
      <a href="#">
        Événements partenaires
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/ico fiesta.svg" alt="Dropdown">
      </a>
    </li>
    <li>
      <a href="#">
        Rechercher
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/Loupe de recherche.svg" alt="Search">
      </a>
    </li>
    <li><a href=">">Se connecter</a></li>
    <li><a class="btn-primary" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/register/'; ?>">S'inscrire</a></li>
    </ul>
</nav>


<body> <?php body_class(); ?>>