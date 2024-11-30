<?php
/* Template Name: Page de connexion */
get_header();

?>

<?php if (isset($_GET['login_error'])) : ?>
    <div class="alert alert-danger">
        <?php echo esc_html($_GET['login_error']); ?>
    </div>
<?php endif; ?>





<div style="background-color: #3d3db3; ;text-align: center;padding: 25px;">
        <h1> Connecte-toi </h1>
        <p>pour accéder à ton compte</p>
        </div>
        <br><br>


        <form action="" method="POST">
    <?php wp_nonce_field('user_login_action', 'user_login_nonce'); ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-50">
            <div class="col-12 mb-3">
                <label for="username" class="form-label">Adresse email</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="johndoe@gmail.com" style="border: 2px solid #3d3db3; border-radius: 8px;" required>
            </div>

            <div class="col-12 mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" style="border: 2px solid #3d3db3; border-radius: 8px;" required>
            </div>
            
            <div class="col-12 mb-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
            </div>

            <div class="col-12 mb-3">
                <a href="<?php echo wp_lostpassword_url(); ?>"><i>Mot de passe oublié ?</i></a>
            </div>

            <div class="col-12">
                <button type="submit" name="login_submit" class="btn btn-primary w-100">Connecte-toi</button>
            </div>
        </div>
    </div>
</form>

        

<?php
get_footer();
