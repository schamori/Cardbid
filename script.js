// Mega Menu Functionality
const shopButton = document.querySelector('.nav-shop');
const megaMenu = document.querySelector('.mega-menu');
const navigation = document.querySelector('.navigation');

let megaMenuTimeout;

// Show mega menu on hover
shopButton.addEventListener('mouseenter', () => {
  clearTimeout(megaMenuTimeout);
  megaMenu.classList.add('active');
});

// Hide mega menu when leaving both the button and menu
shopButton.addEventListener('mouseleave', () => {
  megaMenuTimeout = setTimeout(() => {
    megaMenu.classList.remove('active');
  }, 100);
});

megaMenu.addEventListener('mouseenter', () => {
  clearTimeout(megaMenuTimeout);
  megaMenu.classList.add('active');
});

megaMenu.addEventListener('mouseleave', () => {
  megaMenu.classList.remove('active');
});

// Gallery Carousel Functionality
let galleryCurrentIndex = 2;

function updateGalleryCarousel() {
  console.log('=== updateGalleryCarousel called ===');
  const track = document.querySelector('.gallery .carousel-track');
  const prevBtn = document.querySelector('.gallery .carousel-nav.prev');
  const nextBtn = document.querySelector('.gallery .carousel-nav.next');
  const infoTitle = document.querySelector('.gallery .info-title');
  const infoSubtitle = document.querySelector('.gallery .info-subtitle');

  console.log('Track found:', track);
  if (!track) {
    console.error('ERROR: .gallery .carousel-track not found!');
    return;
  }

  const cards = track.querySelectorAll('.carousel-card');
  const totalCards = cards.length;
  console.log('Total cards found:', totalCards);
  console.log('Current index:', galleryCurrentIndex);

  // Ensure currentIndex is valid
  if (galleryCurrentIndex >= totalCards) {
    galleryCurrentIndex = totalCards > 0 ? Math.floor(totalCards / 2) : 0;
  }
  if (galleryCurrentIndex < 0) {
    galleryCurrentIndex = 0;
  }
  const cardWidth = 316; // Card width + gap
  console.log('Card width:', cardWidth);

  // Position cards in a horizontal line
  cards.forEach((card, index) => {
    // Calculate position relative to current index
    const relativeIndex = index - galleryCurrentIndex;
    const distance = Math.abs(relativeIndex);

    // Horizontal position
    const x = relativeIndex * cardWidth;

    // Scale, opacity, and blur based on distance from center
    let scale = 1;
    let opacity = 1;
    let blur = 0;
    let zIndex = 5;

    if (distance === 0) {
      // Center card (active) - sharp focus
      scale = 1.05;
      opacity = 1;
      blur = 0;
      zIndex = 10;
      card.classList.add('active');
    } else if (distance === 1) {
      // Adjacent cards - slight blur
      scale = 0.95;
      opacity = 0.8;
      blur = 2;
      zIndex = 8;
      card.classList.remove('active');
    } else if (distance === 2) {
      // Second-level cards - more blur
      scale = 0.85;
      opacity = 0.5;
      blur = 4;
      zIndex = 6;
      card.classList.remove('active');
    } else {
      // Far cards - heavy blur
      scale = 0.75;
      opacity = 0.3;
      blur = 6;
      zIndex = 5;
      card.classList.remove('active');
    }

    // Apply transformations
    const transform = `translate(calc(-50% + ${x}px), -50%) scale(${scale})`;
    card.style.transform = transform;
    card.style.opacity = opacity;
    card.style.filter = `blur(${blur}px)`;
    card.style.zIndex = zIndex;

    console.log(`Card ${index}: x=${x}px, transform="${transform}", opacity=${opacity}, zIndex=${zIndex}`);
  });

  // Update button states - allow circular navigation
  if (prevBtn) prevBtn.disabled = false;
  if (nextBtn) nextBtn.disabled = false;

  console.log('=== updateGalleryCarousel completed ===');
  // Info section is handled by PHP, no need to update here
}

function handleGalleryPrev() {
  const track = document.querySelector('.gallery .carousel-track');
  if (!track) return;
  const totalCards = track.querySelectorAll('.carousel-card').length;

  galleryCurrentIndex--;
  if (galleryCurrentIndex < 0) {
    galleryCurrentIndex = totalCards - 1;
  }
  updateGalleryCarousel();
}

function handleGalleryNext() {
  const track = document.querySelector('.gallery .carousel-track');
  if (!track) return;
  const totalCards = track.querySelectorAll('.carousel-card').length;

  galleryCurrentIndex++;
  if (galleryCurrentIndex >= totalCards) {
    galleryCurrentIndex = 0;
  }
  updateGalleryCarousel();
}

// Top4 Carousel Functionality
let top4CurrentIndex = 0;
const top4Cards = [
  { name: "Team Rocket's Spidops", price: '€ 182,00' },
  { name: 'Toxicroak ex', price: '€ 119,00' },
  { name: 'Pikachu on the Ball', price: '€ 99,00' },
  { name: 'Gyarados ex', price: '€ 105,00' }
];

function updateTop4Carousel() {
  const track = document.querySelector('.top4 .carousel-track');
  const prevBtn = document.querySelector('.top4 .carousel-nav.prev');
  const nextBtn = document.querySelector('.top4 .carousel-nav.next');

  if (!track) return;

  // Update transform
  track.style.transform = `translateX(-${top4CurrentIndex * 328}px)`;

  // Update button states
  if (prevBtn) prevBtn.disabled = top4CurrentIndex === 0;
  if (nextBtn) nextBtn.disabled = top4CurrentIndex >= top4Cards.length - 3;
}

function handleTop4Prev() {
  if (top4CurrentIndex > 0) {
    top4CurrentIndex--;
    updateTop4Carousel();
  }
}

function handleTop4Next() {
  if (top4CurrentIndex < top4Cards.length - 3) {
    top4CurrentIndex++;
    updateTop4Carousel();
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  console.log('=== DOMContentLoaded fired ===');
  console.log('Script.js is executing!');

  // Setup Gallery Carousel
  const galleryPrevBtn = document.querySelector('.gallery .carousel-nav.prev');
  const galleryNextBtn = document.querySelector('.gallery .carousel-nav.next');

  console.log('Gallery prev button:', galleryPrevBtn);
  console.log('Gallery next button:', galleryNextBtn);

  if (galleryPrevBtn) {
    galleryPrevBtn.addEventListener('click', handleGalleryPrev);
    console.log('Gallery prev button click listener added');
  }

  if (galleryNextBtn) {
    galleryNextBtn.addEventListener('click', handleGalleryNext);
    console.log('Gallery next button click listener added');
  }

  // Setup Top4 Carousel
  const top4PrevBtn = document.querySelector('.top4 .carousel-nav.prev');
  const top4NextBtn = document.querySelector('.top4 .carousel-nav.next');

  if (top4PrevBtn) {
    top4PrevBtn.addEventListener('click', handleTop4Prev);
  }

  if (top4NextBtn) {
    top4NextBtn.addEventListener('click', handleTop4Next);
  }

  // Initial carousel setup
  console.log('Calling initial carousel setup...');
  updateGalleryCarousel();
  updateTop4Carousel();
  console.log('=== Initialization complete ===');
});
