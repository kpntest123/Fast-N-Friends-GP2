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

