
            <!-- ICI, favicon et titres des pages : -->
            <?php
                if (is_page('deep-search')) : ?>
                    <title>Recherche approfondie | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('register')) : ?> <!-- Anglicisme respecté pour "register" -->
                    <title>S'inscrire | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('login')) : ?>
                    <title>Se connecter | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('password-reset')) : ?>
                    <title>Réinitialise ton MDP | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_page('add-a-traject')) : ?>
                    <title>Ajoute ton trajet | Fast 'N Friends</title>
                    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
                <?php elseif (is_404()) : ?>
                    <title>404 - T'es paumé | Fast 'N Friends</title>
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
  <title>Fast 'N Friends</title>
</head>

<?php wp_head(); ?>

    <!-- CECI EST LA BARRE DE NAV :-->
<nav class="custom-navbar">
    <div class="logo-container">
        <a id="fnfheader" href="<?php echo home_url(); ?>">FAST 'N FRIENDS</a>
    </div>

    <ul class="nav-links" id="nav-links">

            <?php if (current_user_can('administrator')) : ?>
                <li>
                <a class="add-event" href="<?php echo esc_url(admin_url()); ?>">
                    ADMIN - Ajouter un event
                </a>
                </li>
            <?php endif; ?>

        <li>
        <a href="<?php echo home_url('/partner-event/'); ?>">
                Événements partenaires
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/fiesta.svg" alt="Dropdown">
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('/deep-search/'); ?>">
                Rechercher
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/search-ico.svg" alt="Search">
            </a>
        </li>

        <?php if ( ! is_user_logged_in() ) : ?>
            <li><a href="<?php echo home_url('/login/'); ?>">Se connecter</a></li>
            <li><a class="btn-primary" href="<?php echo home_url('/register/'); ?>">S'inscrire</a></li>
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
                                        <!---
                                            Solution 2 ==> ne pas afficher publier un trajet pour les personnes covoitureuses, mais dans la FAQ : Dire tu veux publier un trajet, 
                                            suffit de te crééer un compte et faire vérifier ton compte !
                                            
                                            MARCHE completemment !
                                        -->
                                        <?php if (current_user_can('conducteur')): ?>
                                            <a href="<?php echo home_url('/add-a-traject/'); ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/add-something.svg" alt="Chat">
                                                Publier un trajet
                                            </a>
                                        <?php endif; ?>

                    </li>
                    <li>
                        <a href="<?php echo wp_logout_url( home_url() ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/logout.svg" alt="Déconnexion">
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</nav>










<body> 
  <?php body_class(); ?>
  >