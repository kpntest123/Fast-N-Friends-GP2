<?php
/* Template Name: Devenir un conducteur */
get_header();?>

<div class="verif-page-container">
    <div class="verif-container-form">
        <h2 class="verif-title">
            Pour vous faire vérifier, vous devez envoyer votre carte d'identité recto-verso. 
            Vous recevrez votre vérification dans les 24 heures qui suivent. <!-- SOIT COMME CA, OU ALORS, une fois qu'on a la ID, devenir automatiquement conducteur, j'ai rien dis c'était une connerie -->
        </h2> 
        <form id="verif-form" action="#" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="carteID" class="verif-form-label">
                    Carte d'identité (recto-verso)
                </label>
                <input 
                type="file" 
                class="verif-form-control" 
                id="carteID" 
                name="carteID[]" 
                accept="image/jpeg, image/png, image/jpg, image/gif, image/webp, image/bmp, image/tiff, image/heic, image/heif" 
                multiple
                >

                
                <br>

                <small>Tout formats d'images acceptés. Maximum : 2 images.</small>
            </div>
            <div>
                <button type="submit" class="verif-btn-submit">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('verif-form').addEventListener('submit', function(event) {
    const input = document.getElementById('carteID');
    const files = input.files;
    const allowedTypes = ['image/jpeg', 'image/png'];
    
    // Vérification du nombre d'images
    if (files.length === 0) {
        alert("Veuillez sélectionner deux images pour la vérification.");
        event.preventDefault();
        return;
    }

    if (files.length > 2) {
        alert("Vous ne pouvez téléverser que 2 images maximum.");
        event.preventDefault();
        return;
    }
    
    // Vérification des types de fichiers
    for (let i = 0; i < files.length; i++) {
        if (!allowedTypes.includes(files[i].type)) {
            alert("Seuls les fichiers JPEG et PNG sont autorisés. SVG n'est pas accepté.");
            event.preventDefault();
            return;
        }
    }

    alert("Fichiers valides. Téléversement en cours...");
});
</script>

<?php get_footer(); ?>