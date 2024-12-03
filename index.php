 <?php get_header(); ?>

<!-- CEST LA PAGE DACCUEIL ICI, la page de base, une page basifiée--> 

<!-- LA BARRE DE NAV SE TROUVE DANS LE HEADER -->


  <!-- 

  Bloc 1 : Titre et description, blabla agicheur ==> nomalement ne pas garder le bloc ici,................
  <section class="intro">
    <h1>Ici, c'est le texte en 42 pixel desktop et mobile = 30 ???</h1>
    <p>Ici le texte doit etre en 30 sur desktop et sur mobile en 16 ????</p>
  </section>
  
  -->

  <!-- Bloc 2 : Image et module de recherche -->
  
<!-- Bloc de recherche avec le formulaire -->
<section class="search-section">
  <div class="search-container">
    <h1>Besoin de te déplacer ?</h1>
    <p>Que ce soit pour aller étudier ou aller à un event ? ou'r aat the right place !</p>
    <form class="search-form">
      <div class="form-group">
        <label for="from">De ?</label>
        <input type="text" id="from" name="from" placeholder="Entrez votre point de départ" required>
      </div>
      <div class="form-group">
        <label for="to">Vers ?</label>
        <input type="text" id="to" name="to" placeholder="Entrez votre destination" required>
      </div>
      <div class="form-group">
        <label for="people">Pour combien de personnes ?</label>
        <input type="number" id="people" name="people" min="1" required>
      </div>
      <div class="form-group">
        <label for="date">Quand ?</label>
        <input type="date" id="date" name="date" required>
      </div>
      <button type="submit" class="search-button">Chercher !</button>
    </form>
    <p class="note">*Malheureusement, n'est disponible que dans 500 grandes villes en Belgique</p>
  </div>
  <div class="image-container">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/vintage-car.svg" alt="Voiture vintage">
  </div>
</section>



  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>

<!-- Bloc 4 : les réels avanatages du co-voiturage -->
<section class="lescardsecolos">
  <h1>Pourquoi choisir Fast 'N Friends' ?</h1>
  

</div>
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