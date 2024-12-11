<?php
/* Template Name: Devenir un conducteur */?>

<div class="verif-page-container">
        <div class="verif-container-form">
            <h2 class="verif-title">
                Pour vous faire vérifier, vous devez envoyer votre carte d'identité recto-verso. 
                Vous recevrez votre vérification dans les 24 heures qui suivent. <!-- JUSTE SE DECIDE SI ON DIS, TENVOIE TA CARTE ET VSY TES VERIFS OU ALORS CEST VERFI MANUELS...???...-->
            </h2> 
            <form action="">
                <div class="mb-4">
                    <label for="Pseudo" class="verif-form-label">Carte d'identité (recto-verso)</label>
                    <input type="file" class="verif-form-control" id="Pseudo">
                </div>
                <div>
                    <button type="submit" class="verif-btn-submit">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>