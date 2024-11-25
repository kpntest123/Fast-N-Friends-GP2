 <?php get_header(); ?>

<!-- CEST LA PAGE DACCUEIL ICI, la page de base, une page basifiée--> 

  <!-- NOUVELLE BARRE DE NAV - Barre de navigation -->
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
    <li><a href="#">Se connecter</a></li>
    <li><a href="#" class="btn-primary">S'inscrire</a></li>
  </ul>
</nav>

  <!-- Bloc 1 : Titre et description, blabla agicheur -->
  <section class="intro">
    <h1>Ici, c'ets le texte en 42, bienvenu gros con !</h1>
    <p>C'est du 30 normalement, si tout va bien !</p>
  </section>

  <!-- Bloc 2 : Image et module de recherche -->
  <section class="search-section">
    <div class="car-image">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/voitureback.jpg" alt="Bannière d'une voiture, IA">
    </div>
    <form class="search-bar" action="#" method="GET">
      <div>
        <input type="text" id="from-input" placeholder="De ?*" required />
        <div class="autocomplete-suggestions" id="from-suggestions"></div>
      </div>
      <div>
        <input type="text" id="to-input" placeholder="Vers ?" required />
        <div class="autocomplete-suggestions" id="to-suggestions"></div>
      </div>
      <input type="number" placeholder="Pour combien de personnes ?" required />
      <input type="date" required />
      <button class="btn-search">Chercher !</button>
    </form>
    <i class="note">*Malheureusement, n'est disponible que dans 500 grandes villes en Belgique</i>
  </section>


  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>

<!-- Bloc 4 : les réels avanatages du co-voiturage -->
<section class="lescardsecolos">
  <h1>Quels sont les réels avantages du covoiturage ?</h1>
  <p>Lorem Lorem Lorem ??</p>
</section>

  


<!-- Bloc 5 : Pourquoi choisir Fast 'N Friends -->
<section class="why-us">
  <h1>Pourquoi nous choisir nous ?</h1>
  <p>Lorem Lorem Lorem ??</p>
</section>

<!-- Bloc 6 -->
<section class="bloc6">
  <h1>Lorem or IMG</h1>
  <p>IMG ????????????? IMG ????????????? </p>
</section>


  <!-- Bloc ??? : TEST EN TOUT GENRE -->
  <h1 class="titre-1-classic">Test - taille de titre</h1>
  <h2 class="titre-2-classic">Test - taille de titre</h2>
  <h3 class="titre-3-classic">Test - taille de titre</h3>

  <?php get_footer(); ?>