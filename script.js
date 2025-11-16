// Gallery Carousel Functionality
let galleryCurrentIndex = 2;
const galleryCards = [
  { name: 'Card 1', price: '€ 25,00' },
  { name: 'Card 2', price: '€ 35,00' },
  { name: 'Meloetta ex - 159', price: '€ 25,00' },
  { name: 'Card 4', price: '€ 45,00' },
  { name: 'Card 5', price: '€ 55,00' }
];

function updateGalleryCarousel() {
  const track = document.querySelector('.gallery .carousel-track');
  const prevBtn = document.querySelector('.gallery .carousel-nav.prev');
  const nextBtn = document.querySelector('.gallery .carousel-nav.next');
  const infoTitle = document.querySelector('.gallery .info-title');
  const infoSubtitle = document.querySelector('.gallery .info-subtitle');

  if (!track) return;

  const cards = track.querySelectorAll('.carousel-card');
  const totalCards = cards.length;
  const cardWidth = 316; // Card width + gap

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
    card.style.transform = `translate(calc(-50% + ${x}px), -50%) scale(${scale})`;
    card.style.opacity = opacity;
    card.style.filter = `blur(${blur}px)`;
    card.style.zIndex = zIndex;
  });

  // Update button states - allow circular navigation
  if (prevBtn) prevBtn.disabled = false;
  if (nextBtn) nextBtn.disabled = false;

  // Update info
  if (infoTitle) infoTitle.textContent = galleryCards[galleryCurrentIndex].name;
  if (infoSubtitle) infoSubtitle.textContent = `Starting bid: ${galleryCards[galleryCurrentIndex].price}`;
}

function handleGalleryPrev() {
  galleryCurrentIndex--;
  if (galleryCurrentIndex < 0) {
    galleryCurrentIndex = galleryCards.length - 1;
  }
  updateGalleryCarousel();
}

function handleGalleryNext() {
  galleryCurrentIndex++;
  if (galleryCurrentIndex >= galleryCards.length) {
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
  // Setup Gallery Carousel
  const galleryPrevBtn = document.querySelector('.gallery .carousel-nav.prev');
  const galleryNextBtn = document.querySelector('.gallery .carousel-nav.next');

  if (galleryPrevBtn) {
    galleryPrevBtn.addEventListener('click', handleGalleryPrev);
  }

  if (galleryNextBtn) {
    galleryNextBtn.addEventListener('click', handleGalleryNext);
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
  updateGalleryCarousel();
  updateTop4Carousel();
});
