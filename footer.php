<footer>


        <!-- Pied de page -->
        <footer class="footer">
            <div class="column logo">
                <a id="fnffooter" href="<?php echo home_url(); ?>">FAST 'N FRIENDS</a>
            </div>
            
            <div class="column">
                <h1>
                    <a href="<?php echo home_url('deep-search'); ?>">Rechercher un trajet</a>
                </h1>

                <h1>H1</h1>
                <a href="Erreur 404/Erreur 404 !.html">Lorem 1</a>
                <a href="Erreur 404/Erreur 404 !.html">Lorem 2</a>
                <a href="Erreur 404/Erreur 404 !.html">Lorem 3</a>
                <br><br><br><br>
                <h3>&copy; <?php echo date('Y'); ?> Fast 'N Friends. Tous droits réservés.</h3>
            </div>

            <div class="column"> <!-- DEUXIEME COLONNE-->
                <h1>
                    <a>Mon compte</a>
                </h1>

                <!-- Si l'utilisateur n'est pas connecté, ceci s'affiche :-->
                <?php if ( !is_user_logged_in() ) : ?>
                    <h3><a href="<?php echo home_url('login'); ?>">Me connecter</a></h3>
                    <h3><a href="<?php echo home_url('register'); ?>">M'inscrire</a></h3>
                <?php else : ?>

                    <!-- Si l'utilisateur est connecté ==> conditions de base -->
                    <h3><a href="<?php echo home_url('profile'); ?>">Mon profil</a></h3>
                    <h3><a href="<?php echo home_url('chat'); ?>">Chat</a></h3>

                    <!-- Si l'utilisateur a le rôle "conducteur" ==> conditions avancées -->
                    <?php if (current_user_can('conducteur')): ?>
                        <h3><a href="<?php echo home_url('/add-a-traject'); ?>">Publier un trajet</a></h3>
                    <?php endif; ?>

                    <!-- Lien de déconnexion pour tout le monde de connecté -->
                    <h3><a href="<?php echo wp_logout_url(home_url()); ?>">Déconnexion</a></h3>
                <?php endif; ?>
            </div>

            <div>
                <h1>Informations légales</h1>
                <h3><a href="<?php echo home_url('/404'); ?>">Legal Notice</a></h3>
                <h3><a href="<?php echo home_url('/404'); ?>">Terms of Service</a></h3>
                <h3><a href="<?php echo home_url('/404'); ?>">Privacy Policy</a></h3>
            </div>                    
    </footer>

    </footer> <!-- Footer de la page, mais pas du footer footer, oui je sais ce que je dis tqt-->



    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
