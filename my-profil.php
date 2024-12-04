<?php
/* Template Name: Page de Profil */
get_header();

//Dégager utilisateur qui n'est pas connecté/inscrits :
if ( !is_user_logged_in() ) {
    wp_redirect( home_url('/login/') );
    exit;
}

// Récupérer l'ID de l'utilisateur actuel
$current_user = wp_get_current_user();

// Vérifier si l'utilisateur est connecté
if ( is_user_logged_in() ) {
    // Récupérer les métadonnées de l'utilisateur
    $firstname = get_user_meta($current_user->ID, 'first_name', true);
    $lastname = get_user_meta($current_user->ID, 'last_name', true);
    $birthdate = get_user_meta($current_user->ID, 'birthdate', true);
    $gender = get_user_meta($current_user->ID, 'gender', true);
    $city = get_user_meta($current_user->ID, 'city', true);
    $school = get_user_meta($current_user->ID, 'school', true);
    $phone = get_user_meta($current_user->ID, 'phone', true);
    $about = get_user_meta($current_user->ID, 'about', true);
    $profile_picture = get_user_meta($current_user->ID, 'profile_picture', true);
} else {
    echo 'Veuillez vous connecter pour voir votre profil.';
    return;
}
?>

<!-- Contenu de la page de profil -->
<div class="profil-info">
    <h2>Mon Profil</h2>

    <?php if ($profile_picture): ?>
        <img src="<?php echo esc_url($profile_picture); ?>" alt="Photo de profil" />
    <?php endif; ?>

    <p><strong>Nom d'utilisateur :</strong> <?php echo esc_html($current_user->user_login); ?></p>
    <p><strong>Nom :</strong> <?php echo esc_html($firstname); ?></p>
    <p><strong>Prénom :</strong> <?php echo esc_html($lastname); ?></p>
    <p><strong>Date de naissance :</strong> <?php echo esc_html($birthdate); ?></p>
    <p><strong>Genre :</strong> <?php echo esc_html($gender); ?></p>
    <p><strong>Ville :</strong> <?php echo esc_html($city); ?></p>
    <p><strong>Ecole :</strong> <?php echo esc_html($school); ?></p>
    <p><strong>Email :</strong> <?php echo esc_html($current_user->user_email); ?></p>
    <p><strong>Numéro de téléphone :</strong> <?php echo esc_html($phone); ?></p>
    <p><strong>À propos de toi :</strong> <?php echo nl2br(esc_html($about)); ?></p>
</div>

<p>Tu veux modifier tes infos ? <a href="<?php echo home_url('/edit-my-profil/'); ?>">Clique-ici !</a></p>


<?php get_footer(); ?>
