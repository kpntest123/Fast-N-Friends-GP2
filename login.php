<?php
/* Template Name: Page de connexion */
get_header();

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
        // Log failed login attempt for security monitoring
        error_log('Failed login attempt for username: ' . $username);
        
        $error_message = $user->get_error_message();
        wp_redirect(add_query_arg('login_error', urlencode($error_message), get_permalink()));
        exit;
    } else {
        // Optional: Add logging for successful logins
        error_log('Successful login for username: ' . $username);
        
        wp_redirect(home_url());
        exit;
    }
}


// Vérifier si l'utilisateur arrive sur la page "login" depuis la page "register" ==> donc inscriptions réussie !
if (is_page('login') && isset($_SERVER['HTTP_REFERER'])) {
    $referer = wp_parse_url($_SERVER['HTTP_REFERER']);
    if (!empty($referer['path']) && strpos($referer['path'], '/register') !== false) {
        echo '<p>Si tu es redirigé ici après t\'être inscrits, c\'est que ton inscription est réussie !</p>';
    }
}


?>

<?php
// Message pour erreur de connexion :
if (isset($_GET['login_error'])) : ?>
    <div class="alert alert-danger">
        <?php echo esc_html(urldecode($_GET['login_error'])); ?>
    </div>
<?php endif; ?>

<div class="blue-separation">


    <h1>Connecte-toi !</h1>
    <p>Pour que tu accèdes à ton compte, remplis les champs !</p>

</div>
<br>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 info-section d-flex flex-column justify-content-center">
            <form action="" method="POST" novalidate>
                <?php wp_nonce_field('user_login_action', 'user_login_nonce'); ?>
                
                <div class="form-group mb-3">
                    <label for="username" class="sr-only">Nom d'utilisateur ou adresse mail</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="form-control" 
                        placeholder="" 
                        value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>" 
                        required 
                        autocomplete="username"
                    >
                </div>
                
                <div class="form-group mb-3">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="" 
                        required 
                        autocomplete="current-password"
                    >
                </div>
                
                <div class="form-group mb-3">
                    <div class="form-check-login">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember" 
                            style="width: 16px; height: 16px;"

                            <?php echo (isset($_POST['remember']) && $_POST['remember']) ? 'checked' : ''; ?>
                        >
                        <label class="form-check-label" for="remember" class="remember-me">
                            Se souvenir de moi
                        </label>
                    </div>
                    
                    <a href="<?php echo wp_lostpassword_url(); ?>" class="mdp-oublie">
                        Mot de passe oublié ?
                    </a>
                </div>
                
                <button 
                    type="submit" 
                    name="login_submit" 
                    class="btn btn-primary w-100"
                >
                    Se connecter
                </button>
            </form>
        </div>
        
        <div class="col-md-6 image-section">
            <?php 
            $image_url = get_template_directory_uri() . '/Assets/Img/secure-connection.svg';
            ?>
            <img 
                src="<?php echo esc_url($image_url); ?>" 
                alt="Femme pointant un ordinateur" 
                class="img-fluid"
            >
        </div>
    </div>
</div>
<br>

<?php
get_footer();
?>
