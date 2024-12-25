
            <!-- ICI, favicon et titres des pages : -->
            <?php
                if (is_page('deep-search')) : ?>
                    <title>Recherches plus en détails | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('register')) : ?> <!-- Anglicisme respecté pour "register" -->
                    <title>Inscrits-toi | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('login')) : ?>
                    <title>Connectes-toi | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('password-reset')) : ?>
                    <title>Réinitialise ton MDP | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('add-a-traject')) : ?>
                    <title>Ajoute ton trajet | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_404()) : ?>
                    <title>Erreur 404, tu t'es pas loupé ! | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('home')) : ?>
                    <title>Plus on est de fous plus on rit | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('partner-events')) : ?>
                    <title>Événements partenaires | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('event-edit')) : ?>
                    <title>Ajoute un event | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('my-profil')) : ?>
                    <title>Ton profil : | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php endif; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fast 'N Friends</title>
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
          <a class="add-event" href="<?php echo home_url('/event-edit/'); ?>">
            ADMIN - Ajouter un event
          </a>
        </li>
      <?php endif; ?>

      <li>
        <a href="<?php echo home_url('/partner-event/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/fiesta.svg" alt="Dropdown">
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
          <a href="<?php echo home_url('/login/'); ?>">Se connecter</a>
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
// Sélectionner le menu hamburger et le bloc du menu
const hamburger = document.getElementById('hamburger-menu');
const navMenu = document.getElementById('nav-links');

// Ouvrir/fermer le menu lorsque le hamburger est cliqué
hamburger.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});


</script>













<body> 
