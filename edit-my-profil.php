<?php
/* Template Name: Éditer le profil */
get_header();

// Vérifier si l'utilisateur est connecté
if ( is_user_logged_in() ) {
    // Récupérer l'utilisateur actuel
    $current_user = wp_get_current_user();

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

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_edit_profile'])) {
        // Assainir et récupérer les nouvelles données
        $new_firstname = sanitize_text_field($_POST['firstname']);
        $new_lastname = sanitize_text_field($_POST['lastname']);
        $new_birthdate = sanitize_text_field($_POST['birthdate']);
        $new_gender = sanitize_text_field($_POST['gender']);
        $new_city = sanitize_text_field($_POST['city']);
        $new_school = sanitize_text_field($_POST['school']);
        $new_phone = sanitize_text_field($_POST['phone']);
        $new_about = sanitize_textarea_field($_POST['about']);

        // Mettre à jour les métadonnées de l'utilisateur
        update_user_meta($current_user->ID, 'first_name', $new_firstname);
        update_user_meta($current_user->ID, 'last_name', $new_lastname);
        update_user_meta($current_user->ID, 'birthdate', $new_birthdate);
        update_user_meta($current_user->ID, 'gender', $new_gender);
        update_user_meta($current_user->ID, 'city', $new_city);
        update_user_meta($current_user->ID, 'school', $new_school);
        update_user_meta($current_user->ID, 'phone', $new_phone);
        update_user_meta($current_user->ID, 'about', $new_about);

        // Gérer la mise à jour de la photo de profil
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            // Traitement de l'upload de l'image
            $upload = wp_handle_upload($_FILES['profile_picture'], array('test_form' => false));
            if (isset($upload['url'])) {
                // Si le téléchargement réussit, mettre à jour la photo de profil
                update_user_meta($current_user->ID, 'profile_picture', $upload['url']);
            } else {
                // Si l'upload échoue, afficher un message d'erreur
                echo 'Une erreur est survenue lors du téléchargement de votre photo de profil.';
            }
        }

        // Rediriger vers la page de profil après la mise à jour
        wp_redirect(home_url('/my-profil')); // Ou utiliser get_permalink($profil_page_id) si nécessaire, quand tout sera + avancé ! 
        exit;
    }
} else {
    echo 'Veuillez vous connecter pour modifier votre profil.';
    return;
}
?>

<!-- Contenu de la page Edit My Profile -->
<div class="edit-profile-form">
    <h2>Modifier mon profil</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="firstname">Nom :</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo esc_attr($firstname); ?>" required>

        <label for="lastname">Prénom :</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo esc_attr($lastname); ?>" required>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate" id="birthdate" value="<?php echo esc_attr($birthdate); ?>" required>

        <label for="gender">Genre :</label>
        <div>
            <input type="radio" name="gender" value="Homme" id="male" <?php checked($gender, 'Homme'); ?>> Homme
            <input type="radio" name="gender" value="Femme" id="female" <?php checked($gender, 'Femme'); ?>> Femme
            <input type="radio" name="gender" value="Autre" id="other" <?php checked($gender, 'Autre'); ?>> Autre
        </div>

        <label for="city">Ville :</label>
        <input type="text" name="city" id="city" value="<?php echo esc_attr($city); ?>" required>

        <label for="school">École :</label>
        <input type="text" name="school" id="school" value="<?php echo esc_attr($school); ?>">

        <label for="phone">Numéro de téléphone :</label>
        <input type="tel" name="phone" id="phone" value="<?php echo esc_attr($phone); ?>" placeholder="+32 4XX XX XX XX">

        <label for="about">À propos de toi :</label>
        <textarea name="about" id="about"><?php echo esc_textarea($about); ?></textarea>

        <label for="profile_picture">Changer votre photo de profil :</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">

        <input type="submit" name="submit_edit_profile" value="Mettre à jour mon profil">
    </form>
</div>

<?php get_footer(); ?>
