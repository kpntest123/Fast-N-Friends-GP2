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

    
const cities = [
        "Bruxelles", "Anvers", "Gand", "Charleroi", "Liège", "Bruges", "Namur",
        "Louvain", "Mons", "Alost", "Malines", "La Louvière", "Courtrai",
        "Hasselt", "Ostende", "Seraing", "Saint-Nicolas", "Tournai", "Genk",
        "Roulers", "Mouscron", "Verviers", "Beveren", "Beringen", "Louvain-la-Neuve"
    ];

    const cityDropdown = document.getElementById('cityDropdown');

    cities.forEach(city => {
        const cityItem = document.createElement('li');
        const cityLink = document.createElement('a');
        cityLink.className = 'dropdown-item';
        cityLink.href = '#';
        cityLink.textContent = city;
        cityItem.appendChild(cityLink);
        cityDropdown.appendChild(cityItem);
    });






    <!-- Script filtres -->

    const events = [
{ name: "Fête du vin", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "15/01/2025", city: "Liège", tag: "Fête" },
{ name: "Anima à Flagey", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "16/01/2025", city: "Bruxelles", tag: "Festival" },
{ name: "JardinExpo", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "18/01/2025", city: "Liège", tag: "Expo" },
{ name: "Grand Feu de bouge", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "23/01/2025", city: "Namur", tag: "Fête" },
{ name: "Belgique vs France", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "24/01/2025", city: "Bruxelles", tag: "Sport" },
{ name: "Bal de Charleroi", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "25/01/2025", city: "Charleroi", tag: "Bal" },
{ name: "Concert de Jul", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "27/01/2025", city: "Genk", tag: "Concert" },
{ name: "Saint Glinglin", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "30/01/2025", city: "Anvers", tag: "Fête" },
{ name: "Diable Rouge vs Anderlech", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "01/02/2025", city: "Liège", tag: "Sport" },
{ name: "Salon de l'auto", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "03/02/2025", city: "Bruxelles", tag: "Expo" },
{ name: "Bal de Mouscron", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "05/02/2025", city: "Mouscron", tag: "Bal" },
{ name: "Festival brassicole", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", date: "05/02/2025", city: "Tournai", tag: "Festival" }
];

const eventContainer = document.querySelector(".event-container");

function renderEvents(filteredEvents) {
eventContainer.innerHTML = "";

filteredEvents.forEach(event => {
    const eventCard = `
    <div class="event-card">
        <div class="placeholder-box">${event.date} - ${event.city}</div>
        <div class="event-tag">${event.tag}</div>
        <div class="event-info">
            <h4>${event.name}</h4>
            <p>${event.description}</p>
        </div>
    </div>
    `;
    
    eventContainer.innerHTML += eventCard;
});
}
renderEvents(events);

let selectedCity = "";
let selectedTag = "";
let selectedDate = "";


document.querySelectorAll("#cityDropdown .dropdown-item").forEach(item => {
item.addEventListener("click", () => {
    selectedCity = item.textContent;
    filterEvents();
    updateActiveFilter(
        document.querySelectorAll("#cityDropdown .dropdown-item"), 
        item.textContent
    );
});
});


document.querySelectorAll("#tagDropdown .dropdown-menu .dropdown-item").forEach(item => {
item.addEventListener("click", (e) => {
    e.preventDefault(); 
    selectedTag = item.textContent.trim();
    filterEvents();
    updateActiveFilter(
        document.querySelectorAll("#tagDropdown .dropdown-menu .dropdown-item"), 
        item.textContent.trim()
    );
});
});
const tagItems = document.querySelectorAll('ul[aria-labelledby="dropdownMenuButton"] .dropdown-item');

tagItems.forEach(item => {
item.addEventListener('click', (e) => {
    e.preventDefault();
    selectedTag = item.textContent.trim();
    console.log("Selected tag:", selectedTag);
    filterEvents();
    
    // Remove active class from all items
    tagItems.forEach(el => el.classList.remove('active'));
    // Add active class to clicked item
    item.classList.add('active');
});
});


document.getElementById("datePicker").addEventListener("change", (event) => {
selectedDate = event.target.value;
filterEvents();
});

function filterEvents() {
console.log("Current filters:", {
    city: selectedCity, 
    tag: selectedTag, 
    date: selectedDate
});

const filteredEvents = events.filter(event => {
    const matchesCity = !selectedCity || event.city === selectedCity;
    const matchesTag = !selectedTag || event.tag === selectedTag;
    
    // Convert event date to a Date object for comparison
    const [day, month, year] = event.date.split('/');
    const eventDate = new Date(year, month - 1, day); // month is 0-indexed
    const selectedDateObj = selectedDate ? new Date(selectedDate) : null;

    const matchesDate = !selectedDate || 
        (selectedDateObj && 
         eventDate.getFullYear() === selectedDateObj.getFullYear() &&
         eventDate.getMonth() === selectedDateObj.getMonth() &&
         eventDate.getDate() === selectedDateObj.getDate());

    return matchesCity && matchesTag && matchesDate;
});

console.log("Filtered results:", filteredEvents);
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
    </script>


    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
