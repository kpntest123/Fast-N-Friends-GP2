<?php
/**
 * Theme Setup and Configuration
 */

// Constants
define('THEME_VERSION', '1.0.0');
define('ASSETS_URI', get_template_directory_uri() . '/Assets');

/**
 * Theme Setup
 */
function fnf_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    register_nav_menus([
        'primary' => 'Menu principal',
    ]);
}
add_action('after_setup_theme', 'fnf_theme_setup');

/**
 * Assets Management
 */
function fnf_enqueue_assets() {
    // Les styles, polices et autres :
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Bokor&family=Jost:ital,wght@0,100..900;1,100..900&family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap');
    wp_enqueue_style('futura-pt', 'https://use.typekit.net/uah5lqa.css');
    wp_enqueue_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
    wp_enqueue_style('theme-style', ASSETS_URI . '/CSS/csspersonal.css', ['bootstrap'], filemtime(get_template_directory() . '/Assets/CSS/csspersonal.css'));

    // Styles conditionnel ==> supp et voir si on en a besoins, je pense pas, c'est quand y'avais un bug auparavanrt
    if (is_page_template('page-connexion.php')) {
        wp_enqueue_style('login-styles', ASSETS_URI . '/css/login.css', ['theme-style'], filemtime(get_template_directory() . '/Assets/css/login.css'));
    }

    // Scripts ==> JS ==> bootstrap voir si je l'ai lié en ligne/CDN ou local !
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true);
    wp_enqueue_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], '4.6.13', true);
}
add_action('wp_enqueue_scripts', 'fnf_enqueue_assets');


// GSAP
wp_enqueue_script(
    'gsap', 
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', 
    [], // Pas de dépendances
    '3.12.2', 
    true
);

//Java de la navbar
function enqueue_navbar_scripts() {
    wp_enqueue_script(
        'navbar-script',
        get_template_directory_uri() . '/js/navbar.js',
        array(), 
        '1.0.0', 
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_navbar_scripts');


// Nouvelle version - JS local prioritaire et indépendant
wp_enqueue_script(
    'thejs',
    get_template_directory_uri() . '/Assets/js/thejs.js',
    [], // Pas de dépendances - il sera chargé en premier
    filemtime(get_template_directory() . '/Assets/js/thejs.js'), // Version basée sur la dernière modification
    true
);

// Anime.js chargé séparément après car non primordial !
wp_enqueue_script(
    'anime-js',
    'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js',
    ['thejs'], // Dépendance au JS local ==> sinon bug et lag 
    '3.2.2',
    true
);





/*
        Custom Post Types pour les recherches et trajets !
 */
function fnf_register_post_types() {
    // Trajets CPT
    register_post_type('trajet', [
        'labels' => [
            'name' => 'Trajets',
            'singular_name' => 'Trajet',
            'add_new_item' => 'Ajouter un nouveau trajet',
            'edit_item' => 'Modifier le trajet',
            'all_items' => 'Tous les trajets',
            'view_item' => 'Voir le trajet',
            'search_items' => 'Rechercher un trajet',
            'not_found' => 'Aucun trajet trouvé',
            'not_found_in_trash' => 'Aucun trajet dans la corbeille',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'trajets'],
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);

    // Events CPT
    register_post_type('event', [
        'public' => true,
        'label'  => 'Événements',
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => ['category', 'post_tag'],
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
    ]);
}
add_action('init', 'fnf_register_post_types');

/*
    Customizer les champs de recherches 
 */
function fnf_register_meta_fields() {
    $meta_fields = [
        'from' => 'string',
        'to' => 'string',
        'people' => 'number',
        'date' => 'string'
    ];

    foreach ($meta_fields as $field => $type) {
        register_post_meta('trajet', $field, [
            'type' => $type,
            'single' => true,
            'show_in_rest' => true,
        ]);
    }
}
add_action('init', 'fnf_register_meta_fields');

/*
        gestion des rôles
 */
function fnf_setup_user_roles() {
    // Covoitureur role
    add_role('covoitureur', [
        'read' => true,
        'upload_files' => true,
    ]);

    // Conducteur role
    add_role('conducteur', [
        'read' => true,
        'upload_files' => true,
    ]);
}
add_action('init', 'fnf_setup_user_roles');

// Set default role for new users
add_action('user_register', function($user_id) {
    $user = new WP_User($user_id);
    $user->set_role('covoitureur');
});

/*
        Connexion et enregistrement !
 */
function fnf_handle_login() {
    if (!isset($_POST['login_submit'])) return;

    check_admin_referer('user_login_action', 'user_login_nonce');

    $creds = [
        'user_login' => sanitize_text_field($_POST['username']),
        'user_password' => sanitize_text_field($_POST['password']),
        'remember' => isset($_POST['remember'])
    ];

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        wp_redirect(add_query_arg('login_error', urlencode($user->get_error_message()), wp_get_referer()));
        exit;
    }

    wp_redirect(home_url());
    exit;
}
add_action('init', 'fnf_handle_login');



//Redirection après inscriptions réussies : 
function redirection_inscription() {
    if (isset($_POST['submit_inscription']) && !is_user_logged_in()) {
        // Vérifier si l'inscription a réussi
        if (!is_wp_error($user_id)) {
            // Redirection vers la page de profil après inscription
            wp_redirect(home_url('/login')); // Remplace '/my-profil' par l'URL de ta page profil
            exit;
        }
    }
}
add_action('template_redirect', 'redirection_inscription');



// Les règles de redirections : 
function fnf_redirect_rules() {
    // Les non-admins du site veulent accèder aux endroits admins ==> buiten
    if (is_admin() && !current_user_can('administrator') && !wp_doing_ajax()) {
        wp_redirect(home_url());
        exit;
    }

    // Si un non connecté veux rejoindre la page my-profil, il est foutu dehors, c'est logique
    if (!is_user_logged_in() && is_page('my-profil')) {
        wp_redirect(home_url());
        exit;
    }

    // Pas accèder à la page sans le /home, d'office redirigé !
    if (is_front_page()) {
        wp_redirect(home_url('/home/'));
        exit;
    }

    // Pour la page "add traject", ne pas laisser les non conducteurs accèder à la page
    if (is_page('add-a-traject')) {
        if (!is_user_logged_in()) {
            wp_redirect(wp_login_url());
            exit;
        }
        
        $user = wp_get_current_user();
        if (in_array('covoitureur', (array) $user->roles)) {
            wp_redirect(home_url());
            exit;
        }
    }

        // Bloquer l'accès aux pages de connexion et inscriptiosn pour qqn de déjà connecté
        if (is_user_logged_in()) {
            if (is_page('register') || is_page('login')) {  
                wp_redirect(home_url());
                exit;
            }
        }
}
add_action('template_redirect', 'fnf_redirect_rules');

// Tracker la dernière connexion pour la page profil !
function fnf_track_last_login($user_login, $user) {
    update_user_meta($user->ID, 'last_login', current_time('mysql'));
}
add_action('wp_login', 'fnf_track_last_login', 10, 2);