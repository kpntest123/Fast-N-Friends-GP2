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
        echo '<p style="color: green;">Tu as bien publié ton trajet !</p>';
    } else {
        echo '<p style="color: red;">Oops, erreur, réessaye !</p>';
    }
}
?>

<h2>Ajouter un trajet</h2>
<form method="POST">
    <label>De :</label>
    <input type="text" name="from" required />

    <label>Vers :</label>
    <input type="text" name="to" required />

    <label>Pour combien de personnes :</label>
    <input type="number" name="people" required />

    <label>Date :</label>
    <input type="date" name="date" required />

    <label>Description :</label>
    <textarea name="description" rows="4"></textarea>

    <button type="submit" name="submit_trajet">Créer le trajet</button>
</form>

<?php get_footer(); ?>
