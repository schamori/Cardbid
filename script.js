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

  // Update transform
  track.style.transform = `translateX(calc(-50% + ${-galleryCurrentIndex * 316}px)) translateY(-50%)`;

  // Update card styles
  const cards = track.querySelectorAll('.carousel-card');
  cards.forEach((card, index) => {
    const distance = Math.abs(index - galleryCurrentIndex);
    const opacity = distance === 0 ? 1 : distance === 1 ? 0.9 : 0.8;
    const blur = distance === 0 ? 0 : distance === 1 ? 1 : 2;
    const scale = distance === 0 ? 1 : 0.95;

    card.style.opacity = opacity;
    card.style.filter = `blur(${blur}px)`;
    card.style.transform = `scale(${scale})`;

    if (index === galleryCurrentIndex) {
      card.classList.add('active');
    } else {
      card.classList.remove('active');
    }
  });

  // Update button states
  if (prevBtn) prevBtn.disabled = galleryCurrentIndex === 0;
  if (nextBtn) nextBtn.disabled = galleryCurrentIndex === galleryCards.length - 1;

  // Update info
  if (infoTitle) infoTitle.textContent = galleryCards[galleryCurrentIndex].name;
  if (infoSubtitle) infoSubtitle.textContent = `Starting bid: ${galleryCards[galleryCurrentIndex].price}`;
}

function handleGalleryPrev() {
  if (galleryCurrentIndex > 0) {
    galleryCurrentIndex--;
    updateGalleryCarousel();
  }
}

function handleGalleryNext() {
  if (galleryCurrentIndex < galleryCards.length - 1) {
    galleryCurrentIndex++;
    updateGalleryCarousel();
  }
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
