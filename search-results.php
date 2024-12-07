<?php
/* Template Name: Résultats de recherche */

get_header();

// Récupération des données envoyées par le formulaire avec sécurisation
$from = isset($_GET['from']) ? sanitize_text_field($_GET['from']) : 'Non spécifié';
$to = isset($_GET['to']) ? sanitize_text_field($_GET['to']) : 'Non spécifié';
$people = isset($_GET['people']) ? intval($_GET['people']) : 1;
$date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : 'Non spécifiée';

?>

<div class="container">
    <!-- Carte contenant les résultats de la recherche -->
    <div class="card">
        <div class="card-header">
            <h2>Résultats de ta recherche</h2>
        </div>
        <div class="card-body">
            <!-- Affichage des résultats -->
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
</div>


<?php
get_footer();

