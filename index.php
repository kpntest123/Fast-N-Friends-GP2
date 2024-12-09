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
    <p>Que ce soit pour aller étudier ou aller à un event, tu es au bon endroit !</p>
    <form class="search-form" action="<?php echo esc_url(get_permalink(get_page_by_path('search-results'))); ?>" method="get">
      <div class="form-group">
        <label for="from">De ?</label>
        <input type="text" id="from" name="from" placeholder="Entrez votre point de départ" required onkeyup="suggestCities(this.value, 'from')">
        <ul id="from-suggestions" class="suggestions-list"></ul>
      </div>
      <div class="form-group">
        <label for="to">Vers ?</label>
        <input type="text" id="to" name="to" placeholder="Entrez votre destination" required onkeyup="suggestCities(this.value, 'to')">
        <ul id="to-suggestions" class="suggestions-list"></ul>
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
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/vintage-car.svg" alt="Voiture vintage avec un arbre moderne">
  </div>
</section>



  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>

<!-- Les cards animés -->


  


<!-- Bloc 5 : FAQ : -->
<section class="why-us">
  <div style="display: flex ; justify-content: center;">
<h1>FAQ</h1>
</div>
<br><br>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="collapse-container">
        <!-- Button 1 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            L'inscription est t'elle gratuite ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse1">
            <div class="collapse-content">
                Oui ! Notre site internet est financé par la publicité donc vous pouvez vous inscrire gratuitement
            </div>
        </div>

        <!-- Button 2 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            Est il possible de personnaliser son profil ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse2">
            <div class="collapse-content">
                Oui, c'est totalement possible, il suffit de te rendre dans ta page profil et de cliquer sur le bouton 'modifie mes infos'
            </div>
        </div>

        <!-- Button 3 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            Est t'il possible d'ajouter un événement ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse3">
            <div class="collapse-content">
                Non, tu ne peux pas l'ajouter toi même par contre, n'hésite pas à nous contacter grâce à fastnfriends@gmail.com pour nous envoyer votre événement 
            </div>
        </div>

        <!-- Button 4 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            Fast'N Friends est disponible où ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse4">
            <div class="collapse-content">
Partout en belgique, de la campagne luxembourgeoise jusqu'a la Panne
            </div>
        </div>

        <!-- Button 5 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
            Pourquoi avoir créer Fast'N Friends ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse5">
            <div class="collapse-content">
                Car nous voulons, en tant qu'étudiant que ceux-ci puisse faire du co-voiturage et rencontrer des gens tout en conduisant
            </div>
        </div>
    </div>
</div>
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