<?php
/* Template Name: Page d'inscription */
get_header();

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_inscription'])) {
    // Assainir et récupérer les données
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $firstname = sanitize_text_field($_POST['firstname']);
    $lastname = sanitize_text_field($_POST['lastname']);
    $birthdate = sanitize_text_field($_POST['birthdate']);
    $gender = sanitize_text_field($_POST['gender']);
    $city = sanitize_text_field($_POST['city']);
    $school = sanitize_text_field($_POST['school']);
    $phone = sanitize_text_field($_POST['phone']);
    $about = sanitize_textarea_field($_POST['about']);
    $terms = isset($_POST['terms']) ? true : false;

    // Vérifications des erreurs
    $error_message = '';
    if (!$terms) {
        $error_message = "Vous devez accepter les conditions d'utilisation.";
    } elseif (username_exists($username)) {
        $error_message = "Ce nom d'utilisateur est déjà pris.";
    } elseif (email_exists($email)) {
        $error_message = "Cet email est déjà utilisé.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        // Créer l'utilisateur
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // Ajouter des métadonnées utilisateur
            update_user_meta($user_id, 'first_name', $firstname);
            update_user_meta($user_id, 'last_name', $lastname);
            update_user_meta($user_id, 'birthdate', $birthdate);
            update_user_meta($user_id, 'gender', $gender);
            update_user_meta($user_id, 'city', $city);
            update_user_meta($user_id, 'school', $school);
            update_user_meta($user_id, 'phone', $phone);
            update_user_meta($user_id, 'about', $about);

            // Gérer la photo de profil
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $upload = wp_handle_upload($_FILES['profile_picture'], array('test_form' => false));
                if (isset($upload['url'])) {
                    update_user_meta($user_id, 'profile_picture', $upload['url']);
                }
            }

            // Envoyer un email de confirmation
            $subject = "Confirmation de votre inscription";
            $message = "Bonjour $username,\n\nVotre inscription a été réussie. Bienvenue sur notre site !";
            wp_mail($email, $subject, $message);

            // Connecter l'utilisateur automatiquement
            wp_set_auth_cookie($user_id);

            // Rediriger vers une page de profil
            wp_redirect(home_url('/profil')); // Remplace par l'URL de ta page de profil
            exit;
        } else {
            $error_message = "Une erreur est survenue lors de la création de votre compte.";
        }
    }
}
?>

<!-- Contenu de la page d'inscription -->
<div class="inscription-form">
    <h2>Inscris-toi !</h2>
    
    <?php if (!empty($error_message)): ?>
        <p class="error-message"><?php echo esc_html($error_message); ?></p>
    <?php endif; ?>

    <!-- Formulaire HTML -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>

        <label for="firstname">Nom :</label>
        <input type="text" name="firstname" id="firstname" required>

        <label for="lastname">Prénom :</label>
        <input type="text" name="lastname" id="lastname" required>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate" id="birthdate" required>

        <label for="gender">Genre :</label>
        <div>
            <input type="radio" name="gender" value="Homme" id="male" required> Homme
            <input type="radio" name="gender" value="Femme" id="female" required> Femme
            <input type="radio" name="gender" value="Autre" id="other" required> Autre
        </div>

        <label for="city">Ville :</label>
        <input type="text" name="city" id="city" required>

        <label for="school">?Ton école elle ou champion?</label>
        <input type="text" name="school" id="school">

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="confirm_email">Confirmer votre email :</label>
        <input type="email" name="confirm_email" id="confirm_email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirmer votre mot de passe :</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <label for="phone">Numéro de téléphone :</label>
        <input type="tel" name="phone" id="phone" placeholder="+32 4XX XX XX XX">

        <label for="about">À propos de toi :</label>
        <textarea name="about" id="about"></textarea>

        <label for="profile_picture">Votre photo de profil :</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">

        <div>
            <input type="checkbox" name="terms" id="terms" required> J'ai lu les conditions d'utilisation
            <input type="checkbox" name="newsletter" id="newsletter"> Je m'inscris à la Newsletter
        </div>

        <input type="submit" name="submit_inscription" value="Inscrivez-vous">
    </form>
</div>

<?php get_footer(); ?>
