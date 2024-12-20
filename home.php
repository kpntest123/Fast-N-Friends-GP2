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
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/econmicly-strategic.svg" alt="homme chevauchant une tirellire" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Économiquement stratégique</h2>
                    <p class="p-cards">
                    Le covoiturage, c'est une super solution pour économiser, tout en réduisant les coûts de transport et en utilisant mieux nos voitures. En plus, ça aide à désengorger les routes et à réduire les émissions de CO2. En l'adoptant, tu choisis une mobilité plus durable et qui fait vraiment du bien au porte-monnaie !</p>
                </div>
        </div>

        <br><br><br>

        <!-- Version miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/ecologicly-responsible.svg" alt="main tenant une plante" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Ecologiquement responsable</h2>
                    <p class="p-cards-mirror">
                    Le covoiturage, c’est un geste éco-responsable, parce qu'il réduit le nombre de voitures sur la route et donc les émissions de CO2. En partageant les trajets, tu optimises les ressources et tu diminues la pollution. C’est direct : tu contribues à préserver l’environnement !</p>
                </div>
        </div>

        <br><br><br>

        <!-- Card normale -->
            <div class="fond-card-1">
                <div class="fond-card-2">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/ladies-only.svg" alt="femme entrain de marcher" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Ladies only</h2>
                    <p class="p-cards">
                    Le covoiturage "ladies only" crée un espace sécurisé et sympa pour les femmes, en privilégiant les trajets entre conductrices et passagères. C’est une option parfaite pour celles qui veulent se sentir en sécurité et à l’aise, tout en réduisant les coûts et l'empreinte carbone. Une solution qui respecte les envies de chacune et qui reste super écolo !</p>
                </div>
        </div>

        <br><br><br>

        <!-- Card miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/verified-profil.svg" alt="voiture avec un logo de verification audessus" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Profils vérifiés</h2>
                    <p class="p-cards-mirror">
                    Les profils vérifiés sur Fast'N Friends, c’est la garantie d’une sécurité en plus, en te permettant de vérifier l'identité et la fiabilité des gens avec qui tu voyages. Ça renforce la confiance entre conducteurs et passagers, pour des trajets plus tranquilles et sûrs. Et en plus, ça aide à créer une communauté respectueuse et responsable !</p>
                </div>
            </div>

            <br><br><br>

        <!-- Card normale -->
            <div class="fond-card-1">
                <div class="fond-card-2">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/accessible-events.svg" alt="une femme pointant un evenement avec une loupe sur un tableau" class="fond-card-2-image">
                </div>
                <div class="forme-card-bleue">
                    <h2 class="h2-cards">Des événements accessibles</h2>
                    <p class="p-cards">
                    Fast'N Friends te permet de trouver facilement des trajets pour tous tes événements, que ce soit culturel, sportif ou pro. C’est une solution pratique et économique pour y aller en partageant les frais de transport. En plus, ça crée une super ambiance de partage et de convivialité entre ceux qui partagent le trajet !</p>
                </div>
        </div>

        <br><br><br>

        <!-- Card miroir -->
            <div class="fond-card-1-miroir">
                <div class="fond-card-2-miroir">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/tchat.svg" alt="une femme et un homme discutant de tout et de rien" class="fond-card-2-miroir-image">
                </div>
                <div class="forme-card-bleue-miroir">
                    <h2 class="h2-cards-miroir">Tchattez pour faire connaissance</h2>
                    <p class="p-cards-mirror">
                    Fast'N Friends te propose un tchat intégré pour que conducteurs et passagers puissent faire connaissance avant le trajet. C’est l’occasion d’échanger des infos, de discuter des détails du voyage et de créer une vraie confiance entre vous. Ce système rend le covoiturage plus cool et serein !
                    </p>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>
  


