<?php
/* Template Name: Ajouter un Trajet */
get_header();
// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_trajet'])) {
    // Récupération des données du formulaire
    $from = sanitize_text_field($_POST['from']);
    $to = sanitize_text_field($_POST['to']);
    $people = intval($_POST['people']);
    $date = sanitize_text_field($_POST['date']);
    $description = sanitize_textarea_field($_POST['description']);
    
    // Filtres supplémentaires
    $ladies_only = isset($_POST['ladies_only']) ? 1 : 0;
    $heating = isset($_POST['heating']) ? 1 : 0;
    $pets_allowed = isset($_POST['pets_allowed']) ? 1 : 0;

    // Création du trajet
    $trajet_data = array(
        'post_title' => $from . ' à ' . $to,
        'post_content' => $description,
        'post_type' => 'trajet', // Assurez-vous que ce type existe, ou remplacez-le par un type personnalisé
        'post_status' => 'publish',
        'meta_input' => array(
            'from' => $from,
            'to' => $to,
            'people' => $people,
            'date' => $date,
            'ladies_only' => $ladies_only,
            'heating' => $heating,
            'pets_allowed' => $pets_allowed,
        ),
    );

    // Insertion dans la base de données
    wp_insert_post($trajet_data);
}

?>

<div class="blue-separation">
    <h1>Ajoute un trajet</h1>
</div>

<div class="AAT-form-container" id="AAT-form-container">
    <form method="POST" id="AAT-form">
        <label for="from" class="AAT-label" id="AAT-label-from">De :</label>
        <input type="text" id="AAT-from" name="from" class="AAT-input" required />

        <label for="to" class="AAT-label" id="AAT-label-to">Vers :</label>
        <input type="text" id="AAT-to" name="to" class="AAT-input" required />

        <label for="people" class="AAT-label" id="AAT-label-people">Places disponibles :</label>
        <input type="number" id="AAT-people" name="people" class="AAT-input" required />

        <label for="date" class="AAT-label" id="AAT-label-date">Date :</label>
        <input type="date" id="AAT-date" name="date" class="AAT-input" required />

        <label for="description" class="AAT-label" id="AAT-label-description">Description :</label>
        <textarea id="AAT-description" name="description" class="AAT-input" rows="4"></textarea>

        <!-- Filtres supplémentaires -->
        <div class="AAT-extra-options">
            <label for="ladies_only">
                <input type="checkbox" id="ladies_only" name="ladies_only"> Ladies Only
            </label>

            <label for="heating">
                <input type="checkbox" id="heating" name="heating"> Chauffage
            </label>

            <label for="pets_allowed">
                <input type="checkbox" id="pets_allowed" name="pets_allowed"> Animaux autorisés
            </label>
        </div>

        <button type="submit" name="submit_trajet" id="AAT-submit" class="AAT-button">Ajouter un trajet</button>
    </form>
</div>


<?php get_footer(); ?>
