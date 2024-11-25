<?php
/* Template Name: Page d'inscription */
get_header();

// Vérification si le formulaire a été soumis
if (isset($_POST['submit_inscription'])) {
    // Récupérer et assainir les données du formulaire
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    // Vérification des erreurs
    if (username_exists($username)) {
        $error_message = "Ce nom d'utilisateur est déjà pris.";
    } elseif (email_exists($email)) {
        $error_message = "Cet email est déjà utilisé.";
    } else {
        // Créer l'utilisateur
        $user_id = wp_create_user($username, $password, $email);

        // Vérifier si l'utilisateur a été créé avec succès
        if (!is_wp_error($user_id)) {
            // Envoyer un email de confirmation
            $subject = "Confirmation de votre inscription";
            $message = "Bonjour $username,\n\nVotre inscription a été réussie. Bienvenue sur notre site !";
            wp_mail($email, $subject, $message);

            // Connecter l'utilisateur immédiatement après l'inscription
            wp_set_auth_cookie($user_id);

            // Rediriger vers la page de profil ou d'accueil
            wp_redirect(home_url('/profil')); // Remplace avec ton URL de profil
            exit;
        } else {
            // Si une erreur survient lors de la création de l'utilisateur
            $error_message = "Une erreur est survenue lors de la création de votre compte.";
        }
    }
}

?>

<!-- Contenu de la page d'inscription -->
<div class="inscription-form">
    <h2>Inscription</h2>
    
    <?php
    // Si une erreur existe, l'afficher
    if (isset($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>

    <!-- Formulaire d'inscription -->
    <form action="" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="submit_inscription" value="S'inscrire">
    </form>
</div>

<?php get_footer(); ?>
