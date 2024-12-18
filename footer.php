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

        <script>

/*
document.addEventListener("DOMContentLoaded", function() {
  const targetNumber = 196;
  const element = document.getElementById("userCount");
  let currentNumber = 0;
  const increment = Math.ceil(targetNumber / 100); // Ajuste la vitesse de progression ici

  const interval = setInterval(() => {
    currentNumber += increment;
    if (currentNumber >= targetNumber) {
      currentNumber = targetNumber;
      clearInterval(interval);
    }
    element.textContent = currentNumber;
  }, 30); // Ajuste la vitesse de l'animation en ms ici
});
*/


  //Style du calendrier :
  flatpickr("#calendar", {
dateFormat: "Y-m-d",
minDate: "today", /* Empêche la sélection de dates passées */
allowInput: true, /* Permet l'édition manuelle de la date */
});



// Liste des 50 plus grandes villes en Belgique
  const cities = [
  "Bruxelles", "Anvers", "Gand", "Charleroi", "Liège", "Bruges", "Namur",
  "Louvain", "Mons", "Alost", "Malines", "La Louvière", "Courtrai",
  "Hasselt", "Ostende", "Seraing", "Saint-Nicolas", "Tournai", "Genk",
  "Roulers", "Mouscron", "Verviers", "Beveren", "Beringen", "Louvain-la-Neuve",
  "Turnhout", "Vilvorde", "Herstal", "Waterloo", "Wavre", "Eupen",
  "Arlon", "Dinant", "Binche", "Soignies", "Ath", "Châtelet", "Fleurus",
  "Anderlecht", "Uccle", "Ixelles", "Schaerbeek", "Molenbeek-Saint-Jean",
  "Etterbeek", "Forest", "Saint-Gilles", "Berchem-Sainte-Agathe",
  "Woluwe-Saint-Pierre", "Woluwe-Saint-Lambert",
  "Aalst", "Aarschot", "Aartselaar", "Amay", "Andenne", "Ans", "Antoing",
  "Arendonk", "Assesse", "Aubange", "Audenarde", "Aywaille", "Balen",
  "Bastogne", "Beaumont", "Beauraing", "Beernem", "Beerse", "Beersel",
  "Berlaar", "Berlare", "Bernissart", "Bertrix", "Bièvre", "Bilzen",
  "Blankenberge", "Boechout", "Bonheiden", "Boom", "Borgloon", "Bornem",
  "Borsbeek", "Bouillon", "Braine-l'Alleud", "Braine-le-Château", "Braine-le-Comte",
  "Braives", "Brasschaat", "Brecht", "Bredene", "Bree", "Brugelette",
  "Buggenhout", "Celles", "Cerfontaine", "Chapelle-lez-Herlaimont", "Charleroi",
  "Châtelet", "Chaudfontaine", "Chaumont-Gistoux", "Chimay", "Chiny",
  "Ciney", "Clavier", "Comblain-au-Pont", "Comines-Warneton", "Courcelles",
  "Court-Saint-Etienne", "Couvin", "Crisnée", "Dalhem", "Damme", "De Haan",
  "De Panne", "De Pinte", "Deerlijk", "Denderleeuw", "Dendermonde", "Dessel",
  "Destelbergen", "Diepenbeek", "Diksmuide", "Dilbeek", "Dilsen-Stokkem",
  "Dinant", "Dison", "Doische", "Drogenbos", "Durbuy", "Edegem", "Eeklo",
  "Ellezelles", "Enghien", "Engis", "Erezée", "Erpe-Mere", "Espierres-Helchin",
  "Essen", "Estaimpuis", "Estinnes", "Etalle", "Evergem", "Faimes",
  "Farciennes", "Fauvillers", "Fernelmont", "Ferrières", "Fexhe-le-Haut-Clocher",
  "Fleurus", "Flobecq", "Floreffe", "Florennes", "Florenville", "Fontaine-l'Évêque",
  "Fosses-la-Ville", "Frameries", "Frasnes-lez-Anvaing", "Froidchapelle",
  "Galmaarden", "Gavere", "Gedinne", "Geel", "Geetbets", "Gembloux",
  "Genappe", "Geraardsbergen", "Gerpinnes", "Gesves", "Gingelom", "Gistel",
  "Glabbeek", "Gouvy", "Grimbergen", "Grobbendonk", "Haacht", "Haaltert",
  "Habay", "Hamme", "Hamoir", "Ham-sur-Heure-Nalinnes", "Hannut", "Harelbeke",
  "Hasselt", "Hastière", "Havelange", "Hechtel-Eksel", "Heers", "Heist-op-den-Berg",
  "Hemiksem", "Héron", "Herselt", "Herstappe", "Herve", "Heusden-Zolder",
  "Heuvelland", "Hoegaarden", "Hoeilaart", "Hoeselt", "Holsbeek", "Honnelles",
  "Hooglede", "Hoogstraten", "Horebeke", "Hotton", "Houffalize", "Houthulst",
  "Houyet", "Hove", "Huldenberg", "Hulshout", "Ichtegem", "Ieper", "Incourt",
  "Ingelmunster", "Ittre", "Izegem", "Jabbeke", "Jalhay", "Jette", "Jodoigne",
  "Juprelle", "Jurbise", "Kalmthout", "Kampenhout", "Kapellen", "Kapelle-op-den-Bos",
  "Kaprijke", "Kasterlee", "Keerbergen", "Kinrooi", "Kluisbergen", "Knesselare",
  "Knokke-Heist", "Koekelare", "Koekelberg", "Koksijde", "Kontich", "Kortemark",
  "Kortenaken", "Kortenberg", "Kortessem", "Kraainem", "Kruibeke", "Kruisem",
  "Kuurne", "La Bruyère", "La Hulpe", "La Roche-en-Ardenne", "Lanaken",
  "Langemark-Poelkapelle", "Lasne", "Léau", "Lens", "Les Bons Villers",
  "Lessines", "Leuze-en-Hainaut", "Libin", "Libramont-Chevigny", "Lichtervelde",
  "Liedekerke", "Lierde", "Lierneux", "Lille", "Limbourg", "Lincent",
  "Linkebeek", "Lint", "Linter", "Lo-Reninge", "Lokeren", "Lommel",
  "Londerzeel", "Lubbeek", "Maarkedal", "Maaseik", "Maasmechelen", "Machelen",
  "Maldegem", "Malmedy", "Manage", "Manhay", "Marche-en-Famenne", "Marchin",  "Meerhout", "Meise", 
  "Meix-devant-Virton", "Melle", "Menin", "Merbes-le-Château",
  "Merchtem", "Merelbeke", "Merksplas", "Messancy", "Mettet", "Middelkerke",
  "Modave", "Moerbeke", "Mol", "Momignies", "Mont-de-l'Enclus", "Montaigu-Zichem",
  "Mont-Saint-Guibert", "Moorslede", "Morlanwelz", "Mortsel", "Musson", "Namur",
  "Nandrin", "Nassogne", "Nazareth", "Neerpelt", "Neufchâteau", "Neuville-en-Condroz",
  "Nevele", "Niel", "Nieuport", "Nijlen", "Ninove", "Nivelles", "Ohey", "Olen",
  "Olne", "Onhaye", "Oosterzele", "Oostkamp", "Oostrozebeke", "Opglabbeek",
  "Opwijk", "Oreye", "Ottignies", "Oud-Heverlee", "Oud-Turnhout", "Ouffet",
  "Oupeye", "Overijse", "Overpelt", "Paliseul", "Pecq", "Peer", "Pepingen",
  "Pepinster", "Péruwelz", "Perwez", "Philippeville", "Pittem", "Plombières",
  "Pont-à-Celles", "Poperinge", "Profondeville", "Putte", "Puurs", "Quaregnon",
  "Quévy", "Quiévrain", "Raeren", "Ramillies", "Ranst", "Ravels", "Rebecq",
  "Remicourt", "Rendeux", "Retie", "Riemst", "Rijkevorsel", "Rixensart",
  "Rochefort", "Roeselare", "Ronse", "Roosdaal", "Rotselaar", "Rumes",
  "Ruiselede", "Rumes", "Saint-Georges-sur-Meuse", "Saint-Ghislain", "Saint-Hubert",
  "Saint-Léger", "Saint-Nicolas", "Saint-Trond", "Saint-Vith", "Sainte-Ode",
  "Sambreville", "Schelle", "Schilde", "Schoten", "Silly", "Sint-Amands",
  "Sint-Genesius-Rode", "Sint-Katelijne-Waver", "Sint-Laureins", "Sint-Lievens-Houtem",
  "Sint-Martens-Latem", "Sint-Pieters-Leeuw", "Sivry-Rance", "Soignies", "Sombreffe",
  "Somme-Leuze", "Spa", "Spiere-Helkijn", "Sprimont", "Stabroek", "Staden",
  "Stavelot", "Steenokkerzeel", "Stekene", "Tellin", "Temse", "Tenneville",
  "Ternat", "Tervuren", "Tessenderlo", "Theux", "Thimister-Clermont", "Thuin",
  "Tielt", "Tielt-Winge", "Tinlot", "Tintigny", "Tongeren", "Torhout",
  "Tremelo", "Trois-Ponts", "Trooz", "Tubize", "Turnhout", "Vaux-sur-Sûre",
  "Verlaine", "Viroinval", "Virton", "Visé", "Vleteren", "Voeren", "Vorselaar",
  "Vosselaar", "Vresse-sur-Semois", "Waarschoot", "Waasmunster", "Wachtebeke",
  "Waimes", "Walcourt", "Walhain", "Wanze", "Waregem", "Wasseiges", "Waterland-Oudeman",
  "Watermael-Boitsfort", "Wellen", "Wellin", "Wemmel", "Wervik", "Westerlo",
  "Wetteren", "Wevelgem", "Wezembeek-Oppem", "Wichelen", "Wielsbeke", "Wijgmaal",
  "Willebroek", "Wingene", "Woluwe-Saint-Lambert", "Wommelgem", "Wortegem-Petegem",
  "Wuustwezel", "Yvoir", "Zandhoven", "Zaventem", "Zedelgem", "Zele", "Zelzate",
  "Zemst", "Zingem", "Zoersel", "Zomergem", "Zonhoven", "Zonnebeke", "Zottegem",
  "Zuienkerke", "Zulte", "Zutendaal", "Zwalm", "Zwevegem", "Zwijndrecht"
];


