/*
document.addEventListener("DOMContentLoaded", function() {
  const targetNumber = 196;
  const element = document.getElementById("userCount");
  let currentNumber = 0;
  const increment = Math.ceil(targetNumber / 100); // Ajuste la vitesse de progression ici

  const interval = setInterval(() => {
    currentNumber += increment;
    if (currentNumber >= targetNumber) {
      currentNumber = targetNumber;
      clearInterval(interval);
    }
    element.textContent = currentNumber;
  }, 30); // Ajuste la vitesse de l'animation en ms ici
});
*/


  //Style du calendrier :
  flatpickr("#calendar", {
dateFormat: "Y-m-d",
minDate: "today", /* Empêche la sélection de dates passées */
allowInput: true, /* Permet l'édition manuelle de la date */
});




  /*PARTIE 4 ==> animation des chiffres ==> ne marche plus, reste a 0, ne monte plus*/
  document.addEventListener("DOMContentLoaded", function () {
     const targetNumber = 9645;
     const element = document.getElementById("userCount");
     let currentNumber = 0;
     const increment = Math.ceil(targetNumber / 3); // vitesse de progression ici   
     const interval = setInterval(() => {
       currentNumber += increment;
       if (currentNumber >= targetNumber) {
         currentNumber = targetNumber;
         clearInterval(interval);
       }
       element.textContent = currentNumber;
     }, 3); // Ajuste la vitesse de l'animation en ms ici
   });  

   //Animation des cards dans accueil/
      const observerOptions = {
          root: null, 
          threshold: 0.5 
      };

      
      function animateCard(card, direction) {
          anime({
              targets: card,
              translateX: direction === 'left' ? ['-100vw', '0'] : ['100vw', '0'],
              opacity: [0, 1],
              duration: 1500,
              easing: 'easeOutExpo'
          });
      }

      
      const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  
                  const card = entry.target;
                  const direction = card.classList.contains('fond-card-1') ? 'right' : 'left';
                  animateCard(card, direction);

                  observer.unobserve(card);
              }
          });
      }, observerOptions);

   
      document.querySelectorAll('.fond-card-1, .fond-card-1-miroir').forEach(card => {
          observer.observe(card);
      });



      //fonction pour le + de filtres de "deep-search"
            // Sélection des éléments
            const openFilters = document.getElementById("openFilters");
            const filterOverlay = document.getElementById("filterOverlay");
            const closeModal = document.getElementById("closeModal");

            // Fonction pour ouvrir le modal
            openFilters.addEventListener("click", () => {
                filterOverlay.classList.remove("hidden");
            });

            // Fonction pour fermer le modal
            closeModal.addEventListener("click", () => {
                filterOverlay.classList.add("hidden");
            });

            // Fermer le modal si l'utilisateur clique en dehors du contenu
            filterOverlay.addEventListener("click", (event) => {
                if (event.target === filterOverlay) {
                    filterOverlay.classList.add("hidden");
                }
            });

