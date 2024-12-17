<?php
/* Template Name: Evenement partenaire */
get_header(); ?>

<div style="background-color: #4B9BEB; text-align: center; padding: 25px;">
            <h1 style="color: white;">Événements Partenaires</h1>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="header-box">
                            <button
                                class="btn btn-secondary dropdown-toggle"
                                type="button"
                                id="dropdownMenuButton"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Lieu
                            </button>
                            <ul class="dropdown-menu" id="cityDropdown">
                            </ul>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-box">
                            <button class="btn btn-secondary dropdown-toggle" 
                            type="button" 
                            id="dropdownMenuButton" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">Event</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Bal</a></li>
                                <li><a class="dropdown-item" href="#">Concert</a></li>
                                <li><a class="dropdown-item" href="#">Festival</a></li>
                                <li><a class="dropdown-item" href="#">Expo</a></li>
                                <li><a class="dropdown-item" href="#">Fête</a></li>
                                <li><a class="dropdown-item" href="#">Sport</a></li>
                            </ul>
        
    
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-box">
                            <input
                            type="date"
                            class="form-control"
                            id="datePicker"
                            style="padding: 15px; font-size: 1.2rem; text-align: center; border-radius: 10px; border: 2px solid #4B9BEB; color: #4B9BEB;"
                 >
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div>
    <div style="text-align: center; margin-top: 20px;">
        <h2>Événements à venir</h2>
    </div>
    
    <div class="event-container">
        
        <div class="event-card">
            
            <div class="placeholder-box">15/01/2025 - Liège</div>
            <div class="event-tag">Fête</div>
            <div class="event-info">
                <h4>Fête du vin</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    
        
        <div class="event-card">
            <div class="placeholder-box">16/01/2025 - Bruxelles</div>
            <div class="event-tag">Festival</div>
            <div class="event-info">
                <h4>Anima à Flagey</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    
        
        <div class="event-card">            
            <div class="placeholder-box">18/01/2025 - Liège</div>
            <div class="event-tag">Expo</div>
            <div class="event-info">
                <h4>JardinExpo</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>

</div>
<br>
<div>
    </div>
    <div>
    <div>
    <div style="text-align: center; margin-top: 20px;">
        <h2>Tous les événements</h2>
    </div>

    <div class="event-container" id="eventContainer">
        <?php
        // WP_Query pour récupérer les événements
        $args = array(
            'post_type' => 'event',  // Custom post type 'event'
            'posts_per_page' => -1,  // Récupérer tous les événements
        );

        $query = new WP_Query($args);
        $events = [];

        if ($query->have_posts()) : 
            while ($query->have_posts()) : $query->the_post();
                // Récupérer les métadonnées de l'événement
                $date = get_post_meta(get_the_ID(), 'date', true); // Date de l'événement
                $lieu = get_post_meta(get_the_ID(), 'lieu', true); // Lieu de l'événement
                $tag = get_post_meta(get_the_ID(), 'tag', true); // Tag de l'événement
                $description = get_the_excerpt(); // Description courte de l'événement
                $title = get_the_title(); // Titre de l'événement
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL de l'image à la une de l'événement

                // Ajouter les événements au tableau
                $events[] = [
                    'name' => $title,
                    'description' => $description,
                    'date' => $date,
                    'city' => $lieu,
                    'tag' => $tag,
                    'image' => $image_url,
                    'link' => get_permalink(get_the_ID()) // Récupère l'URL de l'article
                ];
                
            endwhile;
            wp_reset_postdata();  // Réinitialiser la requête
        else :
            echo 'Aucun événement trouvé.';
        endif;
        ?>

        <!-- Injecter les événements dynamiques dans une variable JavaScript -->
        <script>
            const events = <?php echo json_encode($events); ?>;
            const eventContainer = document.querySelector(".event-container");

            function renderEvents(filteredEvents) {
    eventContainer.innerHTML = ""; // Réinitialise le conteneur des événements
    filteredEvents.forEach(event => {
        const eventCard = `
            <div class="event-card">
                <a href="${event.link}" style="text-decoration: none; color: inherit;">
                    ${event.image ? `<img src="${event.image}" class="event-image" alt="Image de l'événement">` : ''}
                    <div class="placeholder-box">${event.date} - ${event.city}</div>
                    <div class="event-tag">${event.tag}</div>
                    <div class="event-info">
                        <h4>${event.name}</h4>
                        <p>${event.description}</p>
                    </div>
                </a>
            </div>
        `;
        eventContainer.innerHTML += eventCard; // Ajoute la card cliquable dans le conteneur
    });
}


            renderEvents(events);
        </script>
    </div>
</div>




<?php get_footer(); ?>