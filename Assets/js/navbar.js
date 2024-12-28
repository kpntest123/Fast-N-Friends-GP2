document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger-menu');
    const navMenu = document.getElementById('nav-links');
    const overlay = document.getElementById('overlay');
    const accountIcon = document.querySelector('.account-icon');
    const accountDropdown = document.querySelector('.account-icon .dropdown-menu');

    // Hamburger menu toggle
    hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    // Account dropdown toggle for mobile
    if (accountIcon && window.innerWidth <= 768) {
        accountIcon.querySelector('a').addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            accountIcon.classList.toggle('active');
            accountDropdown.classList.toggle('active');
        });
    }

    // Close menus when clicking outside
    document.addEventListener('click', (e) => {
        if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
            overlay.classList.remove('active');
            if (accountIcon) {
                accountIcon.classList.remove('active');
                accountDropdown.classList.remove('active');
            }
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            // Reset mobile-specific classes when returning to desktop
            accountIcon?.classList.remove('active');
            accountDropdown?.classList.remove('active');
        }
    });
});