
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





          <!--LIEN POUR UN CALENDRIER + joli ==> peut-être supp, a voir si j'utilises ou pas-->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
           <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                    <!-- TRUC QUI SERS A JE NE SAIS PLUS QUOI, MAIS A QUELQUE CHOSE JE PENSE -->
                    <script>
                    const templateDirectoryUri = "<?php echo get_template_directory_uri(); ?>";
                    </script>

 




      
            <!-- ICI, favicon et titres des pages : -->
            <?php
            if (is_page('deep-search')) : ?>
                <title>Recherche approfondie - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('register')) : ?> <!-- INSCRIPTION c'est register, besoin d'anglicisme c'est important -->
                <title>S'inscrire - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('login')) : ?>
                <title>Se connecter - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('password-reset')) : ?>
                <title>Réinitialise ton MDP - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_page('add-a-traject')) : ?>
                <title>Ajoute ton trajet - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_404()) : ?> <!-- Vérification correcte pour une page 404 -->
                <title>404 - T'es paumé</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php elseif (is_front_page() || is_home()) : ?> <!-- Vérification pour la page d'accueil -->
                <title>Accueil - FNF</title>
                <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Img/FNF-logo.svg" type="image/x-icon">
            <?php else : ?>
                <!-- Titre par défaut pour toutes les autres pages -->
                <title><?php wp_title('|', true, 'right'); ?></title>
                <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
            <?php endif; ?>



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