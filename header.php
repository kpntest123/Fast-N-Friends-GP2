
            <!-- Favicons + tab title -->
            <?php if (is_page('legal-notice')) : ?>
                <title>Mentions légales | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('partner-events')) : ?>
                <title>Événements partenaires | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('admin-add-a-event')) : ?>
                <title>Ajout d'événement | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('deep-search')) : ?>
                <title>Recherche avancée | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('search-results')) : ?>
                <title>Résultats de recherche | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('my-profil')) : ?>
                <title>Ton profil | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('add-a-traject')) : ?>
                <title>Ajouter un trajet | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('become-a-driver')) : ?>
                <title>Deviens conducteur | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('edit-my-profil')) : ?>
                <title>Modifier mes infos | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('register')) : ?>
                <title>S'enregistrer | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('login')) : ?>
                <title>Se connecter | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('home')) : ?>
                <title>Accueil | Fast 'N Friends</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php endif; ?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fast 'N Friends | Voyageons ensemble, connectés et solidaires !</title>

                <!-- Meta description :-->
                <?php if (is_page('legal-notice')) : ?>
                    <meta name="description" content="Tu veux connaître nos mentions légales ? Tout est ici, on te dit tout pour être transparent !">
                <?php elseif (is_page('partner-events')) : ?>
                    <meta name="description" content="Découvre tous les événements partenaires où tu pourrais te joindre. C'est le moment de faire de nouvelles rencontres !">
                <?php elseif (is_page('admin-add-a-event')) : ?>
                    <meta name="description" content="Ajoute ton événement ici. Fais bouger les choses et invite les autres à te rejoindre !">
                <?php elseif (is_page('deep-search')) : ?>
                    <meta name="description" content="Affûte ta recherche avec notre outil avancé. Trouve exactement ce que tu cherches en quelques clics !">
                <?php elseif (is_page('search-results')) : ?>
                    <meta name="description" content="Voici ce qu'on a trouvé pour toi. Parcours les résultats et trouve ce qui te correspond !">
                <?php elseif (is_page('my-profil')) : ?>
                    <meta name="description" content="C'est ton espace personnel. Mets à jour tes infos et personnalise ton profil ici !">
                <?php elseif (is_page('add-a-traject')) : ?>
                    <meta name="description" content="Propose un trajet et partage la route avec d'autres. C'est simple, rapide et convivial !">
                <?php elseif (is_page('become-a-driver')) : ?>
                    <meta name="description" content="Envie de devenir conducteur ? Fais le grand saut et emmène des passagers avec toi. On compte sur toi !">
                <?php elseif (is_page('edit-my-profil')) : ?>
                    <meta name="description" content="Modifie tes infos et garde ton profil à jour. Tout se passe ici, c'est rapide et facile !">
                <?php elseif (is_page('register')) : ?>
                    <meta name="description" content="Inscris-toi en quelques clics et commence ton aventure avec nous. Rejoins la communauté !">
                <?php elseif (is_page('login')) : ?>
                    <meta name="description" content="Connecte-toi pour accéder à ton compte et profiter de toutes les fonctionnalités du site.">
                <?php elseif (is_page('home')) : ?>
                    <meta name="description" content="Bienvenue chez Fast 'N Friends ! Découvre, partage et voyage avec nous. On t'attend sur la route !">
                <?php endif; ?>



</head>

<?php wp_head(); ?>

<!-- CECI EST LA BARRE DE NAV -->
<nav class="custom-navbar">
  <div class="logo-container">
    <a id="fnfheader" href="<?php echo home_url(); ?>">FAST 'N FRIENDS</a>
  </div>

  <!-- Icône du menu hamburger -->
  <div class="hamburger-menu" id="hamburger-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <div class="overlay" id="overlay">
    <ul class="nav-links" id="nav-links">
      <?php if (current_user_can('administrator')) : ?>
        <li>
          <a class="add-event" href="<?php echo home_url('/admin-add-a-event/'); ?>">
            ADMIN - Ajouter un event
          </a>
        </li>
      <?php endif; ?>

      <li>
        <a href="<?php echo home_url('/partner-event/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/fiesta.svg" alt="La fête">
          Événements partenaires
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('/deep-search/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/search-ico.svg" alt="Search">
          Rechercher
        </a>
      </li>

      <?php if ( ! is_user_logged_in() ) : ?>
        <li>
          <a class="btn-secondary" href="<?php echo home_url('/login/'); ?>">Se connecter</a>
        </li>
        <li>
          <a class="btn-primary" href="<?php echo home_url('/register/'); ?>" title="Tu fais le bon choix ! 🙃">Rejoinds l'aventure 🚀</a>
        </li>
      <?php else : ?>
        <li class="account-icon">
          <a href="#" class="icon-animation">
            <div class="liquid-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/person.svg" alt="Mon Compte">
            </div>
            <span>Mon Compte</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo home_url('/my-profil/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/id-card.svg" alt="Profil">
                Mon profil
              </a>
            </li>
            <li>
              <a href="<?php echo home_url('/chat/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/chat.svg" alt="Chat">
                Chat
              </a>
            </li>

            <li>
              <?php if (current_user_can('conducteur') || current_user_can('administrator')): ?>
                <a href="<?php echo home_url('/add-a-traject/'); ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/add-something.svg" alt="Add">
                    Publier un trajet
                </a>
              <?php endif; ?>
            </li>

            <li>
              <a href="<?php echo wp_logout_url(home_url()); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/logout.svg" alt="Déconnexion">
                Déconnexion
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<script>
    
    //Menu hamburger ==> important qu'il sois ici : 
    const hamburger = document.getElementById('hamburger-menu');
    const navMenu = document.getElementById('nav-links');
    const overlay = document.getElementById('overlay');

    // Menu supperposé que le hamburger est clické
    hamburger.addEventListener('click', (e) => {
      e.stopPropagation();
      navMenu.classList.toggle('active');
      hamburger.classList.toggle('active');
      overlay.classList.toggle('active');
    });

    // Le menu se ferme quand on clique en dehors 
    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
        overlay.classList.remove('active');
      }
    });

</script>

<body> 
