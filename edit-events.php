<?php
/* Template Name: Éditer un événement */
get_header();

// Traitement du formulaire (ajout événement)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['TitreArt'])) {
    // Récupérer les données du formulaire
    $titre = sanitize_text_field($_POST['TitreArt']);
    $description = sanitize_textarea_field($_POST['Description']);
    $tag = sanitize_text_field($_POST['Tag']);
    $lieu = sanitize_text_field($_POST['Lieu']);
    $date = sanitize_text_field($_POST['birthday']);
    
    // Créer un nouvel événement (Custom Post Type 'event')
    $post_data = array(
        'post_title'    => $titre,
        'post_content'  => $description,
        'post_status'   => 'publish',
        'post_type'     => 'event', // Custom post type
        'meta_input'    => array(
            'tag'   => $tag,
            'lieu'  => $lieu,
            'date'  => $date,
        )
    );

    // Insérer l'événement dans la base de données
    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        // Ajouter l'image vignette si elle est téléchargée
        if (!empty($_FILES['image-article']['tmp_name'])) {
            $attachment_id = media_handle_upload('image-article', $post_id);
            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            }
        }

        echo '<div class="alert alert-success">L\'événement a été ajouté avec succès !</div>';
    } else {
        echo '<div class="alert alert-danger">Une erreur est survenue lors de l\'ajout de l\'événement.</div>';
    }
}
?>

<div class="blue-separation"> </div>
<br><br><br><br>
<div class=body-edit-info>
    <div class="edit-info-event-title">
        <h1 class=edit-info-event-title>Vignette de l'article</h1>
    </div>

    <form name="edit-article" id="edit-article" action="" method="POST" enctype="multipart/form-data" class=edit-info-form>
    <div class="EMP-container">
        <!-- Titre de l'article -->
        <div class="row mb-3">
            <label for="TitreArt" class="col-sm-2 col-form-label edit-info-event-label">Titre Article</label>
            <div class="col-sm-10">
                <input type="text" name="TitreArt" class="form-control edit-info-event-input" id="TitreArt" required>
            </div>
        </div>

        <!-- Description -->
        <div class="row mb-3">
            <label for="Description" class="col-sm-2 col-form-label edit-info-event-label">Description</label>
            <div class="col-sm-10">
                <textarea name="Description" class="form-control edit-info-event-input" id="Description" rows="2" required></textarea>
            </div>
        </div>

        <!-- Tag -->
        <div class="row mb-3">
            <label for="Tag" class="col-sm-2 col-form-label edit-info-event-label">Tag</label>
            <div class="col-sm-10">
                <select name="Tag" class="form-control edit-info-event-input" id="Tag" required>
                    <option>Concert</option>
                    <option>Bal</option>
                    <option>Fête</option>
                    <option>Expo</option>
                    <option>Sport</option>
                    <option>Festival</option>
                </select>
            </div>
        </div>

        <!-- Lieu -->
        <div class="row mb-3">
            <label for="Lieu" class="col-sm-2 col-form-label edit-info-event-label">Lieu</label>
            <div class="col-sm-10">
                <select name="Lieu" class="form-control edit-info-event-input" id="Lieu" required>
                    <!-- Liste de lieux -->
                                           <option>Bruxelles</option>
                        <option>Anvers</option>
                        <option>Gand</option>
                        <option>Charleroi</option>
                        <option>Liège</option>
                        <option>Bruges</option>
                        <option>Namur</option>
                        <option>Louvain</option>
                        <option>Mons</option>
                        <option>Alost</option>
                        <option>Malines</option>
                        <option>La Louvière</option>
                        <option>Courtrai</option>
                        <option>Hasselt</option>
                        <option>Ostende</option>
                        <option>Seraing</option>
                        <option>Saint-Nicolas</option>
                        <option>Tournai</option>
                        <option>Genk</option>
                        <option>Roulers</option>
                        <option>Mouscron</option>
                        <option>Verviers</option>
                        <option>Beveren</option>
                        <option>Beringen</option>
                        <option>Louvain-la-Neuve</option>
                </select>
            </div>
        </div>

        <!-- Date -->
        <div class="row mb-3">
            <label for="birthday" class="col-sm-2 col-form-label edit-info-event-label">Date</label>
            <div class="col-sm-10">
                <input type="date" name="birthday" id="birthday" class="form-control edit-info-event-input" required>
            </div>
        </div>

        <!-- Image d'illustration -->
        <div class="row mb-3">
            <label for="image-article" class="col-sm-2 col-form-label edit-info-event-label">Image d'illustration</label>
            <div class="col-sm-10">
                <input type="file" name="image-article" class="form-control edit-info-event-input" id="image-article" accept="image/*">
            </div>
        </div>

        <!-- Bouton Ajouter -->
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="edit-info-event-btn">Ajouter l'événement</button>
            </div>
        </div>
    </div>
</form>

<br>
    <div class="edit-info-event-title">
        <h1 class=edit-info-event-title>Article</h1>
    </div>

    <form name="edit-article" id="edit-article" class=edit-info-form>
        <div class="EMP-container">
            <!-- Description détaillée -->
            <div class="row mb-3">
                <label for="DescriptionDet" class="col-sm-2 col-form-label edit-info-event-label">Description détaillée de l'événement</label>
                <div class="col-sm-10">
                    <textarea class="form-control edit-info-event-input" id="DescriptionDet" rows="15"></textarea>
                </div>
            </div>

            <!-- Image d'illustration -->
            <div class="row mb-3">
                <label for="image-article" class="col-sm-2 col-form-label edit-info-event-label">Image d'illustration</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control edit-info-event-input" id="image-article">
                </div>
            </div>

            <!-- Bouton Ajouter -->
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="edit-info-event-btn">
                        Ajouter l'événement
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
    <br><br><br>

<?php get_footer(); ?>