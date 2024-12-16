
      <!--ICI, favicon et titres des pages : -->
      <?php
    if (is_page('deep-search')) : ?>
        <title>Recherche approfondie - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('register')) : ?> <!-- INSCRIPTION c'est register, besoin d'angliscisme c'est important -->
        <title>S'inscrire - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('login')) : ?>
        <title>Se connecter - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('password-reset')) : ?>
        <title>Réinisialise ton MDP - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('add-a-traject')) : ?>
        <title>Ajoutes ton trajet - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('404')) : ?> <!-- VERIF LURL DE LA PAGE 404, ce sont les détails qui font les grandes choses -->
        <title>404 t'es paumé</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php elseif (is_page('home')) : ?>
        <title>Accueil - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">



        
                <!-- VIERGE A PARTIR DICI -->
    <?php elseif (is_page('?')) : ?>
        <title>Accueil - FNF</title>
        <link rel="icon" href="https://thecaseycontinuum.wordpress.com/wp-content/uploads/2013/07/snl5.jpg" type="image/x-icon">
    <?php else : ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
    <?php endif; ?>


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

    
</head>

<?php wp_head(); ?>

    <!-- CECI EST LA BARRE DE NAV :-->
<nav class="custom-navbar">
    <div class="logo-container">
        <a id="fast-n-friends" href="<?php echo home_url(); ?>">FAST 'N FRIENDS</a>
    </div>

    <ul class="nav-links" id="nav-links">
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
                                        <!-- Menu spécifique pour toutes les personnes enregistrés, si clique sur publie run trajet, page de disclaimer disant "toi paq connecté, 
                                         connecte toi pour ajouter un trajet, pour forcer les gens a se faire un compte vérif !" -->
                                         <a href="<?php echo home_url('/add-a-traject/'); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/add-something.svg" alt="Chat">
                                            Publier un trajet
                                        </a>

                    </li>
                    <li>
                        <a href="<?php echo wp_logout_url( home_url() ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/logout.svg" alt="Déconnexion">
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Section spécifique aux admins ==> a faire fonctionner dans le futur -->
            <?php if (current_user_can('manage_site')) : ?>
                <li><a href="<?php echo home_url('/add-a-event/'); ?>">Ajouts d'événements</a></li>
            <?php endif; ?>

            
        <?php endif; ?>
    </ul>
</nav>






<body> 
  <?php body_class(); ?>
  >