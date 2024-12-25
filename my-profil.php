<?php
/* Template Name: Page de Profil */
get_header();

// Vérifier si un ID utilisateur est passé dans l'URL
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : get_current_user_id(); 

// Récupérer les informations de l'utilisateur spécifié
$user_data = get_userdata($user_id);

if (!$user_data) {
    echo '<p>Utilisateur non trouvé.</p>';
    get_footer();
    exit;
}

// Récupérer l'ID utilisateur depuis l'URL
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : get_current_user_id();

// Récupérer les informations de l'utilisateur
$user_data = get_userdata($user_id);

if ($user_data) {
    // Afficher les informations de l'utilisateur
    echo 'Nom : ' . esc_html($user_data->display_name);
    // Ajouter d'autres informations ici
} else {
    echo 'Utilisateur non trouvé';
}


// Récupérer les métadonnées de l'utilisateur
$firstname = get_user_meta($user_id, 'first_name', true);
$lastname = get_user_meta($user_id, 'last_name', true);
$gender = get_user_meta($user_id, 'gender', true);
$school = get_user_meta($user_id, 'school', true);
$phone = get_user_meta($user_id, 'phone', true);
$about = get_user_meta($user_id, 'about', true);

// Vérifier si l'utilisateur n'est pas connecté
if ( !is_user_logged_in() ) {
    // Rediriger vers la page /hom si l'utilisateur n'est pas connecté
    wp_redirect( home_url('/home') );
    exit; // Toujours appeler exit après une redirection
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
<div class="blue-separation">
    <h1>Ton profil :</h1>
    <p>Ta zone perso ! Laisse parler ton esprits</p>
</div>
<!-- Contenu de la page de profil -->
<div class="container mt-4">
    <div class="profile-row">
        <div class="profile-col-main">
            <div class="profile-content-container">
                <div class="role-section">
                    <h1 class="role-section"><?php echo esc_html($gender); ?> - <?php 
                        $user_roles = $current_user->roles; 
                        if (!empty($user_roles)) {
                            echo esc_html(ucwords(str_replace('_', ' ', $user_roles[0])));
                        } else {
                            echo 'Aucun rôle défini';
                        }
                    ?></h1>
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
                                    $time_diff = str_replace(
                                        ['second', 'minute', 'hour', 'day', 'week', 'month', 'year'],
                                        ['seconde', 'minute', 'heure', 'jour', 'semaine', 'mois'],
                                        $time_diff
                                    );
                                    echo esc_html($time_diff . ' auparavant/lorem ');
                                } else {
                                    echo 'Jamais connecté';
                                }
                            ?>
                        </span>
                    </p>

                    <p>Téléphone : <span class="highlight"> <?php echo esc_html($phone); ?></span></p>
                    <p>École : <span class="highlight"> <?php echo esc_html($school); ?></span></p>
                </div>

                <div class="profil-h1">
                    <h1 class="profil-h1">À propos de moi</h1>
                </div>
                <div class="profil-box">
                    <div class="profil-content">
                        <p><?php echo nl2br(esc_html($about)); ?></p>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="profile-col-side">
            <div class="profile-container">
                <h2><?php echo esc_html($firstname . ' ' . $lastname); ?></h2>
                <img src="<?php echo get_template_directory_uri(); ?>Assets/Img/placeholder.jpg" alt="Votre photo de profil" class="profile-picture">
                <p>Devenir conducteur ? <a href="<?php echo home_url('/become-a-driver/'); ?>">Clique ici !</a></p>
                <p>Modifier vos infos ? <a href="<?php echo home_url('/edit-my-profil/'); ?>">C'est par ici !</a></p>
            </div>
        </div>    
    </div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>

