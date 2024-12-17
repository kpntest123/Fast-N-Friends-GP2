<footer>
        <p>&copy; <?php echo date('Y'); ?> Fast 'N Friends. Tous droits réservés.</p>











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


            <div class="column-TDR"> <!-- COLONE QUI SERA A METTRE EN DESSOUS, SIMPLE LIGNE au centre -->
                <h3>&copy; Fast 'N Friends 2025. Tous droits réservés</h3>
            </div>
    </footer>










    </footer> <!-- Footer de la page, mais pas du footer footer, oui je sais ce que je dis tqt-->

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
