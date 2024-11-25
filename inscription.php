<?php
/* Template Name: Inscription */

get_header(); ?>

<!-- Contenu de la page d'inscription -->
<div class="inscription-form">
    <h2>Inscription</h2>
    
    <!-- Formulaire d'inscription -->
    <form action="" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" name="submit" value="S'inscrire">
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    // Créer un nouvel utilisateur
    $user_id = wp_create_user($username, $password, $email);
    
    if (!is_wp_error($user_id)) {
        // Envoyer un e-mail de confirmation
        wp_mail($email, 'Confirmation d\'inscription', 'Merci pour votre inscription !');

        // Rediriger vers une page de bienvenue ou connexion
        wp_redirect(home_url('/connexion')); // Exemple de redirection vers la page de connexion
        exit;
    } else {
        // Afficher une erreur si l'inscription échoue
        echo '<p>Erreur : ' . $user_id->get_error_message() . '</p>';
    }
}

get_footer();
