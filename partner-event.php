<?php
/* Template Name: Evenement partenaire */
get_header(); ?>

<div style="background-color: #3d3db3; text-align: center; padding: 25px;">
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
                            style="padding: 15px; font-size: 1.2rem; text-align: center; border-radius: 10px; border: 2px solid #3d3db3; color: #3d3db3;"
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
    <div style="text-align: center; margin-top: 20px;">
        <h2>Tous les événements</h2>

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
    <div class="event-container">
    <div class="event-card">            
        <div class="placeholder-box">23/01/2025 - Namur</div>
        <div class="event-tag">Fête</div>
        <div class="event-info">
            <h4>Grand Feu de bouge</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="event-card">            
        <div class="placeholder-box">24/01/2025 - Bruxelles</div>
        <div class="event-tag">Sport</div>
        <div class="event-info">
            <h4>Belgique vs France</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
<div class="event-card">            
    <div class="placeholder-box">25/01/2025 -  Charleroi</div>
    <div class="event-tag">Bal</div>
    <div class="event-info">
        <h4>Bal de Charleroi</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>
</div>
</div>
<div class="event-container">
    <div class="event-card">            
        <div class="placeholder-box">27/01/2025 - Genk</div>
        <div class="event-tag">Concert</div>
        <div class="event-info">
            <h4>Concert de Jul</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="event-card">            
        <div class="placeholder-box">30/01/2025 - Anvers</div>
        <div class="event-tag">Fête</div>
        <div class="event-info">
            <h4>Saint Glinglin</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
<div class="event-card">            
    <div class="placeholder-box">01/02/2025 - Liège</div>
    <div class="event-tag">Sport</div>
    <div class="event-info">
        <h4>Diable Rouge vs Anderlech</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>
</div>
<div class="event-container">
    <div class="event-card">            
        <div class="placeholder-box">03/02/2025 - Bruxelles</div>
        <div class="event-tag">Expo</div>
        <div class="event-info">
            <h4>Salon de l'auto</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="event-card">            
        <div class="placeholder-box">05/02/2025 - Mouscron</div>
        <div class="event-tag">Bal</div>
        <div class="event-info">
            <h4>Bal de Mouscron</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
<div class="event-card">            
    <div class="placeholder-box">05/02/2025 - Tournai</div>
    <div class="event-tag">Festival</div>
    <div class="event-info">
        <h4>Festival brassicole</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>
</div>
</div>
</div>
</div>



<?php get_footer(); ?>