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

        <script>

    <!-- Script filtres -->

    let selectedCity = "";
let selectedTag = "";
let selectedDate = "";

document.querySelectorAll("#cityDropdown .dropdown-item").forEach(item => {
    item.addEventListener("click", () => {
        selectedCity = item.textContent;
        filterEvents();
        updateActiveFilter(document.querySelectorAll("#cityDropdown .dropdown-item"), item.textContent);
    });
});

document.querySelectorAll("#tagDropdown .dropdown-menu .dropdown-item").forEach(item => {
    item.addEventListener("click", (e) => {
        e.preventDefault(); 
        selectedTag = item.textContent.trim();
        filterEvents();
        updateActiveFilter(document.querySelectorAll("#tagDropdown .dropdown-menu .dropdown-item"), item.textContent.trim());
    });
});

document.getElementById("datePicker").addEventListener("change", (event) => {
    selectedDate = event.target.value;
    filterEvents();
});

function filterEvents() {
    const filteredEvents = events.filter(event => {
        const matchesCity = !selectedCity || event.city === selectedCity;
        const matchesTag = !selectedTag || event.tag === selectedTag;

        const [day, month, year] = event.date.split('/');
        const eventDate = new Date(year, month - 1, day);
        const selectedDateObj = selectedDate ? new Date(selectedDate) : null;

        const matchesDate = !selectedDate || (selectedDateObj && eventDate.getFullYear() === selectedDateObj.getFullYear() &&
            eventDate.getMonth() === selectedDateObj.getMonth() && eventDate.getDate() === selectedDateObj.getDate());

        return matchesCity && matchesTag && matchesDate;
    });

    renderEvents(filteredEvents);
}

function updateActiveFilter(menuItems, selectedValue) {
    menuItems.forEach(item => {
        item.classList.remove("active-filter");
        if (item.textContent === selectedValue) {
            item.classList.add("active-filter");
        }
    });
}

document.getElementById("resetFilters").addEventListener("click", () => {
    selectedCity = "";
    selectedTag = "";
    selectedDate = "";

    document.querySelectorAll("#cityDropdown .dropdown-item, #tagDropdown .dropdown-item").forEach(item => {
        item.classList.remove("active-filter");
    });

    document.getElementById("datePicker").value = "";
    renderEvents(events);
});


// Animations cards

const observerOptions = {
            root: null, 
            threshold: 0.5 
        };

        
        function animateCard(card, direction) {
            anime({
                targets: card,
                translateX: direction === 'left' ? ['-100vw', '0'] : ['100vw', '0'],
                opacity: [0, 1],
                duration: 1500,
                easing: 'easeOutExpo'
            });
        }

       
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    
                    const card = entry.target;
                    const direction = card.classList.contains('fond-card-1') ? 'right' : 'left';
                    animateCard(card, direction);

                    
                    observer.unobserve(card);
                }
            });
        }, observerOptions);

        
        document.querySelectorAll('.fond-card-1, .fond-card-1-miroir').forEach(card => {
            observer.observe(card);
        });
    </script>

    <!-- Script d'animation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

<script src="Assets\anime-master\lib\anime.js"></script>
</body>
</html>



    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
