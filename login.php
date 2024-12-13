<?php
/* Template Name: Page de connexion */
get_header();
?>

<?php
// Login logic
if (isset($_POST['login_submit']) && wp_verify_nonce($_POST['user_login_nonce'], 'user_login_action')) {
    $username = sanitize_user($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    $login_data = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember
    );

    $user = wp_signon($login_data, false);

    if (is_wp_error($user)) {
        $error_message = urlencode($user->get_error_message());
        wp_redirect(add_query_arg('login_error', $error_message, get_permalink()));
        exit;
    } else {
        wp_redirect(home_url());
        exit;
    }
}
?>

<?php if (isset($_GET['login_error'])) : ?>
    <div class="alert alert-danger">
        <?php echo esc_html($_GET['login_error']); ?>
    </div>
<?php endif; ?>

<div style="background-color:rgb(134, 179, 61); text-align: center; padding: 25px;">
    <h1 class="text-white">Connecte-toi</h1>
    <p class="text-white">pour accéder à ton compte, logique</p>
</div>
<br><br>

<div class="container login-container">
    <div class="row g-0">
        <div class="col-md-6 info-section d-flex flex-column justify-content-center">
            <form action="" method="POST">
                <?php wp_nonce_field('user_login_action', 'user_login_nonce'); ?>
                
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
                
                <a href="<?php echo wp_lostpassword_url(); ?>" class="mb-3"><i>Mot de passe oublié ?</i></a>
                
                <button type="submit" name="login_submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
        </div>
        
        <div class="col-md-6 image-section">
            <?php 
            $image_url = get_template_directory_uri() . '/Assets/Img/connexion-securisee.png';
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Femme pointant un ordinateur" class="img-fluid">
        </div>
    </div>
</div>

<?php
get_footer();
?>