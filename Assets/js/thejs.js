// Constants
const CITIES = [
  "Bruxelles", "Anvers", "Gand", "Charleroi", "Liège", "Bruges", "Namur",
  "Louvain", "Mons", "Alost", "Malines", "La Louvière", "Courtrai",
  "Hasselt", "Ostende", "Seraing", "Saint-Nicolas", "Tournai", "Genk",
  "Roulers", "Mouscron", "Verviers", "Beveren", "Beringen", "Louvain-la-Neuve"
];

const TAGS = ["Fête", "Expo", "Festival", "Sport", "Concert", "Bal"];

// DOM Elements
const elements = {
  userCount: document.getElementById("userCount"),
  filterOverlay: document.getElementById("filterOverlay"),
  openFilters: document.getElementById("openFilters"),
  closeModal: document.getElementById("closeModal"),
  datePicker: document.getElementById("datePicker"),
  cityDropdown: document.getElementById("cityDropdown"),
  resetFilters: document.getElementById("resetFilters"),
  starsMessage: document.getElementById("stars-message"),
  stars: document.querySelectorAll(".star"),
  starsSection: document.getElementById("stars-section"),
  counter: document.getElementById("counter")
};

// Filter State
const filterState = {
  selectedCity: "",
  selectedTag: "",
  selectedDate: ""
};

// Utility Functions
function isElementInViewport(el) {
  if (!el) return false;
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Counter Animation
function initializeCounterAnimation() {
  const targetNumber = 9645;
  let currentNumber = 0;
  const increment = Math.ceil(targetNumber / 300);

  const interval = setInterval(() => {
    currentNumber = Math.min(currentNumber + increment, targetNumber);
    if (elements.userCount) {
      elements.userCount.textContent = currentNumber;
    }

    if (currentNumber >= targetNumber) {
      clearInterval(interval);
    }
  }, 30);
}

function handleScroll() {
  if (elements.counter && isElementInViewport(elements.counter)) {
    initializeCounterAnimation();
    window.removeEventListener('scroll', handleScroll);
  }
}

// Stars Animation
function initializeStarsAnimation() {
  if (!elements.starsSection || !elements.stars.length) return;

  const animateStars = () => {
    elements.stars.forEach((star, index) => {
      setTimeout(() => {
        star.style.opacity = 1;
        star.style.transform = "scale(1)";
      }, index * 300);
    });

    if (elements.starsMessage) {
      setTimeout(() => {
        elements.starsMessage.style.opacity = 1;
      }, elements.stars.length * 300 + 500);
    }
  };

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateStars();
          observer.disconnect();
        }
      });
    },
    { threshold: 0.5 }
  );

  observer.observe(elements.starsSection);
}

// FAQ Initialization
function initializeFAQ() {
  const itemsFaq = document.querySelectorAll('.item-faq');
  itemsFaq.forEach(item => {
    const question = item.querySelector('.question-faq');
    const answer = item.querySelector('.reponse-faq');
    const arrow = item.querySelector('.fleche');
    
    if (question && answer && arrow) {
      question.addEventListener('click', () => {
        const isOpen = answer.classList.contains('open');
        // Close all open answers
        document.querySelectorAll('.reponse-faq').forEach(a => a.classList.remove('open'));
        document.querySelectorAll('.fleche').forEach(a => a.classList.remove('open'));
        // Toggle current element
        if (!isOpen) {
          answer.classList.add('open');
          arrow.classList.add('open');
        }
      });
    }
  });
}

// Calendar Setup
function initializeCalendar() {
  if (typeof flatpickr === 'function') {
    flatpickr("#calendar", {
      dateFormat: "Y-m-d",
      minDate: "today",
      allowInput: true
    });
  }
}

// Event Filtering System
function filterEvents() {
  if (typeof events === 'undefined') return;

  const filteredEvents = events.filter(event => {
    const matchesCity = !filterState.selectedCity || event.city === filterState.selectedCity;
    const matchesTag = !filterState.selectedTag || event.tag === filterState.selectedTag;

    if (!filterState.selectedDate) return matchesCity && matchesTag;

    const [year, month, day] = filterState.selectedDate.split('-');
    const selectedDateObj = new Date(year, month - 1, day);
    const [eventDay, eventMonth, eventYear] = event.date.split('/');
    const eventDate = new Date(eventYear, eventMonth - 1, eventDay);

    return matchesCity && matchesTag && eventDate.toDateString() === selectedDateObj.toDateString();
  });

  if (typeof renderEvents === 'function') {
    renderEvents(filteredEvents);
  }
}

function updateActiveFilter(menuItems, selectedValue) {
  menuItems.forEach(item => {
    item.classList.toggle("active-filter", item.textContent === selectedValue);
  });
}

// Filter Initialization
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

  // Filter listeners
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

  document.querySelectorAll("#datePicker").forEach(item => {
    item.addEventListener("change", () => {
      filterState.selectedDate = item.value;
      filterEvents();
    });
  });

  // Reset filters
  elements.resetFilters?.addEventListener("click", () => {
    Object.keys(filterState).forEach(key => filterState[key] = "");
    document.querySelectorAll(".dropdown-item").forEach(item => {
      item.classList.remove("active-filter");
    });
    if (elements.datePicker) {
      elements.datePicker.value = "";
    }
    filterEvents();
  });
}

// Card Animations
function initializeCardAnimations() {
  const observerOptions = {
    root: null,
    threshold: 0.5
  };

  function animateCard(card, direction) {
    if (typeof anime === 'function') {
      anime({
        targets: card,
        translateX: direction === 'left' ? ['-100vw', '0'] : ['100vw', '0'],
        opacity: [0, 1],
        duration: 1500,
        easing: 'easeOutExpo'
      });
    }
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const card = entry.target;
        const direction = card.classList.contains('fond-card-1') ? 'right' : 'left';
        animateCard(card, direction);
        observer.unobserve(card);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.fond-card-1, .fond-card-1-miroir')
    .forEach(card => observer.observe(card));
}

// Initialize dropdowns
function initializeDropdowns() {
  const cityDropdown = document.getElementById('cityDropdown');
  const tagDropdown = document.getElementById('tagDropdown');

  if (cityDropdown) {
    CITIES.forEach(city => {
      const cityItem = document.createElement('li');
      const cityLink = document.createElement('a');
      cityLink.className = 'dropdown-item';
      cityLink.href = '#';
      cityLink.textContent = city;
      cityItem.appendChild(cityLink);
      cityDropdown.appendChild(cityItem);
    });
  }

  if (tagDropdown) {
    TAGS.forEach(tag => {
      const tagItem = document.createElement('li');
      const tagLink = document.createElement('a');
      tagLink.className = 'dropdown-item';
      tagLink.href = '#';
      tagLink.textContent = tag;
      tagItem.appendChild(tagLink);
      tagDropdown.appendChild(tagItem);
    });
  }
}

// Main initialization
document.addEventListener("DOMContentLoaded", () => {
  initializeDropdowns();
  initializeCounterAnimation();
  initializeCalendar();
  initializeFilters();
  initializeCardAnimations();
  initializeFAQ();
  initializeStarsAnimation();
  
  // Initialize scroll handler
  window.addEventListener('scroll', handleScroll);
  handleScroll();
});