// Fonction de suggestions en temps réel
function suggestCities(inputValue, inputId) {
const suggestionsList = document.getElementById(inputId + '-suggestions');

// Clear previous suggestions
suggestionsList.innerHTML = '';

if (inputValue === '') return;

// Filtrer les villes correspondant à la valeur entrée
const filteredCities = cities.filter(city => city.toLowerCase().startsWith(inputValue.toLowerCase()));

// Afficher les suggestions
filteredCities.forEach(city => {
  const suggestionItem = document.createElement('li');
  suggestionItem.textContent = city;
  suggestionItem.onclick = function () {
    document.getElementById(inputId).value = city;
    suggestionsList.innerHTML = ''; // Clear suggestions after selection
  };
  suggestionsList.appendChild(suggestionItem);
});
}

// Fonction pour fermer les suggestions si l'utilisateur clique ailleurs
document.addEventListener('click', function(e) {
if (!e.target.matches('#from, #to')) {
  document.getElementById('from-suggestions').innerHTML = '';
  document.getElementById('to-suggestions').innerHTML = '';
}
});



  /*PARTIE 4 ==> animation des chiffres ==> ne marche plus, reste a 0, ne monte plus*/
  document.addEventListener("DOMContentLoaded", function () {
     const targetNumber = 9645;
     const element = document.getElementById("userCount");
     let currentNumber = 0;
     const increment = Math.ceil(targetNumber / 3); // vitesse de progression ici   
     const interval = setInterval(() => {
       currentNumber += increment;
       if (currentNumber >= targetNumber) {
         currentNumber = targetNumber;
         clearInterval(interval);
       }
       element.textContent = currentNumber;
     }, 3); // Ajuste la vitesse de l'animation en ms ici
   });  

   //Animation des cards dans accueil/

     
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



      //fonction pour le + de filtres de "deep-search"
// Sélection des éléments
const openFilters = document.getElementById("openFilters");
const filterOverlay = document.getElementById("filterOverlay");
const closeModal = document.getElementById("closeModal");

// Fonction pour ouvrir le modal
openFilters.addEventListener("click", () => {
    filterOverlay.classList.remove("hidden");
});

// Fonction pour fermer le modal
closeModal.addEventListener("click", () => {
    filterOverlay.classList.add("hidden");
});

// Fermer le modal si l'utilisateur clique en dehors du contenu
filterOverlay.addEventListener("click", (event) => {
    if (event.target === filterOverlay) {
        filterOverlay.classList.add("hidden");
    }
});

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

</body>
</html>



    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
