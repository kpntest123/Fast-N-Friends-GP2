<?php
/* Template Name: Recherche profonde / filtres */
get_header();?>


  <br><br><br><br>
  <div class="deep-search-form-container">
  <form class="deep-search-form" action="<?php echo home_url('/search-results/'); ?>" method="get">
  <div class="deep-search-form-field">
    <input type="text" class="deep-search-form-input" id="from" name="from" placeholder="D'où partez-vous ?" required onkeyup="suggestCities(this.value, 'from')">
    <ul id="from-suggestions" class="suggestions-list"></ul>
  </div>
  <div class="deep-search-form-field">
    <input type="text" class="deep-search-form-input" id="to" name="to" placeholder="Où allez-vous ?" required onkeyup="suggestCities(this.value, 'to')">
    <ul id="to-suggestions" class="suggestions-list"></ul>
  </div>
  <div class="deep-search-form-field">
    <input type="number" class="deep-search-form-input" id="people" name="people" min="1" placeholder="Nombre de personnes" required>
  </div>
  <div class="deep-search-form-field">
    <input type="date" class="deep-search-form-input" id="date" name="date" required>
  </div>
  <div class="deep-search-form-filters">
    <button type="button" class="deep-search-form-filters-button" onclick="openFiltersModal()">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/add-something.svg" alt="Filtre" class="deep-search-form-filters-button-icon" />
      Ajouter des filtres
    </button>
  </div>
  <div class="deep-search-form-submit">
    <button type="submit" class="deep-search-form-button">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/search-ico.svg" alt="Loupe" class="deep-search-form-button-icon" />
      Rechercher
    </button>
  </div>

  <!-- Champs cachés pour les filtres additionnels -->
  <input type="hidden" id="filter1" name="filter1">
  <input type="hidden" id="filter2" name="filter2">
  <!-- Ajouter d'autres champs cachés pour les autres filtres -->
</form>

</div>

<div id="filters-modal" class="deep-search-modal">
  <div class="deep-search-modal-content">
    <span class="deep-search-modal-close"></span>
    <h2>Filtres additionnels</h2>
    <div class="deep-search-modal-body">
      <input type="checkbox" id="filter1" name="filter1">
      <label for="filter1">Filtre 1</label>
      <input type="checkbox" id="filter2" name="filter2">
      <label for="filter2">Filtre 2</label>
      <!-- Ajouter d'autres filtres ici -->
    </div>
    <div class="deep-search-modal-footer">
      <button type="button" class="deep-search-modal-button" onclick="closeFiltersModal()">Fermer</button>
    </div>
  </div>
</div>

<script>
// Ajouter un événement pour fermer le modal si l'utilisateur clique en dehors
window.onclick = function(event) {
  var modal = document.getElementById("filters-modal");
  if (event.target === modal) {
    closeFiltersModal();
  }
};

function openFiltersModal() {
  document.getElementById("filters-modal").style.display = "block";
}

function closeFiltersModal() {
  document.getElementById("filters-modal").style.display = "none";
}

// Capture des filtres lorsque l'utilisateur les sélectionne dans le modal
document.getElementById('filter1').addEventListener('change', function() {
  document.querySelector('input[name="filter1"]').value = this.checked ? '1' : '';  // '1' si activé, vide sinon
});
document.getElementById('filter2').addEventListener('change', function() {
  document.querySelector('input[name="filter2"]').value = this.checked ? '1' : '';  // '1' si activé, vide sinon
});


</script>



<br><br><br><br><br><br><br><br><br><br>



  <!-- Bouton "Plus de filtres" ==> a faire fonctionner -->
 
  


<?php get_footer(); ?>
