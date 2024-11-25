<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voyageons ensemble, connectés et solidaires / Fast 'N Friends</title>

  <!--
    TEMPORAIRE : LIEN POUR LA POLICE FUTURA PT, DANS LE FUTUR INTEGRER LES FICHIERS COMPLETS
    qui se trouvent déjà dans les ASSETS 
    -->

    <link rel="shortcut icon" href="Assets/Img/FNF_logo_background_removed.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.typekit.net/uah5lqa.css"> 


  <!--
    FAUDRAIT LINK LE FICHIER APP CSS, POUR LINSTANT TOUT EST DANS LE HEADER
    -->



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
      color: #4949FF;
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
      background-color: #4949FF;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #4949FF;
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
      font-size: 26px;
      font-weight: bold;
    }

/* Bloc 1 : Titre et description */
.intro {
  text-align: center;
  background-color: #F6BF48;
  font-size: 1.25rem; /* Réduit de 24px à 20px */
  padding: 1.875rem 0.9375rem; /* Réduit de 40px 20px à 30px 15px */
}

.intro p {
  font-size: 1rem; /* Réduit de 20px à 16px */
  color: #660000;
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
  height: 50vh;
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
  background-color: #F6BF48;
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
  background-color: #e5af37;
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
  background-color: #f5f5f5;
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

/* Responsive Adjustments du bloc 1 + bloc 2 */
@media (max-width: 768px) {
  .intro {
    font-size: 1rem;
    padding: 1.5rem 0.75rem;
  }

  .intro p {
  font-size: 0.624rem;
  color: #660000;
}

.intro h1 {
  font-size: 1rem;
  color: #000000;
  font-style: normal;
  margin-bottom: 1.875rem;
}


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

/* Bloc 3 : Titre et chiffre */
.stats {
  text-align: center;
  background-color: #F6BF48;
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
  background-color: #F6BF48;
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
    </style>
    
</head>

<?php wp_head(); ?>


<body> <?php body_class(); ?>>