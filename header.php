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





                                        <!--LIEN POUR UN CALENDRIER + joli -->
                                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




    <style>
        /* Style global : 
        ==> Pëoblème majeur, les tailles de police, c'est la merde, la grosse merde, rien ne va !
        */
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
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* A supp si on veux pas de "ligne" shadow de la navbar ! */
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

    /* Responsiveness */
    @media (max-width: 768px) {
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

  /* Aligner proprement le menu dans le mode hamburger */
  .nav-links {
    gap: 10px; /* Ajuster l'espacement entre les éléments */
  }
    }

    /* Texte "Fast 'N Friends" */
    #fast-n-friends {
      font-size: 30px;
      font-weight: bold;
      font-family: MuseoModerno;
      text-decoration: none; /* Supprime le soulignement et le style dégeu de base*/
      color: #4B9BEB;
    }

/* STYLE POUR LA BARRE DE NAV QUAND CONNECTE*/
/* Menu principal */
.account-icon {
  position: relative;
}

/* Sous-menu masqué par défaut */
.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 10;
}

/* Style des liens dans le sous-menu */
.dropdown-menu li {
  list-style: none;
}

.dropdown-menu li a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 15px;
  text-decoration: none;
  font-size: 14px;
  color: #333;
  transition: background 0.3s;
}

.dropdown-menu li a:hover {
  background: #f0f0f0;
  color: #000;
}

/* Icônes dans les sous-menus */
.dropdown-menu li img {
  width: 20px;
  height: 20px;
}

/* Afficher le sous-menu au survol */
.account-icon:hover .dropdown-menu {
  display: block;
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






/*PARTIE BLOC 2 : IMAGE ET BARRE DE RECHERCHE*/

.search-section {
  background-color: #4B9BEB;
  padding: 2rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

.search-container {
  width: 100%;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  color: #333;

  max-width: 600px; /* Augmentation de la largeur maximale du conteneur */
  width: 100%; /* Le conteneur prend toute la largeur disponible */
  padding: 2rem; /* Réduction du padding pour un rendu plus compact */
}

.search-form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 1rem;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-size: 0.875rem;
  margin-bottom: 0.5rem;
}

.form-group input {
  padding: 0.75rem 1rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1rem;
}

.search-button {
  grid-column: 1 / -1;
  padding: 1rem 2rem;
  background-color: #4B9BEB;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 1.2rem;
  cursor: pointer;
}

.search-button:hover {
  background-color: #2b7aca;
}

.note {
  margin-top: 1rem;
  font-size: 0.875rem;
  color: rgba(0, 0, 0, 0.5);
}

.image-container {
  flex: 0 0 40%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image-container img {
  max-width: 100%;
  height: auto;
  max-height: 400px;
  object-fit: contain;
}



/* Bloc 3 : Titre et chiffre */
.stats {
  text-align: center;
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

    </style>
    
</head>

<?php wp_head(); ?>

<!-- BARRE DE NAV -->

<nav class="custom-navbar">
<div class="logo-container">
    <a id="fast-n-friends" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/'; ?>">Fast 'N Friends</a>
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
      <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/deep-search/'; ?>">
        Rechercher
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/Loupe de recherche.svg" alt="Search">
      </a>
    </li>
    
    <?php if ( ! is_user_logged_in() ) : ?>
      <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/login/'; ?>">Se connecter</a></li>
      <li><a class="btn-primary" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/register/'; ?>">S'inscrire</a></li>
    <?php else : ?>
      <li class="account-icon dropdown">
        <a href="#" class="icon-animation">
          <div class="liquid-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/person.svg" alt="Mon Compte">
          </div>
          <span>Mon Compte</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/future-lien/'; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/chat.svg" alt="Chat">
              Chat
            </a>
          </li>
          <li>
                      <a href="<?php echo wp_logout_url( home_url() ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/logout.svg" alt="Déconnexion">
                Déconnexion
            </a>
          </li>
          <li>
            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/fast-n-friends-GP2/future-lien/'; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/id-card.svg" alt="Chat">
              Mon profil
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
  </ul>
</nav>





<body> <?php body_class(); ?>>