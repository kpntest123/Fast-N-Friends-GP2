<footer>
        <p>&copy; <?php echo date('Y'); ?> Fast 'N Friends. Tous droits réservés.</p>

        <!-- Pied de page -->
<footer class="footer">
    <div class="column logo">
        <img src="futur lien du logo que je dois foutre ici" alt="Logo">
        <div>
            <h1>Fast 'N Friends</h1>
        </div>
    </div>
    <div class="column">
        <h3>
            <a href="Page D'accueil.html">Accueil</a>
        </h3>
        <h3>Découvrir les scouts</h3>
        <a href="Erreur 404/Erreur 404 !.html">Le scoutisme c'est quoi ?</a>
        <a href="Erreur 404/Erreur 404 !.html">Les sections</a>
        <a href="Erreur 404/Erreur 404 !.html">La lois scouts</a>

        <!-- FOOTER DEPENDANT DE SI CONNECTE OU PAS CONNECTE -->

        <h3>Mon compte :</h3>

                <?php
                // Démarrer la session PHP
                session_start();

                // Vérifie si l'utilisateur est connecté (exemple : une variable de session appelée 'logged_in' est définie)
                $is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
                ?>

                <?php if ($is_logged_in): ?>
                    <!-- Si l'utilisateur est connecté -->
                    <a href="modifier_profil.php">Modifier profil</a>
                    <a href="chat.php">Chat</a>
                    <a href="deconnexion.php">Déconnexion</a>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas connecté -->
                    <a href="connexion.php">Connexion</a>
                    <a href="inscription.php">Inscriptions</a>
                <?php endif; ?>
            </div>

            <!-- Fin du FOOTER DEPENDANT DE SI CONNECTE OU PAS CONNECTE -->

    
    </div>
    <div class="column">
        <h3>
            <a href="Erreur 404/Erreur 404 !.html">Location</a>
        </h3>
        <h3>Espaces membres</h3>
        <a href="Erreur 404/Erreur 404 !.html">Déjà inscrit</a>
        <a href="Erreur 404/Erreur 404 !.html">Pas encore inscrit</a>
        <h3>
            <a href="Page de contact.html">Contacts</a>
        </h3>
    </div>
    <!--

    FACEBOOK : 

    <div class="column social">
        <h3>Suivez-nous sur Facebook !</h3>
        <a href="https://www.facebook.com/profile.php?id=100064804988393"><img src="Images/facedebook.png" alt="Facebook" width="24"></a>
    </div>
    
    -->
    <div class="column newsletter">
        <h3><em>Vous souhaitez être au courant de toutes les dernières news ?</em> <strong>Inscrivez-vous à notre newsletter !</strong></h3>
        <input type="email" placeholder="Votre e-mail">
        <button onclick="submitNewsletter()">Soumettre</button>
        <div class="message"><i>Voilà, c'est fait ! Vous êtes inscrit</i></div>
    </div>
</footer>
    </footer>


    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
