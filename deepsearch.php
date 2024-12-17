<?php
/* Template Name: Recherche profonde / filtres */
get_header();?>


  <br><br><br><br>
  <section class="search-section">
  <form class="search-form" action="<?php echo home_url('/search-results/'); ?>" method="get">
      <div class="form-group">
        <input type="text" id="from" name="from" placeholder="D'où partez-vous ?" required onkeyup="suggestCities(this.value, 'from')">
        <ul id="from-suggestions" class="suggestions-list"></ul>
      </div>
      <div class="form-group">
        <input type="text" id="to" name="to" placeholder="Où allez-vous ?" required onkeyup="suggestCities(this.value, 'to')">
        <ul id="to-suggestions" class="suggestions-list"></ul>
      </div>
      <div class="form-group">
        <input type="number" id="people" name="people" min="1" placeholder="Nombre de personnes" required>
      </div>
      <div class="form-group">
        <input type="date" id="date" name="date" required>
      </div>
      <button type="submit" class="search-button">Rechercher !</button>
    </form>
  </section>



  <!-- Bouton "Plus de filtres" ==> a faire fonctionner -->
 
  


<?php get_footer(); ?>
