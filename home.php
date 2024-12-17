<?php
// Template Name: Page d'accueil

get_header();
?>



<!-- CEST LA PAGE DACCUEIL ICI, la page de base, une page basifiée--> 

<!-- LA BARRE DE NAV SE TROUVE DANS LE HEADER -->


  <!-- 

  Bloc 1 : Titre et description, blabla agicheur ==> nomalement ne pas garder le bloc ici,................
  <section class="intro">
    <h1>Ici, c'est le texte en 42 pixel desktop et mobile = 30 ???</h1>
    <p>Ici le texte doit etre en 30 sur desktop et sur mobile en 16 ????</p>
  </section>
  
  -->

  <!-- Bloc 2 : Image et module de recherche -->
  <section class="search-section">
  <div class="search-container">
    <h1>Besoin de te déplacer ?</h1>
    <p>Que ce soit pour aller étudier ou aller à un event, tu es au bon endroit !</p>
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
    <br>
    <p class="note">*Malheureusement, n'est disponible que dans 500 grandes villes en Belgique</p>
  </div>
  <div class="image-container">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/vintage-car.svg" alt="Voiture vintage avec un arbre moderne">
  </div>
</section>



  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>



<!-- Bloc 4 : les cards animés -->
<div class="container">
        <!-- Version normale -->
        <div class="card-wrapper">
            <div class="fond-card-1">
                <div class="fond-card-2">
                    <img src="Assets\Img\Economiquement stratégique.svg" alt="Description" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Économiquement stratégique</h2>
                    <p class="p-cards">
                        Le covoiturage est une solution économique stratégique, permettant de réduire les coûts de transport tout en optimisant l'utilisation des véhicules. Il contribue également à la diminution de la congestion routière et des émissions de CO2. En favorisant cette pratique, on soutient une mobilité durable et rentable.
                    </p>
                </div>
            </div>
        </div>

        <!-- Version miroir -->
        <div class="card-wrapper">
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                    <img src="Assets\Img\Ecologiquement responsable.svg" alt="Main avec une plante qui pousse" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Ecologiquement responsable</h2>
                    <p class="p-cards">
                        Le covoiturage est une pratique écologiquement responsable, car elle réduit le nombre de véhicules en circulation et diminue ainsi les émissions de CO2. En partageant les trajets, on optimise l’utilisation des ressources et on limite la pollution. Cela contribue directement à la préservation de l’environnement.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card normale -->
        <div class="card-wrapper">
            <div class="fond-card-1">
                <div class="fond-card-2">
                    <img src="Assets\Img\Ladies only.svg" alt="Une femme entrain de marcher" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Ladies only</h2>
                    <p class="p-cards">
                        Le covoiturage "ladies only" offre un environnement sécurisé et confortable pour les femmes, en favorisant des trajets partagés entre conductrices et passagères. Cette option répond à un besoin de sécurité et de convivialité, tout en permettant de réduire les coûts et l'empreinte carbone. C'est une alternative respectueuse des préférences personnelles et écologiquement responsable.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card miroir -->
        <div class="card-wrapper">
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                    <img src="Assets\Img\Profils vérifiés.svg" alt="Une voiture qui roule avec un signe de vérification audessus" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Profils vérifiés</h2>
                    <p class="p-cards">
                        Les profils vérifiés dans Fast'N Friends garantissent une sécurité accrue, en permettant de s'assurer de l'identité et de la fiabilité des participants. Cette vérification renforce la confiance entre conducteurs et passagers, favorisant des trajets plus sûrs et sereins. Elle contribue également à la création d'une communauté responsable et respectueuse.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card normale -->
        <div class="card-wrapper">
            <div class="fond-card-1">
                <div class="fond-card-2">
                    <img src="Assets\Img\Events accessible.svg" alt="Une femme pointant un événement avec une loupe sur un tableau" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Des événements accessibles</h2>
                    <p class="p-cards">
                        Fast'N Friends permet de trouver facilement des trajets pour se rendre à des événements, qu'ils soient culturels, sportifs ou professionnels. Cela offre une solution pratique et économique pour rejoindre un lieu en partageant les frais de transport. En plus, cela crée un esprit de convivialité et de partage entre participants.
                    </p>
                </div>
            </div>
        </div>

        <!-- Card miroir -->
        <div class="card-wrapper">
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                    <img src="Assets\Img\Tchattez.svg" alt="Une femme et un homme assis sur une moto entrain de discuter" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Tchattez pour faire connaissance</h2>
                    <p class="p-cards">
                        Fast'N Friends propose un tchat intégré qui permet aux conducteurs et passagers de faire connaissance avant le trajet. Cela offre une occasion d'échanger des informations, de discuter des détails du voyage et de renforcer la confiance entre les participants. Ce système favorise une expérience de covoiturage plus conviviale et sereine.



                    </p>
                </div>
            </div>
        </div>
    </div> 
  


<!-- Bloc 5 : FAQ -->
<div class="conteneur-faq">
    <div class="item-faq">
      <div class="question-faq">
        Q3        
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quia, nesciunt sint quidem nostrum 
      </div>
    </div>
    <div class="item-faq">
      <div class="question-faq">
        Q2
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quia, nesciunt sint quidem nostrum 
      </div>
    </div>
    <div class="item-faq">
      <div class="question-faq">
        Q1
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quia, nesciunt sint quidem nostrum 
      </div>
    </div>
  </div>



  <script>
    const itemsFaq = document.querySelectorAll('.item-faq');

    itemsFaq.forEach(item => {
        const question = item.querySelector('.question-faq');
        const answer = item.querySelector('.reponse-faq');
        const arrow = item.querySelector('.fleche');

        question.addEventListener('click', () => {
            const isOpen = answer.classList.contains('open');

            // Fermer toutes les réponses ouvertes
            document.querySelectorAll('.reponse-faq').forEach(a => a.classList.remove('open'));
            document.querySelectorAll('.fleche').forEach(a => a.classList.remove('open'));

            // Basculer l'élément actuel
            if (!isOpen) {
                answer.classList.add('open');
                arrow.classList.add('open');
            }
        });
    });
</script>







<!-- Bloc 6 -->
<section class="bloc6">
  <h1>Lorem or IMG</h1>
  <p>IMG ????????????? IMG ????????????? </p>
</section>


  <!-- Bloc ??? : TEST EN TOUT GENRE -->
  <h1 class="titre-1-classic">Test - taille de titre</h1>
  <h2 class="titre-2-classic">Test - taille de titre</h2>
  <h3 class="titre-3-classic">Test - taille de titre</h3>




<?php
get_footer(); // Inclut le footer.php
?>
