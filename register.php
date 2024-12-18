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

            /*// Gérer la photo de profil
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $upload = wp_handle_upload($_FILES['profile_picture'], array('test_form' => false));
                if (isset($upload['url'])) {
                    update_user_meta($user_id, 'profile_picture', $upload['url']);
                }
            }

            // Envoyer un email de confirmation
            $subject = "Confirmation de votre inscription";
            $message = "Bonjour $username,\n\nVotre inscription a été réussie. Bienvenue sur notre site !";
            wp_mail($email, $subject, $message);*/

            // Connecter l'utilisateur automatiquement
            wp_set_auth_cookie($user_id);

            // Rediriger vers une page de profil
            wp_redirect(home_url('/my-profil')); // Remplace par l'URL de ta page de profil
            exit;
        } else {
            $error_message = "Un problemo est venu tout capouto lors de la création de ton compte, réessaye";
        }
    }
}
?>

<!-- Contenu de la page d'inscription -->
<div class="blue-separation"></div>
<br>

<div class="container-fluid"> 
    <div class="row justify-content-center">
        <!-- Colonne centrale avec gouttière -->
        <div class="col-12 col-md-10 col-lg-8 p-4 background-register">
            <div class="row align-items-center">
                <!-- Colonne pour le texte et le formulaire -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <h1>Bienvenue sur Fast'N Friends</h1>
                        <i><p>Créer un compte et rejoins-nous</p></i>
                    </div>
                    <!-- Formulaire -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="firstname" placeholder="Nom" value="<?php echo isset($firstname) ? esc_attr($firstname) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="lastname" placeholder="Prénom" value="<?php echo isset($lastname) ? esc_attr($lastname) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Pseudo" value="<?php echo isset($username) ? esc_attr($username) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="birthdate" value="<?php echo isset($birthdate) ? esc_attr($birthdate) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="gender" required>
                                <option value="" disabled selected>Genre</option>
                                <option value="Homme" <?php echo (isset($gender) && $gender === 'Homme') ? 'selected' : ''; ?>>Homme</option>
                                <option value="Femme" <?php echo (isset($gender) && $gender === 'Femme') ? 'selected' : ''; ?>>Femme</option>
                                <option value="Autre" <?php echo (isset($gender) && $gender === 'Autre') ? 'selected' : ''; ?>>Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Adresse email" value="<?php echo isset($email) ? esc_attr($email) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="confirm_email" placeholder="Confirmez votre email" value="<?php echo isset($email) ? esc_attr($email) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                            <div class="form-text">Votre mot de passe doit comporter entre 8 et 20 caractères, inclure des lettres et des chiffres, et ne doit pas contenir d'espaces.</div>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="about" placeholder="À propos de toi" required><?php echo isset($about) ? esc_textarea($about) : ''; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" name="phone" placeholder="Téléphone (facultatif)" value="<?php echo isset($phone) ? esc_attr($phone) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="profile_picture" accept="image/*">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="terms" required>
                            <label class="form-check-label" for="terms">J'ai lu les conditions d'utilisation</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="newsletter">
                            <label class="form-check-label" for="newsletter">Je m'inscris à la Newsletter</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit_inscription" class="btn-primary2">Inscrivez-vous</button>
                        </div>
                    </form>
                </div>
                <!-- Colonne pour l'image -->
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4 mb-lg-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/vintage-car.svg" alt="voiture sous un soleil" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>


<br><br><br>

<?php get_footer(); ?>
