 <?php get_header(); ?>

<!-- CEST LA PAGE DACCUEIL ICI--> 

  <!-- Barre de navigation -->
  <header>
    <div class="logo-container">
      <img src="Assets/Img/FNF_logo_background_removed.png" alt="Fast 'N Friends Logo">
      <h1>Fast 'N Friends</h1>
    </div>
    <nav>
      <ul>
        <li>
          <a href="#">
            <img src="Assets/Img/ico fiesta.svg" alt="Fiesta" class="search-icon">
            Événements partenaires
          </a>
            </li>
        <li>
          <a href="#">
            Rechercher
            <img src="Assets/Img/Loupe de recherche.svg" alt="Rechercher" class="search-icon">
                                  
          </a>
        </li>
        <li>
          <a href="#" class="btn btn-white">Se connecter</a>
        </li>
        <li>
          <a href="#" class="btn btn-yellow">S'inscrire</a>
        </li>
      </ul>
    </nav>
  </header>


  <!-- Bloc 1 : Titre et description -->
  <section class="intro">
    <h1>Lorem lorem lorem lorem lorem lorem</h1>
    <p>Lorem lorem lorem lorem Lorem lorem lorem lorem Lorem lorem lorem</p>
  </section>

  <!-- Bloc 2 : Image et module de recherche -->
  <section class="search-section">
    <div class="car-image">
      <img src="Assets/Img/background_img_bloc2.jpg" alt="Illustration voiture">
    </div>
    <form class="search-bar" action="#" method="GET">
      <input type="text" placeholder="De ?" required />
      <input type="text" placeholder="Vers ?" required />
      <input type="number" placeholder="Pour combien de personnes ?" required />
      <input type="date" required />
      <button class="btn-search">Chercher !</button>
    </form>
  </section>


  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>
                                          <!-- DANS UN FUTUR PROCHE METTRE TOUT CA DANS LE DOC JS DEJA CREE -->
                                          <script>
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

<!-- Bloc 4 : les réels avanatages du co-voiturage -->
<section class="lescardsecolos">
  <h1>Quels sont les réels avantages du covoiturage ?</h1>
  <p>Lorem Lorem Lorem ??</p>
</section>

  


<!-- Bloc 5 : Pourquoi choisir Fast 'N Friends -->
<section class="why-us">
  <h1>Pourquoi nous choisir nous ?</h1>
  <p>Lorem Lorem Lorem ??</p>
</section>

<!-- Bloc 6 -->
<section class="bloc6">
  <h1>Lorem or IMG</h1>
  <p>IMG ????????????? IMG ????????????? </p>
</section>


  <!-- Bloc ??? : TEST EN TOUT GENRE -->
  <h1 class="titre-1-classic">Test - taille de titre</h1>
  <h2 class="titre-2-classic">Test - taille de titre</h2>
  <h3 class="titre-3-classic">Test - taille de titre</h3>

  <?php get_footer(); ?>