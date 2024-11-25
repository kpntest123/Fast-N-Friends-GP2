<footer>
        <p>&copy; <?php echo date('Y'); ?> Fast 'N Friends. Tous droits réservés.</p>
    </footer>

    
 <script>


/*PARTIE 1 ==> barre de nav ! */
const hamburgerIcon = document.getElementById("hamburger-icon");
const navLinks = document.getElementById("nav-links");

hamburgerIcon.addEventListener("click", () => {
  navLinks.classList.toggle("show");
});

/*Partie 3 ==> module de recherche :*/
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


    /*PARTIE 4 ==> animation des chiffres*/
    document.addEventListener("DOMContentLoaded", function () {
       const targetNumber = 196;
       const element = document.getElementById("userCount");
       let currentNumber = 0;
       const increment = Math.ceil(targetNumber / 150); // vitesse de progression ici   
       const interval = setInterval(() => {
         currentNumber += increment;
         if (currentNumber >= targetNumber) {
           currentNumber = targetNumber;
           clearInterval(interval);
         }
         element.textContent = currentNumber;
       }, 20); // Ajuste la vitesse de l'animation en ms ici
     });    


</script>

    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
