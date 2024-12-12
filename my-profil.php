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
<div style="background-color: #3d3db3; text-align: center; padding: 70px;">
    <!-- Couleur de fond personnalisée pour l'en-tête -->
</div>

<div class="profile-container">
    <h1><?php echo esc_html($firstname . ' ' . $lastname); ?></h1>
    <img src="<?php echo esc_url($profile_picture); ?>" alt="Votre photo de profil" class="profile-picture">

    <div class="role-section">
        <h2><?php echo esc_html($gender); ?> - Conducteur/Passager</h2>
    </div>

    <div class="info-section">
        <p>A rejoint le : <span class="highlight">[date d'inscription]</span></p>
        <p>Connecté il y a : <span class="highlight">[nbre heure/jour]</span></p>
    </div>

    <div class="contact-section">
        <p><strong>Téléphone :</strong> <?php echo esc_html($phone); ?></p>
        <p><strong>École :</strong> <?php echo esc_html($school); ?></p>
    </div>
</div>

<div>
    <div class="profil-h3">
        <h3>À propos de moi</h3>
    </div>
    <div class="backgroundbox">
        <div class="box">
            <p><?php echo nl2br(esc_html($about)); ?></p>
        </div>
    </div>
</div>

<div class="actions-section">
    <p>Modifier vos infos ? <a href="<?php echo home_url('/edit-my-profil/'); ?>">C'est par ici !</a></p>
    <p>Devenir conducteur ? <a href="<?php echo home_url('/become-a-driver/'); ?>">Clique ici !</a></p>
</div>


<?php get_footer(); ?>
