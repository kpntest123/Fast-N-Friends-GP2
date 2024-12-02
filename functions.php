<?php
// Fonction pour configurer le thème
function mon_theme_setup() {
    // Support pour les titres
    add_theme_support('title-tag');
    
    // Support pour les images mises en avant
    add_theme_support('post-thumbnails');
    
    // Enregistrement des menus
    register_nav_menus(array(
        'primary' => 'Menu principal',
    ));
}
add_action('after_setup_theme', 'mon_theme_setup');

// Fonction pour lier les styles et scripts
function styles_scripts() {
    // Lier le CSS Bootstrap depuis un CDN
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

        // Lien vers le fichier CSS local
        wp_enqueue_style(
            'style', // Nom du style
            get_template_directory_uri() . '/Assets/css/app.css'
        );

    // Lier le JS Bootstrap depuis un CDN
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        false,  // Pas de dépendance spécifique
        null,   // Pas de version spécifique
        true    // Charger dans le footer
    );

    // Lier ton fichier JS local
    wp_enqueue_script(
        'app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        ['bootstrap-bundle'], // Dépend de Bootstrap
        null,   // Pas de version spécifique
        true    // Charger dans le footer
    );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

//Lier le (je suis pas égoiste et je ne m'approprie pas les choses, enfin bon, je suis pas proudhon non plus) CSS personnalisé :
function enqueue_custom_styles() {
    // Charger le fichier CSS principal (csspersonal.css)
    wp_enqueue_style(
        'csspersonal', // Nom unique pour le fichier CSS
        get_template_directory_uri() . '/Assets/CSS/csspersonal.css', // Chemin vers le fichier
        array(), // Dépendances (s'il y a un fichier CSS à charger avant)
        null // Pas de version (ou utilise `filemtime()` pour auto-versionner)
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


/* POUR LA PAGE DE CREATION DE TRAJET */
function register_trajet_post_type() {
    register_post_type('trajet', array(
        'labels' => array(
            'name' => 'Trajets',
            'singular_name' => 'Trajet',
            'add_new_item' => 'Ajouter un nouveau trajet',
            'edit_item' => 'Modifier le trajet',
            'all_items' => 'Tous les trajets',
            'view_item' => 'Voir le trajet',
            'search_items' => 'Rechercher un trajet',
            'not_found' => 'Aucun trajet trouvé',
            'not_found_in_trash' => 'Aucun trajet dans la corbeille',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'trajets'),
        'supports' => array('title', 'editor'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_trajet_post_type');

function register_trajet_meta() {
    register_post_meta('trajet', 'from', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_post_meta('trajet', 'to', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_post_meta('trajet', 'people', array(
        'type' => 'number',
        'single' => true,
        'show_in_rest' => true,
    ));
    register_post_meta('trajet', 'date', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_trajet_meta');




// Fonction pour gérer la connexion des utilisateurs
function handle_user_login() {
    if (isset($_POST['login_submit'])) {
        // Vérifie le nonce pour la sécurité
        check_admin_referer('user_login_action', 'user_login_nonce');

        $creds = array(
            'user_login'    => sanitize_text_field($_POST['username']),
            'user_password' => sanitize_text_field($_POST['password']),
            'remember'      => isset($_POST['remember']) ? true : false,
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            // Enregistre l'erreur pour l'afficher sur la page
            wp_redirect(add_query_arg('login_error', urlencode($user->get_error_message()), wp_get_referer()));
            exit;
        } else {
            // Redirige après connexion
            wp_redirect(home_url());
            exit;
        }
    }
}
add_action('init', 'handle_user_login');

function redirect_after_login($redirect_to, $request, $user) {
    // Vérifie si l'utilisateur est authentifié
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url(); // Redirige les administrateurs vers le tableau de bord
        } else {
            return home_url('/mon-compte'); // Redirige les utilisateurs normaux
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'redirect_after_login', 10, 3);




?>
