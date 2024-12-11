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
        get_template_directory_uri() . '/Assets/js/thejs.js',
        ['bootstrap-bundle'], // Dépend de Bootstrap
        null,   // Pas de version spécifique
        true    // Charger dans le footer
    );
}

wp_enqueue_script(
    'anime-master',
    get_template_directory_uri() . 'Assets\anime-master\lib\anime.min.js', 
    [], 
    '3.2.2', 
    true 
);


add_action('wp_enqueue_scripts', 'styles_scripts');

//Lier notre CSS personnalisé :
function enqueue_custom_styles() {
    // Charger le fichier CSS principa
    wp_enqueue_style(
        'csspersonal', // Nom unique pour le fichier CSS
        get_template_directory_uri() . '/Assets/CSS/csspersonal.css', // Chemin vers le fichier
        array(), // Dépendances (s'il y a un fichier CSS à charger avant)
        null // Pas de version (ou utilise `filemtime()` pour auto-versionner)
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

            //Lier le css pour le footer ==> car marchait pas le lien en haut:
            function enqueue_footer_styles() {
                wp_enqueue_style('footer-style', get_template_directory_uri() . '/Assets/CSS/csspersonal.css');
            }
            add_action('wp_enqueue_scripts', 'enqueue_footer_styles');

//Lier le jquery
function add_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, '3.6.0');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'add_jquery');


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



//Ici, je pense que c'est l'accès a WP-ADMIN        
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

        function redirect_if_not_logged_in() {
            // Vérifie si l'utilisateur est connecté et si la page est "my-profil"
            if ( !is_user_logged_in() && is_page('my-profil') ) {
                // Redirige vers la page d'accueil
                wp_redirect( home_url() ); // Redirection vers l'accueil
                exit();
            }
        }
        add_action('template_redirect', 'redirect_if_not_logged_in');

                    //Pour pas qu'un maroufle non administrateur ne se connecte et aille sur la version admin :
            function prevent_admin_access_for_non_admins() {
                if (is_user_logged_in() && !current_user_can('administrator')) {
                    wp_redirect(home_url());  // Redirige vers la page d'accueil
                    exit;
                }
            }
            add_action('admin_init', 'prevent_admin_access_for_non_admins');

                                //Ici, le reiriger vers une autre page direcetmment, a tester plus tard
                                function restrict_wp_admin_access() {
                                    if (is_user_logged_in() && !current_user_can('administrator') && is_admin()) {
                                        wp_redirect(home_url()); // Redirige l'utilisateur vers la page d'accueil (ou une autre page)
                                        exit;
                                    }
                                }
                                add_action('admin_init', 'restrict_wp_admin_access');




                /* ICI, CEST POUR LES ROLES SUR LE SITE WDP, PAS OUBLIER QUE YA 2 "SITES" DIFF */
                function add_custom_roles() {
                    // Ajouter un rôle "Utilisateur Covoitureur" par défaut
                    add_role('covoitureur', 'Covoitureur', [
                        'read' => true, // Peut lire les contenus publics
                        'upload_files' => true, // Permissions de téléversement de fichiers, se sera utile plus tard !
                        'edit_posts' => false,   // Pas d'accès à l'éditeur d'articles
                    ]);
                }
                add_action('init', 'add_custom_roles');

                // Définir le rôle par défaut pour les nouveaux utilisateurs
                function set_default_user_role($user_id) {
                    $user = new WP_User($user_id);
                    $user->set_role('covoitureur'); // Assigne le rôle "Covoitureur" aux nouveaux inscrits
                }
                add_action('user_register', 'set_default_user_role');



        //Ici, simplement pour fair een sorte que https://fastnfriends.emu.isfsc.be/ ne soit pas accessible mais redirection sur /home 
        add_action('template_redirect', 'redirect_home_to_specific_page');

            function redirect_home_to_specific_page() {
            // Vérifie uniquement si on est sur la page d'accueil
            if (is_front_page()) {
                wp_redirect(home_url('/home/')); // Redirige vers la page /home
                exit;
                }
            }

?>
