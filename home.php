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
            <div class="fond-card-1">
                <div class="fond-card-2">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/econmicly-strategic.svg" alt="homme chevauchant une tirellire">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Économiquement stratégique</h2>
                    <p class="p-cards">
                    Le covoiturage, c'est une super solution pour économiser, tout en réduisant les coûts de transport et en utilisant mieux nos voitures. En plus, ça aide à désengorger les routes et à réduire les émissions de CO2. En l'adoptant, tu choisis une mobilité plus durable et qui fait vraiment du bien au porte-monnaie !</p>
                </div>
        </div>

        <!-- Version miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/ecologicly-responsible.svg" alt="main tenant une plante">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Ecologiquement responsable</h2>
                    <p class="p-cards">
                    Le covoiturage, c’est un geste éco-responsable, parce qu'il réduit le nombre de voitures sur la route et donc les émissions de CO2. En partageant les trajets, tu optimises les ressources et tu diminues la pollution. C’est direct : tu contribues à préserver l’environnement !</p>
                </div>
        </div>

        <!-- Card normale -->
            <div class="fond-card-1">
                <div class="fond-card-2">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/ladies-only.svg" alt="femme entrain de marcher">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Ladies only</h2>
                    <p class="p-cards">
                    Le covoiturage "ladies only" crée un espace sécurisé et sympa pour les femmes, en privilégiant les trajets entre conductrices et passagères. C’est une option parfaite pour celles qui veulent se sentir en sécurité et à l’aise, tout en réduisant les coûts et l'empreinte carbone. Une solution qui respecte les envies de chacune et qui reste super écolo !</p>
                </div>
        </div>

        <!-- Card miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/verified-profil.svg" alt="voiture avec un logo de verification audessus">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Profils vérifiés</h2>
                    <p class="p-cards">
                    Les profils vérifiés sur Fast'N Friends, c’est la garantie d’une sécurité en plus, en te permettant de vérifier l'identité et la fiabilité des gens avec qui tu voyages. Ça renforce la confiance entre conducteurs et passagers, pour des trajets plus tranquilles et sûrs. Et en plus, ça aide à créer une communauté respectueuse et responsable !</p>
                </div>
            </div>

        <!-- Card normale -->
            <div class="fond-card-1">
                <div class="fond-card-2">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/accessible-events.svg" alt="une femme pointant un evenement avec une loupe sur un tableau">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Des événements accessibles</h2>
                    <p class="p-cards">
                    Fast'N Friends te permet de trouver facilement des trajets pour tous tes événements, que ce soit culturel, sportif ou pro. C’est une solution pratique et économique pour y aller en partageant les frais de transport. En plus, ça crée une super ambiance de partage et de convivialité entre ceux qui partagent le trajet !</p>
                </div>
        </div>

        <!-- Card miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/tchat.svg" alt="une femme et un homme discutant de tout et de rien">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Tchattez pour faire connaissance</h2>
                    <p class="p-cards">
                    Fast'N Friends te propose un tchat intégré pour que conducteurs et passagers puissent faire connaissance avant le trajet. C’est l’occasion d’échanger des infos, de discuter des détails du voyage et de créer une vraie confiance entre vous. Ce système rend le covoiturage plus cool et serein !
                    </p>
                </div>
            </div>
        </div>
  


<!-- Bloc 5 : FAQ -->
<div class="conteneur-faq">
    <div class="item-faq">
      <div class="question-faq">
        Comment faire pour devenir conducteur ?    
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
      Il te suffit d'aller dans ton profil et de cliquer sur "devenir un conducteur". Ensuite, tu n'as qu'à nous envoyer ta carte d'identité et c’est bon !</div>
    </div>
    <div class="item-faq">
      <div class="question-faq">
        Fast'N Friends est t'il gratuit ?
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
      Oui, notre site est complètement gratuit et il n’y a aucune transaction à faire.</div>
    </div>
    <div class="item-faq">
      <div class="question-faq">
        J'ai une question comment je vous la pose ?
        <span class="fleche">➡️</span>
      </div>
      <div class="reponse-faq">
      Tu peux simplement nous envoyer un mail avec ta question, et on te répondra le plus vite possible !</div>
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
