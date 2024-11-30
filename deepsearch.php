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
     background-color: #905DCA;
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
     background-color: #905DCA;
   }

   .autocomplete-suggestions {
     position: absolute;
     top: 100%;
     left: 0;
     right: 0;
     background: white; /* PEUT ETRE LA COULEUR SECONDAIRE, ORANGE OU AUTRE ???? FAIRE DES CONTRASTES, JE VAIS GERBER DES SHTROUMPFS SINON*/
     border-radius: 15px;
     box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
     margin-top: 5px;
     z-index: 1000;
   }

   .autocomplete-suggestions div {
     padding: 10px;
     cursor: pointer;
   }


   .filters-container {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
}

.filter-btn {
    margin: 5px;
    padding: 10px 20px;
    background-color: white;
    border: 1px solid #ccc;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.filter-btn.selected {
    background-color: green;
    color: white;
}

#more-filters {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#more-filters:hover {
    background-color: #0056b3;
}
   

  </style>
</head>
<body>
  <br><br><br><br>
  <section class="search-section">
    <form class="search-bar" action="#" method="GET"> <!--a faire fonctionner--> 
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
  </section>



  <!-- Bouton "Plus de filtres" ==> a faire fonctionner -->
<button id="more-filters" onclick="toggleFilters()">Plus de filtres</button>

<!-- Section de filtres cachée, a faire fonctionner,...-->
<div id="filters" class="filters-container" style="display: none;">
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 1</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 2</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 3</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 4</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 5</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 6</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 7</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 8</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 9</button>
    <button class="filter-btn" onclick="toggleFilter(this)">Lorem 10</button>
</div>
  


<?php get_footer(); ?>
