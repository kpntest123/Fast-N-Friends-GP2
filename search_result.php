<?php
/* Template Name: Résultats de recherche */
get_header();

$from = isset($_GET['from']) ? sanitize_text_field($_GET['from']) : '';
$to = isset($_GET['to']) ? sanitize_text_field($_GET['to']) : '';
$people = isset($_GET['people']) ? intval($_GET['people']) : 1;
$date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : '';

echo '<h2>Ta recherche :</h2>';
echo '<p><strong>Aller de</strong> ' . $from . '</p>';
echo '<p><strong>Vers :</strong> ' . $to . '</p>';
echo '<p><strong>Nombre de gens :</strong> ' . $people . '</p>';
echo '<p><strong>En date du :</strong> ' . $date . '</p>';

// Plus tard ajouter ici la requête pour afficher les trajets correspondants



get_footer(); ?>
