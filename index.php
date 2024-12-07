 <?php get_header(); ?>

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
  
<!-- Bloc de recherche avec le formulaire -->
<section class="search-section">
  <div class="search-container">
    <h1>Besoin de te déplacer ?</h1>
    <p>Que ce soit pour aller étudier ou aller à un event ? ou'r aat the right place !</p>
    <form class="search-form" action="<?php echo esc_url(get_permalink(get_page_by_path('search-results'))); ?>" method="get">
      <div class="form-group">
        <label for="from">De ?</label>
        <input type="text" id="from" name="from" placeholder="Entrez votre point de départ" required>
      </div>
      <div class="form-group">
        <label for="to">Vers ?</label>
        <input type="text" id="to" name="to" placeholder="Entrez votre destination" required>
      </div>
      <div class="form-group">
        <label for="people">Pour combien de personnes ?</label>
        <input type="number" id="people" name="people" min="1" required>
      </div>
      <div class="form-group">
        <label for="date">Quand ?</label>
        <input type="date" id="date" name="date" required>
      </div>
      <button type="submit" class="search-button">Chercher !</button>
    </form>
    <p class="note">*Malheureusement, n'est disponible que dans 500 grandes villes en Belgique</p>
  </div>
  <div class="image-container">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Img/vintage-car.svg" alt="Voiture vintage">
  </div>
</section>



  <!-- Bloc 3 : Titre et chiffre -->
  <section class="stats">
    <h1>Notre communauté s'étend !</h1>
    <div class="number" id="userCount">0</div>
    <p>Conducteurs sont prêts à te conduire dès maintenant !</p>
  </section>

<!-- Bloc 4 : les réels avanatages du co-voiturage -->
<section class="lescardsecolos">
  <h1>Pourquoi choisir Fast 'N Friends' ?</h1>
  
  <div class="container">
        <!-- Version normale -->
        <div class="card-wrapper">
            <div class="fond-card-1">
                <div class="fond-card-2">
                    <img src="https://via.placeholder.com/400x300" alt="Description" class="fond-card-2-image">
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
                    <img src="Assets\Img\Ecologiquement responsable.png" alt="Main avec une plante qui pousse" class="fond-card-2-miroir-image">
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
                    <img src="Assets\Img\Ladies only.png" alt="Une femme entrain de marcher" class="fond-card-2-image">
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
                    <img src="Assets\Img\Profils vérifiés.png" alt="Une voiture qui roule avec un signe de vérification audessus" class="fond-card-2-miroir-image">
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
                    <img src="Assets\Img\Events accessible.png" alt="Une femme pointant un événement avec une loupe sur un tableau" class="fond-card-2-image">
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
                    <img src="Assets\Img\Tchattez.png" alt="Une femme et un homme assis sur une moto entrain de discuter" class="fond-card-2-miroir-image">
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
</div>
</section>

  


<!-- Bloc 5 : Pourquoi choisir Fast 'N Friends -->
<section class="why-us">
  <div style="display: flex ; justify-content: center;">
<h1>FAQ</h1>
</div>
<br><br>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="collapse-container">
        <!-- Button 1 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            L'inscription est t'elle gratuite ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse1">
            <div class="collapse-content">
                Oui ! Notre site internet est financé par la publicité donc vous pouvez vous inscrire gratuitement
            </div>
        </div>

        <!-- Button 2 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            Est il possible de personnaliser son profil ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse2">
            <div class="collapse-content">
                Oui, c'est totalement possible, il suffit de te rendre dans ta page profil et de cliquer sur le bouton 'modifie mes infos'
            </div>
        </div>

        <!-- Button 3 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            Est t'il possible d'ajouter un événement ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse3">
            <div class="collapse-content">
                Non, tu ne peux pas l'ajouter toi même par contre, n'hésite pas à nous contacter grâce à fastnfriends@gmail.com pour nous envoyer votre événement 
            </div>
        </div>

        <!-- Button 4 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            Fast'N Friends est disponible où ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse4">
            <div class="collapse-content">
Partout en belgique, de la campagne luxembourgeoise jusqu'a la Panne
            </div>
        </div>

        <!-- Button 5 -->
        <button class="faq-btn button-spacing" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
            Pourquoi avoir créer Fast'N Friends ?
            <span class="Plus-icon">+</span>
        </button>
        <div class="collapse" id="collapse5">
            <div class="collapse-content">
                Car nous voulons, en tant qu'étudiant que ceux-ci puisse faire du co-voiturage et rencontrer des gens tout en conduisant
            </div>
        </div>
    </div>
</div>
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