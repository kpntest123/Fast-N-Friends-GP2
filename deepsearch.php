<?php
/* Template Name: Recherche profonde / filtres */
get_header();?>

<style>
   .search-section {
     position: relative;
     text-align: center;
     padding: 0;
     width: 100%;
     height: 50vh;
   }

   .search-section .car-image {
     width: 100%;
     height: 100%;
     position: relative;
     overflow: hidden;
   }

   .search-section .car-image img {
     width: 100%;
     height: 100%;
     object-fit: cover;
     position: absolute;
     top: 0;
     left: 0;
     border-radius: 0;
   }

   .search-bar {
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     z-index: 2;
     width: 80%;
     max-width: 1200px;
     display: flex;
     gap: 10px;

     padding: 15px;
     border-radius: 30px;
     box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
   }

   .search-bar > * {
     flex: 1;
     min-width: 0;
   }

   .search-bar input[type="text"],
   .search-bar input[type="number"],
   .search-bar input[type="date"] {
     padding: 12px 16px;
     border: 1px solid #ddd;
     font-size: 16px;
     outline: none;
     border-radius: 25px;
     width: 100%;
     background: white;
   }

   .search-bar button.btn-search {
     padding: 12px 24px;
     background-color: #F6BF48;
     color: #000000;
     border: none;
     font-size: 16px;
     cursor: pointer;
     outline: none;
     border-radius: 25px;
     white-space: nowrap;
     flex: 0 0 auto;
     transition: background-color 0.3s;
   }

   .search-bar button.btn-search:hover {
     background-color: #e5af37;
   }

   .autocomplete-suggestions {
     position: absolute;
     top: 100%;
     left: 0;
     right: 0;
     background: white;
     border-radius: 15px;
     box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
     margin-top: 5px;
     z-index: 1000;
   }

   .autocomplete-suggestions div {
     padding: 10px;
     cursor: pointer;
   }

   .autocomplete-suggestions div:hover {
     background-color: #f5f5f5;
   }
  </style>
</head>
<body>
  <br><br><br><br>
  <section class="search-section">
    <div class="car-image">
      <img src="Assets/Img/background_img_bloc2.jpg" alt="Illustration voiture">
    </div>
    <form class="search-bar" action="#" method="GET">
      <div>
        <input type="text" id="from-input" placeholder="De ?*" required />
        <div class="autocomplete-suggestions" id="from-suggestions"></div>
      </div>
      <div>
        <input type="text" id="to-input" placeholder="Vers ?" required />
        <div class="autocomplete-suggestions" id="to-suggestions"></div>
      </div>
      <input type="number" placeholder="Pour combien de personnes ?" required />
      <input type="date" required />
      <button class="btn-search">Chercher !</button>
    </form>
    <i>Malheureusement, n'est disponible que dans 500 grandes villes en Belgique</i>
  </section>
  

  <script>
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

 // Fonction générique pour gérer l'autocomplétion
 function setupAutocomplete(inputId, suggestionsId) {
      const input = document.getElementById(inputId);
      const suggestionsBox = document.getElementById(suggestionsId);

      input.addEventListener("input", () => {
        const query = input.value.toLowerCase();
        suggestionsBox.innerHTML = "";

        if (query.length > 0) {
          const suggestions = cities.filter(city => 
            city.toLowerCase().includes(query)
          ).slice(0, 10); // Limite à 10 suggestions pour une meilleure performance

          suggestions.forEach(city => {
            const suggestionDiv = document.createElement("div");
            suggestionDiv.textContent = city;
            suggestionDiv.addEventListener("click", () => {
              input.value = city;
              suggestionsBox.innerHTML = "";
            });
            suggestionsBox.appendChild(suggestionDiv);
          });
        }
      });

      // Fermer les suggestions si on clique en dehors
      document.addEventListener("click", (e) => {
        if (!suggestionsBox.contains(e.target) && e.target !== input) {
          suggestionsBox.innerHTML = "";
        }
      });
    }

    // Initialiser l'autocomplétion pour les deux champs
    setupAutocomplete("from-input", "from-suggestions");
    setupAutocomplete("to-input", "to-suggestions");
  </script>



<?php get_footer(); ?>
