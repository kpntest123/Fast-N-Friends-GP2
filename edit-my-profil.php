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
<div class= blue-separation>
<h1>Modifier mes infos</h1>
</div>
<div class="container">
    <br><br>

    <form name="Edit-profil" id="edit-profil" method="POST" enctype="multipart/form-data">
        <!-- Titre de l'article -->
        <div class="row mb-3">
    <label for="Nom" class="col-sm-2 col-form-label EMP-form-label">Nom</label>
    <div class="col-sm-10">
        <input type="text" class="form-control EMP-form-input" id="Nom" name="firstname" value="<?php echo esc_attr($firstname); ?>" required>
    </div>
</div>

<!-- Prénom -->
<div class="row mb-3">
    <label for="Prénom" class="col-sm-2 col-form-label EMP-form-label">Prénom</label>
    <div class="col-sm-10">
        <input type="text" class="form-control EMP-form-input" id="Prénom" name="lastname" value="<?php echo esc_attr($lastname); ?>" required>
    </div>
</div>

<!-- Date -->
<div class="row mb-3">
    <label for="birthday" class="col-sm-2 col-form-label EMP-form-label">Date</label>
    <div class="col-sm-10">
        <input type="date" id="birthday" name="birthdate" class="form-control EMP-form-input" value="<?php echo esc_attr($birthdate); ?>" required>
    </div>
</div>

<!-- Genre -->
<div class="row mb-3">
    <label for="Genre" class="col-sm-2 col-form-label EMP-form-label">Genre</label>
    <div class="col-sm-10">
        <select class="form-control EMP-form-input" id="Genre" name="gender">
            <option value="Homme" <?php selected($gender, 'Homme'); ?>>Homme</option>
            <option value="Femme" <?php selected($gender, 'Femme'); ?>>Femme</option>
            <option value="Autre" <?php selected($gender, 'Autre'); ?>>Autre</option>
        </select>
    </div>
</div>

<!-- Ville -->
<div class="row mb-3">
    <label for="Ville" class="col-sm-2 col-form-label EMP-form-label">Ville</label>
    <div class="col-sm-10">
        <input type="text" class="form-control EMP-form-input" id="Ville" name="city" value="<?php echo esc_attr($city); ?>" required>
    </div>
</div>

<!-- École -->
<div class="row mb-3">
    <label for="Ecole" class="col-sm-2 col-form-label EMP-form-label">École</label>
    <div class="col-sm-10">
        <input type="text" class="form-control EMP-form-input" id="Ecole" name="school" value="<?php echo esc_attr($school); ?>">
    </div>
</div>

<!-- Numéro de téléphone -->
<div class="row mb-3">
    <label for="Numero de telephone" class="col-sm-2 col-form-label EMP-form-label">Téléphone</label>
    <div class="col-sm-10">
        <input type="text" class="form-control EMP-form-input" id="Numero de telephone" name="phone" value="<?php echo esc_attr($phone); ?>" placeholder="+32 4XX XX XX XX">
    </div>
</div>

<!-- Description -->
<div class="row mb-3">
    <label for="Aboutyou" class="col-sm-2 col-form-label EMP-form-label">À propos de toi</label>
    <div class="col-sm-10">
        <textarea class="form-control EMP-form-input" id="Aboutyou" name="about" rows="8"><?php echo esc_textarea($about); ?></textarea>
    </div>
</div>

<!-- Image de la vignette -->
<div class="row mb-3">
    <label for="profile_picture" class="col-sm-2 col-form-label EMP-form-label">Changer votre photo de profil</label>
    <div class="col-sm-10">
        <input type="file" class="form-control EMP-form-input" id="profile_picture" name="profile_picture" accept="image/*">
    </div>
</div>

<!-- Bouton Appliquer les modifications -->
<div class="row mb-3">
    <div class="col-sm-12 text-center">
        <input type="submit" name="submit_edit_profile" value="Mettre à jour mon profil" class="EMP-btn-custom">
    </div>
</div>




<?php get_footer(); ?>
