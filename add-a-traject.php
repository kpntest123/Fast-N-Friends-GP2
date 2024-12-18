<?php
/* Template Name: Ajouter un Trajet */
get_header();
?>

<div class="blue-separation">
    <h1>Ajoute un trajet</h1>
</div>
<br>
<div class="AAT-Margin-Page"></div>
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

        <button type="submit" name="submit_trajet" id="AAT-submit" class="AAT-button">Ajouter un trajet</button>
    </form>
</div>
<br>
<?php get_footer(); ?>
