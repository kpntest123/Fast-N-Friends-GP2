<?php
/**
 * Template for displaying 404 pages (not found).
 *
 * @package YourThemeName
 */

get_header(); ?>
<div class="blue-separation"> </div>

<div class="container error-page">
    <div class="error-404 not-found">
        <img class="car-accident" src="<?php echo get_template_directory_uri(); ?>/Assets/Img/car-accident-for-404.svg" alt="Illustration of a car accident for the 404 error page">
        
        <h1 class="page-title">Erreur 404 !</h1>
        <p class="error-message">Bravo champion,...</p>
        
        <a class="button home-button" href="<?php echo esc_url(home_url('/')); ?>">Retourne à la page d'accueil !</a>
    </div>
</div>

<?php get_footer(); ?>