<!-- Bloc 5 : FAQ -->
<div class="conteneur-faq">
  <div class="item-faq">
    <div class="question-faq">
      Comment faire pour devenir conducteur ?    
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Il te suffit d'aller dans ton profil et de cliquer sur "devenir un conducteur". Ensuite, tu n'as qu'à nous envoyer ta carte d'identité et c’est bon !
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Fast'N Friends est-il gratuit ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Oui, notre site est complètement gratuit et il n’y a aucune transaction à faire.
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      J'ai une question, comment je vous la pose ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Tu peux simplement nous envoyer un mail avec ta question, et on te répondra le plus vite possible !
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Est-ce que je dois vérifier les documents des passagers ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Non, ce n’est pas nécessaire. Notre plateforme est basée sur la confiance et la bonne foi des utilisateurs.
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Puis-je annuler un trajet après l'avoir publié ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Oui, tu peux annuler un trajet en allant dans ton profil, dans la section "Mes trajets", puis en cliquant sur "Annuler".
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Comment savoir si un passager est fiable ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Consulte les avis laissés par d'autres conducteurs sur le profil du passager. Notre système de notation est là pour t'aider.
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Puis-je partager des frais d'essence avec mes passagers ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Non, Fast'N Friends est une plateforme entièrement bénévole. Aucun échange d'argent n'est autorisé.
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Combien de passagers puis-je prendre dans ma voiture ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Le nombre de passagers dépend de la capacité de ta voiture. Assure-toi que chacun a une ceinture de sécurité.
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Que faire si un passager ne se présente pas ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Si un passager ne se présente pas, laisse un avis sur son profil pour informer les autres conducteurs. 
    </div>
  </div>
  <div class="item-faq">
    <div class="question-faq">
      Puis-je proposer des trajets réguliers (par exemple, tous les lundis) ?
      <span class="fleche">➡️</span>
    </div>
    <div class="reponse-faq">
      Oui, tu peux planifier des trajets réguliers en indiquant les jours récurrents dans la section "Créer un trajet".
    </div>
  </div>
</div>

                <script>
                      //JavaScript pour la FAQ
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

  

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <!-- Bloc 6 : Avis users -->
  <section id="stars-section">
        <div id="stars-container">
            <svg class="star" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.4 8.175L12 18.897l-7.334 3.859 1.4-8.175L.132 9.211l8.2-1.193z" />
            </svg>
            <svg class="star" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.4 8.175L12 18.897l-7.334 3.859 1.4-8.175L.132 9.211l8.2-1.193z" />
            </svg>
            <svg class="star" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.4 8.175L12 18.897l-7.334 3.859 1.4-8.175L.132 9.211l8.2-1.193z" />
            </svg>
            <svg class="star" viewBox="0 0 24 24" fill="gold" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.4 8.175L12 18.897l-7.334 3.859 1.4-8.175L.132 9.211l8.2-1.193z" />
            </svg>
        </div>
        <p id="stars-message">C'est la note attribuée par nos utilisateurs</p>
    </section>

                <script>
                  //La javascript pour les AVIS !
                  document.addEventListener("DOMContentLoaded", function () {
                const stars = document.querySelectorAll(".star");
                const message = document.getElementById("stars-message");

                // Fonction pour animer les étoiles
                const animateStars = () => {
                    stars.forEach((star, index) => {
                        setTimeout(() => {
                            star.style.opacity = 1;
                            star.style.transform = "scale(1)";
                        }, index * 300); // Délai entre chaque étoile
                    });

                    // Affiche la phrase après que toutes les étoiles soient animées
                    setTimeout(() => {
                        message.style.opacity = 1;
                    }, stars.length * 300 + 500); // +500ms après l'animation
                };

                // Observer pour détecter quand la section est visible
                const observer = new IntersectionObserver(
                    (entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                animateStars();
                                observer.disconnect(); // Stop l'observation après animation
                            }
                        });
                    },
                    { threshold: 0.5 } // Active quand 50% de la section est visible
                );

                // Cible la section
                const starsSection = document.getElementById("stars-section");
                observer.observe(starsSection);
              });
              </script>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





<?php
get_footer(); // Inclut le footer.php
?>
