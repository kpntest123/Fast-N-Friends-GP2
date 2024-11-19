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







    <style>
        /* Style global : */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Futura-PT", sans-serif;
  background-color: #ffffff;
  color: #000000;
}

p {
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 16px; /* Réduit de 20px à 16px */
}

/* Styles des titres */
.titre-1-classic {
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 26px; /* Réduit de 32px à 26px pour correspondre au H1 de la navbar */
}

.titre-2-classic {
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 20px; /* Réduit de 24px à 20px */
}

.titre-3-classic {
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 16px; /* Réduit de 20px à 16px */
}

/* Style de la barre de navigation */
header {
  background-color: #ffffff;
  color: #000000;
  padding: 15px; /* Réduit de 20px à 15px comme dans la navbar */
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo-container {
  display: flex;
  align-items: center;
}

.logo-container img {
  height: 35px; /* Réduit de 40px à 35px comme dans la navbar */
  margin-left: 15px;
}

.logo-container h1 {
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 26px;
  color: #F6BF48;
}

nav ul {
  list-style-type: none;
  display: flex;
  align-items: center;
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  font-size: 16px; /* Réduit de 18px à 14px comme dans la navbar */
}

nav ul li {
  margin-left: 25px; /* Réduit de 30px à 25px comme dans la navbar */
}

nav ul li a {
  color: #000000;
  text-decoration: none;
  display: flex;
  align-items: center;
}

.search-icon {
  height: 25px; /* Réduit de 30px à 25px comme dans la navbar */
  margin-right: 10px; /* Réduit de 8px à 6px */
}

.btn {
  padding: 8px 16px; /* Réduit de 10px 20px à 8px 16px */
  border-radius: 5px;
}

.btn-white {
  background-color: #ffffff;
  color: #000000;
  border: 2px solid black;
  border-radius: 12px; /* Réduit de 15px à 12px */
}

.btn-yellow {
  background-color: #F6BF48;
  color: #000000;
  border-radius: 12px; /* Réduit de 15px à 12px */
}

/* Bloc 1 : Titre et description */
.intro {
  text-align: center;
  background-color: #F6BF48;
  font-size: 20px; /* Réduit de 24px à 20px */
  padding: 30px 15px; /* Réduit de 40px 20px à 30px 15px */
}

.intro p {
  font-size: 16px; /* Réduit de 20px à 16px */
  color: #660000;
}

.intro h1 {
  font-size: 26px; /* Réduit de 24px à 20px */
  color: #000000;
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  margin-bottom: 30px;
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
  width: 80%;
  max-width: 1200px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.search-bar input[type="text"],
.search-bar input[type="number"],
.search-bar input[type="date"] {
  padding: 12px 16px; /* Ajout de padding à droite et gauche */
  border: none;
  font-size: 16px;
  outline: none;
  border-radius: 25px; /* Arrondi des coins */
  flex: 1; /* Permet à l'input de prendre tout l'espace disponible */
  margin-right: 8px; /* Espacement entre l'input et le bouton */
}

.search-bar button.btn-search {
  padding: 12px 16px;
  background-color: #F6BF48;
  color: #000000;
  border: none;
  font-size: 16px;
  cursor: pointer;
  outline: none;
  border-radius: 25px; /* Arrondi des coins */
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
  font-family: "Futura-PT", sans-serif;
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
  font-family: "Futura-PT", sans-serif;
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
  font-family: "Futura-PT", sans-serif;
  font-style: normal;
  margin-bottom: 30px;
}
    </style>
    
</head>

<body> <?php body_class(); ?>>