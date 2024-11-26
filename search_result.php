<?php
/* Template Name: Résultats de recherche */
get_header();

$from = isset($_GET['from']) ? sanitize_text_field($_GET['from']) : '';
$to = isset($_GET['to']) ? sanitize_text_field($_GET['to']) : '';
$people = isset($_GET['people']) ? intval($_GET['people']) : 1;
$date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : '';

?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center" style="background-color: #4B9BEB;">
            <h2 class="mb-0" style="color: #000; font-size: 1.625rem;">Ta recherche</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 text-right font-weight-bold">Aller de :</div>
                <div class="col-6 font-weight-bold"><?php echo esc_html($from); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 text-right font-weight-bold">Vers :</div>
                <div class="col-6 font-weight-bold"><?php echo esc_html($to); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 text-right font-weight-bold">Nombre de gens :</div>
                <div class="col-6 font-weight-bold"><?php echo esc_html($people); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-6 text-right font-weight-bold">En date du :</div>
                <div class="col-6 font-weight-bold"><?php echo esc_html($date); ?></div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
