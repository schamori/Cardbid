// Mobile Menu - Standalone Implementation
(function() {
  'use strict';

  console.log('Mobile menu script loading...');

  function initMobileMenu() {
    console.log('Initializing mobile menu...');

    const toggle = document.getElementById('mobileMenuToggle');
    const drawer = document.getElementById('mobileMenuDrawer');
    const closeBtn = document.getElementById('mobileMenuClose');
    const overlay = document.getElementById('mobileMenuOverlay');
    const gamesToggle = document.getElementById('mobileGamesToggle');
    const gamesList = document.getElementById('mobileGamesList');

    console.log('Elements found:', {
      toggle: !!toggle,
      drawer: !!drawer,
      closeBtn: !!closeBtn,
      overlay: !!overlay,
      gamesToggle: !!gamesToggle,
      gamesList: !!gamesList
    });

    if (!toggle || !drawer || !overlay) {
      console.error('Mobile menu elements not found!');
      return;
    }

    // Open menu
    function openMenu() {
      console.log('Opening menu...');
      drawer.classList.add('active');
      overlay.classList.add('active');
      toggle.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    // Close menu
    function closeMenu() {
      console.log('Closing menu...');
      drawer.classList.remove('active');
      overlay.classList.remove('active');
      toggle.classList.remove('active');
      document.body.style.overflow = '';
    }

    // Toggle button click
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      console.log('Toggle clicked!');

      if (drawer.classList.contains('active')) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    // Close button click
    if (closeBtn) {
      closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Close button clicked!');
        closeMenu();
      });
    }

    // Overlay click
    overlay.addEventListener('click', function() {
      console.log('Overlay clicked!');
      closeMenu();
    });

    // Games dropdown toggle
    if (gamesToggle && gamesList) {
      gamesToggle.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Games toggle clicked!');
        gamesToggle.classList.toggle('active');
        gamesList.classList.toggle('active');
      });
    }

    // Close on escape
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && drawer.classList.contains('active')) {
        closeMenu();
      }
    });

    // Close when clicking links
    const links = drawer.querySelectorAll('a');
    links.forEach(function(link) {
      link.addEventListener('click', function() {
        closeMenu();
      });
    });

    console.log('Mobile menu initialized successfully!');
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
  } else {
    initMobileMenu();
  }
})();
