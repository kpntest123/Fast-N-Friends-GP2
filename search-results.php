<?php
/* Template Name: Résultats de recherche */

get_header();

// Récupération des données envoyées par le formulaire avec sécurisation
$from = isset($_GET['from']) ? sanitize_text_field($_GET['from']) : 'Non spécifié';
$to = isset($_GET['to']) ? sanitize_text_field($_GET['to']) : 'Non spécifié';
$people = isset($_GET['people']) ? intval($_GET['people']) : 1;
$date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : 'Non spécifiée';
?>


<?php
// Construire la requête selon les critères
$args = array(
    'post_type' => 'trajet',  // Type de publication (assurez-vous que c'est le bon)
    'posts_per_page' => -1,   // Nombre de résultats
    'meta_query' => array(
        'relation' => 'AND',
        // Filtrer selon les critères de base (lieu de départ et arrivée)
        array(
            'key'     => 'from',
            'value'   => $from,
            'compare' => 'LIKE',
        ),
        array(
            'key'     => 'to',
            'value'   => $to,
            'compare' => 'LIKE',
        ),
    ),
);

// Filtrer par date (si la date est renseignée) et trier les résultats
if ($date !== 'Non spécifiée') {
    $args['meta_query'][] = array(
        'key'     => 'date',
        'value'   => $date,
        'compare' => '>=',  // Trajets plus proches de la date
        'type'    => 'DATE',
    );
}

// Filtrer par nombre de places (si le nombre de personnes est renseigné)
if ($people > 0) {
    $args['meta_query'][] = array(
        'key'     => 'people',
        'value'   => $people,
        'compare' => '>=', // Trajets avec au moins le nombre de places demandé
        'type'    => 'NUMERIC',
    );
}

// Tri des résultats par date (proche de la date entrée par l'utilisateur)
$args['orderby'] = array(
    'meta_value' => 'ASC',  // Trier par la valeur de la date
);

// Exécution de la requête
$query = new WP_Query($args);
?>

<div class="container-search-results">
    <!-- Carte principale avec les critères de recherche -->
    <div class="card">
        <div class="card-header">
            <h1>Résultats de ta recherche</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 col-left">Tu voulais aller de :</div>
                <div class="col-6 col-right"><?php echo esc_html($from); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-left">Pour aller à :</div>
                <div class="col-6 col-right"><?php echo esc_html($to); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-left">Pour autant de personnes :</div>
                <div class="col-6 col-right"><?php echo esc_html($people); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-left">En date du :</div>
                <div class="col-6 col-right"><?php echo esc_html($date); ?></div>
            </div>
        </div>
    </div>

    <!-- Affichage des résultats sous forme de cartes -->
    <?php if ($query->have_posts()) : ?>
        <div class="row mt-4 d-flex justify-content-center">
        <?php
            // Affichage des cartes pour chaque trajet trouvé
            while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="card-body">
                            <p><strong>De :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'from', true)); ?></p>
                            <p><strong>À :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'to', true)); ?></p>
                            <p><strong>Places disponibles :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'people', true)); ?></p>
                            <p><strong>Date :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'date', true)); ?></p>
                            <p><strong>Description :</strong> <?php the_content(); ?></p>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <!-- Message si aucun trajet n'est trouvé -->
        <div class="alert alert-warning mt-4">
            Aucun trajet trouvé.
        </div>
    <?php endif; ?>

</div>

<?php
wp_reset_postdata();

get_footer();
