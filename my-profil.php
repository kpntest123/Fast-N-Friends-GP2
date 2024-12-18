<?php
/* Template Name: Page de Profil */
get_header();

// Dégager utilisateur qui n'est pas connecté/inscrits :
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
    $gender = get_user_meta($current_user->ID, 'gender', true);
    $school = get_user_meta($current_user->ID, 'school', true);
    $phone = get_user_meta($current_user->ID, 'phone', true);
    $about = get_user_meta($current_user->ID, 'about', true);
    $profile_picture = get_user_meta($current_user->ID, 'profile_picture', true);
} else {
    echo 'Veuillez vous connecter pour voir votre profil.';
    return;
}
?>
<div style="background-color: #4B9BEB; text-align: center; padding: 70px;">
</div>
<!-- Contenu de la page de profil -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="role-section">
                <h3><?php echo esc_html($gender); ?> - <?php 
                    // Récupérer le rôle de l'utilisateur
                    $user_roles = $current_user->roles; 
                    if (!empty($user_roles)) {
                        echo esc_html(ucwords(str_replace('_', ' ', $user_roles[0]))); // Afficher le premier rôle
                    } else {
                        echo 'Aucun rôle défini'; // Si aucun rôle n'est défini ==> même si impossible
                    }
                ?></h3>
            </div>

            <div class="info-Psection">
                <p>A rejoint le : <span class="highlight"><?php echo date_i18n('d F Y', strtotime($current_user->user_registered)); ?></span></p>

                <p>Dernière connexion : 
                    <span class="highlight">
                        <?php
                            $last_login = get_user_meta($current_user->ID, 'last_login', true);
                            if ($last_login) {
                                $last_login_time = strtotime($last_login);
                                $time_diff = human_time_diff($last_login_time, current_time('timestamp'));
                                
                                // Traduction des temps en français
                                if ($time_diff) {
                                    $time_diff = str_replace(
                                        ['second', 'minute', 'hour', 'day', 'week', 'month', 'year'],
                                        ['seconde', 'minute', 'heure', 'jour', 'semaine', 'mois'],
                                        $time_diff
                                    );
                                }
                                
                                echo esc_html($time_diff . ' auparavant/lorem ');
                            } else {
                                echo 'Jamais connecté';
                            }
                        ?>
                    </span>
                </p>
            

                <p>Téléphone : <?php echo esc_html($phone); ?></p>
                <p>École :  <?php echo esc_html($school); ?></p>
                </div>

            <div class="profil-h3">
                <h3>À propos de moi</h3>
            </div>
            <div class="profil-box">
                <div class="profil-content">
                    <p><?php echo nl2br(esc_html($about)); ?></p>
                </div>
            </div>
            </div>
       
            <div class="col-lg-6 col-md-6">
            <div class="profile-container">
                <h2><?php echo esc_html($firstname . ' ' . $lastname); ?></h2>
                <img src= "<?php echo get_template_directory_uri(); ?>Assets/Img/placeholder.jpg" alt="Votre photo de profil" class="profile-picture">
            
            <p>Devenir conducteur ? <a href="<?php echo home_url('/become-a-driver/'); ?>">Clique ici !</a></p>
            <p>Modifier vos infos ? <a href="<?php echo home_url('/edit-my-profil/'); ?>">C'est par ici !</a></p>
            </div>
        </div>    
    </div>
    </div>
    </div>
</div>
</div>
</div>

<?php get_footer(); ?>

