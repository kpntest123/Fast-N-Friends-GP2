// Constants
const CITIES = [
  "Bruxelles", "Anvers", "Gand", "Charleroi", "Liège", "Bruges", "Namur",
  "Louvain", "Mons", "Alost", "Malines", "La Louvière", "Courtrai",
  "Hasselt", "Ostende", "Seraing", "Saint-Nicolas", "Tournai", "Genk",
  "Roulers", "Mouscron", "Verviers", "Beveren", "Beringen", "Louvain-la-Neuve"
    // ... (reste des villes)
  ];
  
  // DOM Elements
  const elements = {
    userCount: document.getElementById("userCount"),
    filterOverlay: document.getElementById("filterOverlay"),
    openFilters: document.getElementById("openFilters"),
    closeModal: document.getElementById("closeModal"),
    datePicker: document.getElementById("datePicker"),
    cityDropdown: document.getElementById("cityDropdown"),
    resetFilters: document.getElementById("resetFilters")
  };
  
  // Filter State
  const filterState = {
    selectedCity: "",
    selectedTag: "",
    selectedDate: ""
  };
  
  // Initialization
  document.addEventListener("DOMContentLoaded", () => {
    initializeCounterAnimation();
    initializeCalendar();
    initializeCityAutocomplete();
    initializeFilters();
    initializeCardAnimations();
  });
  
  // Counter Animation
  function initializeCounterAnimation() {
    const targetNumber = 9645;
    let currentNumber = 0;
    const increment = Math.ceil(targetNumber / 3);
  
    const interval = setInterval(() => {
      currentNumber = Math.min(currentNumber + increment, targetNumber);
      elements.userCount.textContent = currentNumber;
  
      if (currentNumber >= targetNumber) {
        clearInterval(interval);
      }
    }, 3);
  }
  
  // Calendar Setup
  function initializeCalendar() {
    flatpickr("#calendar", {
      dateFormat: "Y-m-d",
      minDate: "today",
      allowInput: true
    });
  }
  
  // City Autocomplete
  function initializeCityAutocomplete() {
    function suggestCities(inputValue, inputId) {
      const suggestionsList = document.getElementById(`${inputId}-suggestions`);
      suggestionsList.innerHTML = '';
  
      if (!inputValue) return;
  
      const filteredCities = CITIES.filter(city => 
        city.toLowerCase().startsWith(inputValue.toLowerCase())
      );
  
      filteredCities.forEach(city => {
        const suggestionItem = document.createElement('li');
        suggestionItem.textContent = city;
        suggestionItem.onclick = () => {
          document.getElementById(inputId).value = city;
          suggestionsList.innerHTML = '';
        };
        suggestionsList.appendChild(suggestionItem);
      });
    }
  
    // Close suggestions on outside click
    document.addEventListener('click', (e) => {
      if (!e.target.matches('#from, #to')) {
        document.querySelectorAll('#from-suggestions, #to-suggestions')
          .forEach(el => el.innerHTML = '');
      }
    });
  
    // Add input listeners
    ['from', 'to'].forEach(id => {
      const input = document.getElementById(id);
      if (input) {
        input.addEventListener('input', (e) => suggestCities(e.target.value, id));
      }
    });
  }
  
  // Filters
  function initializeFilters() {
    // Modal handlers
    elements.openFilters?.addEventListener("click", () => {
        elements.filterOverlay?.classList.remove("hidden");
    });

    elements.closeModal?.addEventListener("click", () => {
        elements.filterOverlay?.classList.add("hidden");
    });

    elements.filterOverlay?.addEventListener("click", (event) => {
        if (event.target === elements.filterOverlay) {
            elements.filterOverlay.classList.add("hidden");
        }
    });

    // Filter handlers
    function updateActiveFilter(menuItems, selectedValue) {
        menuItems.forEach(item => {
            item.classList.toggle("active-filter", item.textContent === selectedValue);
        });
    }

    function filterEvents() {
        const filteredEvents = events.filter(event => {
            const matchesCity = !filterState.selectedCity || event.city === filterState.selectedCity;
            const matchesTag = !filterState.selectedTag || event.tag === filterState.selectedTag;

            if (!filterState.selectedDate) return matchesCity && matchesTag;

            const [year, month, day] = filterState.selectedDate.split('-'); // Format attendu : YYYY-MM-DD
            const selectedDateObj = new Date(year, month - 1, day);
            const [eventDay, eventMonth, eventYear] = event.date.split('/'); // Format attendu : DD/MM/YYYY
            const eventDate = new Date(eventYear, eventMonth - 1, eventDay);

            return matchesCity && matchesTag &&
                eventDate.toDateString() === selectedDateObj.toDateString();
        });

        renderEvents(filteredEvents);
    }

    // Listener pour les villes
    document.querySelectorAll("#cityDropdown .dropdown-item").forEach(item => {
        item.addEventListener("click", () => {
            filterState.selectedCity = item.textContent;
            filterEvents();
            updateActiveFilter(
                document.querySelectorAll("#cityDropdown .dropdown-item"),
                item.textContent
            );
        });
    });

    // Listener pour les tags
    document.querySelectorAll("#tagDropdown .dropdown-item").forEach(item => {
        item.addEventListener("click", () => {
            filterState.selectedTag = item.textContent;
            filterEvents();
            updateActiveFilter(
                document.querySelectorAll("#tagDropdown .dropdown-item"),
                item.textContent
            );
        });
    });

    // Listener pour le DatePicker
    document.querySelectorAll("#datePicker").forEach(item => {
        item.addEventListener("change", () => {
            filterState.selectedDate = item.value; // Met à jour l'état du filtre avec la date sélectionnée
            filterEvents(); // Applique les filtres
        });
    });

    // Reset filters
    elements.resetFilters?.addEventListener("click", () => {
        Object.keys(filterState).forEach(key => filterState[key] = "");
        document.querySelectorAll(".dropdown-item").forEach(item => {
            item.classList.remove("active-filter");
        });
        elements.datePicker.value = "";
        renderEvents(events);
    });
}


  
  // Card Animations
  function initializeCardAnimations() {
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
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const card = entry.target;
          const direction = card.classList.contains('fond-card-1') ? 'right' : 'left'
          animateCard(card, direction);
          observer.unobserve(card);
        }
      });
    }, observerOptions);
  
    document.querySelectorAll('.fond-card-1, .fond-card-1-miroir')
      .forEach(card => observer.observe(card));
  }

  const cityDropdown = document.getElementById('cityDropdown');

  CITIES.forEach(city => {
      const cityItem = document.createElement('li');
      const cityLink = document.createElement('a');
      cityLink.className = 'dropdown-item';
      cityLink.href = '#';
      cityLink.textContent = city;
      cityItem.appendChild(cityLink);
      cityDropdown.appendChild(cityItem);
  });

  const tagDropdown = document.getElementById('tagDropdown');

  const TAGS = [
      "Fête", "Expo", "Festival", "Sport", "Concert", "Bal"
  ];
  

TAGS.forEach(tag => {
  const tagItem = document.createElement('li');
  const tagLink = document.createElement('a');
  tagLink.className = 'dropdown-item';
  tagLink.href = '#';
  tagLink.textContent = tag;
  tagItem.appendChild(tagLink);
  tagDropdown.appendChild(tagItem);
});

