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
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Lier le JS Bootstrap depuis un CDN
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        ['jquery'],  // Ajouter jQuery comme dépendance
        '5.3.3',    // Ajouter la version
        true        // Charger dans le footer
    );

    wp_enqueue_script(
        'anime-js', // Nom unique pour le script
        'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js', // Lien CDN vers Anime.js
        [], // Pas de dépendances
        '3.2.2', // Version
        true // Charger dans le footer
    );

    // Lier votre fichier JS principal (utilisant Anime.js)
    wp_enqueue_script(
        'thejs', // Nom unique pour votre script local
        get_template_directory_uri() . '/Assets/js/thejs.js', // Chemin vers votre fichier JS
        ['anime-js'], // Dépendance à Anime.js
        null, // Pas de version spécifique
        true // Charger dans le footer
    );
}
add_action('wp_enqueue_scripts', 'styles_scripts');


// Fonction pour lier les styles personnalisés
function enqueue_custom_styles() {
    // Charger le fichier CSS principal
    wp_enqueue_style(
        'csspersonal', // Nom unique pour le fichier CSS
        get_template_directory_uri() . '/Assets/CSS/csspersonal.css', // Chemin vers le fichier
        ['bootstrap'], // Dépendance de Bootstrap pour s'assurer qu'il est chargé après
        filemtime(get_template_directory() . '/Assets/CSS/csspersonal.css') // Version basée sur la date de modification
    );

    // Ajouter le CSS spécifique à la page de connexion
    if (is_page_template('page-connexion.php')) {
        wp_enqueue_style(
            'fnf-login-styles', 
            get_template_directory_uri() . '/Assets/css/login.css', 
            ['bootstrap', 'csspersonal'], 
            filemtime(get_template_directory() . '/Assets/css/login.css')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

            //Lier le css pour le footer ==> car marchait pas le lien en haut, je ne sais pas pourquoi ? :
            function enqueue_footer_styles() {
                wp_enqueue_style('footer-style', get_template_directory_uri() . '/Assets/CSS/csspersonal.css');
            }
            add_action('wp_enqueue_scripts', 'enqueue_footer_styles');

                        //Lier le jquery ==> vérifier si on l'utilise dans le site 
                        function add_jquery() {
                            wp_deregister_script('jquery');
                            wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, '3.6.0');
                            wp_enqueue_script('jquery');
                        }
                        add_action('wp_enqueue_scripts', 'add_jquery');


/* POUR LA PAGE DE CREATION DE TRAJET ==> fonctionne à merveille, peut-être juste le ton a changé, les mots, mais dans le futur */
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




// Fonction pour gérer la connexion des utilisateurs ==> 100% fonctionnel, niquel chrome !
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

                    //Pour pas qu'un maroufle non administrateur ne se connecte et aille sur la version admin :
            function prevent_admin_access_for_non_admins() {
                if (is_user_logged_in() && !current_user_can('administrator')) {
                    wp_redirect(home_url());  // Redirige vers la page d'accueil
                    exit;
                }
            }
            add_action('admin_init', 'prevent_admin_access_for_non_admins');

                                //Ici, le reiriger vers une autre page directemment, a tester plus tard
                                function restrict_wp_admin_access() {
                                    if (is_user_logged_in() && !current_user_can('administrator') && is_admin()) {
                                        wp_redirect(home_url()); // Redirige l'utilisateur vers la page d'accueil (ou une autre page)
                                        exit;
                                    }
                                }
                                add_action('admin_init', 'restrict_wp_admin_access');



            //Si une personne non connecté tente d'aller sur l'url "my-profil", le dégager de suite, aller sur l'accueil
            function redirect_if_not_logged_in() {
                // Vérifie si l'utilisateur est connecté et si la page est "my-profil"
                if ( !is_user_logged_in() && is_page('my-profil') ) {
                    // Redirige vers la page d'accueil
                    wp_redirect( home_url() ); // Redirection vers l'accueil
                    exit();
                }
            }
            add_action('template_redirect', 'redirect_if_not_logged_in');
                
                
                /* ICI, CEST POUR LES ROLES SUR LE SITE WDP, PAS OUBLIER QUE YA 2 "SITES" ()==> + des barres nav que sites) DIFF */
                function add_custom_roles() {
                    // Ajouter un rôle "Utilisateur Covoitureur" par défaut
                    add_role('covoitureur', [
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

                function add_custom_driver_role() {
                    // Ajouter un rôle "Conducteur" avec des capacités personnalisées ==> surtout la navbar
                    add_role('conducteur', [
                        'read' => true,
                        'upload_files' => true, // Peut téléverser des fichiers
                        //'edit_posts' => true,  ==> Cette ligne serait pour que par exemple, il puisse créer des articles
                    ]);
                }
                add_action('init', 'add_custom_driver_role');
                            



        //Ici, simplement pour fair een sorte que https://fastnfriends.emu.isfsc.be/ ne soit pas accessible mais redirection sur /home ==> pour le seo et aussi ux !
        add_action('template_redirect', 'redirect_home_to_specific_page');

            function redirect_home_to_specific_page() {
            // Vérifie uniquement si on est sur la page d'accueil
            if (is_front_page()) {
                wp_redirect(home_url('/home/')); // Redirige vers la page /home
                exit;
                }
            }
            
//ajout event, post custom

            function create_event_post_type() {
                $args = array(
                    'public' => true,
                    'label'  => 'Événements',
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'taxonomies' => array('category', 'post_tag'),
                    'menu_icon' => 'dashicons-calendar',
                    'has_archive' => true,
                );
                register_post_type('event', $args);
            }
            add_action('init', 'create_event_post_type');



            //Ici, c'est pour la page d'ajouts de trajets ==> "add-a-traject" ==> 100% fonctionnel
                // Rediriger les utilisateurs qui n'ont pas le rôle "conducteur" sur l'accueil
                function restrict_page_access_for_roles() {
                    // Vérifie si on est sur la page Ajouter un Trajet
                    if (is_page('add-a-traject')) { 
                        // Vérifie si l'utilisateur est connecté
                        if (is_user_logged_in()) {
                            $user = wp_get_current_user();
                            // Rôle à vérifier
                            if (in_array('covoitureur', (array) $user->roles)) {
                                // Rediriger si le rôle est "covoitureur"
                                wp_redirect(home_url()); // Redirige vers la page d'accueil
                                exit;
                            }
                        } else {
                            // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
                            wp_redirect(wp_login_url());
                            exit;
                        }
                    }
                }
                add_action('template_redirect', 'restrict_page_access_for_roles');

                            //Pour être sur a 10000000% que ce sont _*$QUE LES CONDUCTEURS QUI PEUVENT PUBLIER UN TRAJET$*_ ==> mieux vaut être trop prudent, c'ets une bonne pratique !
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_trajet'])) {
                                $user = wp_get_current_user();
                            
                                // Vérifie si l'utilisateur est un conducteur
                                if (in_array('conducteur', (array) $user->roles)) {
                                    // Récupérer et valider les données du formulaire
                                    $from = sanitize_text_field($_POST['from']);
                                    $to = sanitize_text_field($_POST['to']);
                                    $people = intval($_POST['people']);
                                    $date = sanitize_text_field($_POST['date']);
                                    $description = sanitize_textarea_field($_POST['description']);
                            
                                    // Créer un nouveau trajet
                                    $trajet_id = wp_insert_post(array(
                                        'post_type' => 'trajet',
                                        'post_title' => "$from → $to",
                                        'post_content' => $description,
                                        'post_status' => 'publish',
                                        'meta_input' => array(
                                            'from' => $from,
                                            'to' => $to,
                                            'people' => $people,
                                            'date' => $date,
                                        ),
                                    ));
                            
                                    if ($trajet_id) {
                                        echo '<p style="color: green;">Ton trajet a été publié ! Apprête toi à être submergé sous les demandes !</p>';
                                    } else {
                                        echo '<p style="color: red;">Problemo lors de la publication du trajet, réésaye</p>';
                                    }
                                } else {
                                    // Si l'utilisateur n'est pas conducteur ==> s'ils paviennet quand même à acceder à la page ce qui me parrait impossible ! 
                                    echo '<p style="color: red;">Seuls les conducteurs peuvent ajouter un trajet.</p>';
                                }
                            }
        



    //Page profil ==> récupération de la dernière connexion, l'heure, pour ensuite l'injecté dans la page profil :
    function track_last_login($user_login, $user) {
        update_user_meta($user->ID, 'last_login', current_time('mysql'));
    }
    add_action('wp_login', 'track_last_login', 10, 2);
    

        
        


        
?>