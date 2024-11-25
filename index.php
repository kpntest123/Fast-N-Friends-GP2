 <?php get_header(); ?>

<!-- CEST LA PAGE DACCUEIL ICI, la page de base, une page basifiée--> 

<!-- LA BARRE DE NAV SE TROUVE DANS LE HEADER -->


  <!-- Bloc 1 : Titre et description, blabla agicheur -->
  <section class="intro">
    <h1>Ici, c'ets le texte en 42, bienvenu gros con !</h1>
    <p>C'est du 30 normalement, si tout va bien ! ? ou - suis je ?</p>
  </section>

  <!-- Bloc 2 : Image et module de recherche -->
  <section class="search-section">
    <div class="car-image">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/voitureback.jpg" alt="Bannière d'une voiture, IA">
    </div>
    <form class="search-bar" action="<?php echo site_url('/search/'); ?>" method="GET">
  <div>
    <input type="text" name="from" id="from-input" placeholder="De ?*" required />
    <div class="autocomplete-suggestions" id="from-suggestions"></div>
  </div>
  <div>
    <input type="text" name="to" id="to-input" placeholder="Vers ?" required />
    <div class="autocomplete-suggestions" id="to-suggestions"></div>
  </div>
  <input type="number" name="people" placeholder="Pour combien de personnes ?" required />
  <input type="date" name="date" required />
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