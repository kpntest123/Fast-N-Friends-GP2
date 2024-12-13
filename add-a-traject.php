<?php
/* Template Name: Ajouter un Trajet */
get_header();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_trajet'])) {
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
        echo '<p style="color: green;">Ton trajet a été publié ! Apprête toi à être subermgé</p>';
    } else {
        echo '<p style="color: red;">Probelmo</p>';
    }
}
?>

<div style="background-color: #3d3db3; text-align: center; padding: 25px;">
    <h1>Ajoute un trajet</h1>
</div>

<div class="AAT-form-container" id="AAT-form-container">
    <div class="AAT-header" id="AAT-header">
        <h1 id="AAT-title">Ajouter un trajet</h1>
    </div>
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

        <button type="submit" name="submit_trajet" id="AAT-submit" class="AAT-button">Ajouter un trajet</button>
    </form>
</div>

<?php get_footer(); ?>
