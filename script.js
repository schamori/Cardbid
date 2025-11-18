// Mega Menu Functionality
console.log('=== script.js loaded ===');
const shopButton = document.querySelector('.nav-shop');
const megaMenu = document.querySelector('.mega-menu');
const navigation = document.querySelector('.navigation');

console.log('Mega menu elements check:');
console.log('  shopButton:', shopButton);
console.log('  megaMenu:', megaMenu);
console.log('  navigation:', navigation);

let megaMenuTimeout;

// Only set up mega menu if elements exist
if (shopButton && megaMenu) {
  console.log('Setting up mega menu event listeners...');

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

  console.log('✓ Mega menu event listeners added');
} else {
  console.warn('⚠ Mega menu elements not found - skipping mega menu setup');
}

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
  console.log('>>> Starting to position cards...');
  cards.forEach((card, index) => {
    console.log(`\n--- Processing Card ${index} ---`);
    console.log('Card element:', card);
    console.log('Card classes:', card.className);

    // Calculate position relative to current index
    const relativeIndex = index - galleryCurrentIndex;
    const distance = Math.abs(relativeIndex);
    console.log(`Relative index: ${relativeIndex}, Distance from center: ${distance}`);

    // Horizontal position
    const x = relativeIndex * cardWidth;
    console.log(`X position: ${x}px (relativeIndex ${relativeIndex} * cardWidth ${cardWidth})`);

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
      console.log('This is the CENTER/ACTIVE card');
    } else if (distance === 1) {
      // Adjacent cards - slight blur
      scale = 0.95;
      opacity = 0.8;
      blur = 2;
      zIndex = 8;
      card.classList.remove('active');
      console.log('This is an ADJACENT card');
    } else if (distance === 2) {
      // Second-level cards - more blur
      scale = 0.85;
      opacity = 0.5;
      blur = 4;
      zIndex = 6;
      card.classList.remove('active');
      console.log('This is a SECOND-LEVEL card');
    } else {
      // Far cards - heavy blur
      scale = 0.75;
      opacity = 0.3;
      blur = 6;
      zIndex = 5;
      card.classList.remove('active');
      console.log('This is a FAR card');
    }

    // Log BEFORE applying styles
    console.log('BEFORE applying styles:');
    console.log('  Current transform:', card.style.transform);
    console.log('  Current opacity:', card.style.opacity);
    console.log('  Current filter:', card.style.filter);
    console.log('  Current zIndex:', card.style.zIndex);

    // Apply transformations
    const transform = `translate(calc(-50% + ${x}px), -50%) scale(${scale})`;
    card.style.transform = transform;
    card.style.opacity = opacity;
    card.style.filter = `blur(${blur}px)`;
    card.style.zIndex = zIndex;

    // Log AFTER applying styles
    console.log('AFTER applying styles:');
    console.log('  Set transform to:', transform);
    console.log('  Set opacity to:', opacity);
    console.log('  Set filter to:', `blur(${blur}px)`);
    console.log('  Set zIndex to:', zIndex);
    console.log('  Actual card.style.transform:', card.style.transform);
    console.log('  Actual card.style.opacity:', card.style.opacity);
    console.log('  Actual card.style.filter:', card.style.filter);
    console.log('  Actual card.style.zIndex:', card.style.zIndex);

    // Get computed styles to see what's REALLY being applied
    const computedStyle = window.getComputedStyle(card);
    console.log('COMPUTED styles (what browser actually uses):');
    console.log('  Computed transform:', computedStyle.transform);
    console.log('  Computed opacity:', computedStyle.opacity);
    console.log('  Computed filter:', computedStyle.filter);
    console.log('  Computed zIndex:', computedStyle.zIndex);
    console.log('  Computed position:', computedStyle.position);
    console.log('  Computed left:', computedStyle.left);
    console.log('  Computed top:', computedStyle.top);
    console.log('  Computed width:', computedStyle.width);
    console.log('  Computed height:', computedStyle.height);

    console.log(`>>> Card ${index} complete\n`);
  });
  console.log('>>> All cards positioned!');

  // Update button states - allow circular navigation
  if (prevBtn) prevBtn.disabled = false;
  if (nextBtn) nextBtn.disabled = false;

  // Update info section with current card data
  const currentCard = cards[galleryCurrentIndex];
  if (currentCard && infoTitle && infoSubtitle) {
    const productName = currentCard.getAttribute('data-product-name');
    const productPrice = currentCard.getAttribute('data-product-price');
    const productUrl = currentCard.getAttribute('data-product-url');

    console.log('\nUpdating info section:');
    console.log('  Product name:', productName);
    console.log('  Product price:', productPrice);
    console.log('  Product URL:', productUrl);

    if (productName) {
      infoTitle.textContent = productName;
    }

    if (productPrice) {
      // Update the price span within the subtitle
      const priceSpan = infoSubtitle.querySelector('.info-price');
      if (priceSpan) {
        priceSpan.textContent = productPrice;
      } else {
        infoSubtitle.innerHTML = `Price: € <span class="info-price">${productPrice}</span>`;
      }
    }

    // Update button link
    const infoButton = document.querySelector('.gallery .info-button');
    if (infoButton && productUrl) {
      infoButton.href = productUrl;
    }
  }

  console.log('=== updateGalleryCarousel completed ===');
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
document.addEventListener('DOMContentLoaded', function () {
  console.log('\n\n');
  console.log('================================================================================');
  console.log('=== DOMContentLoaded fired ===');
  console.log('=== Script.js is executing! ===');
  console.log('================================================================================');
  console.log('Current time:', new Date().toISOString());
  console.log('Document ready state:', document.readyState);

  // Check if gallery section exists
  const gallerySection = document.querySelector('.gallery');
  console.log('\nChecking for .gallery section:', gallerySection);

  if (gallerySection) {
    console.log('Gallery section found!');
    console.log('Gallery section classes:', gallerySection.className);

    const galleryContainer = gallerySection.querySelector('.gallery-container');
    console.log('Gallery container:', galleryContainer);

    const carouselWrapper = gallerySection.querySelector('.carousel-wrapper');
    console.log('Carousel wrapper:', carouselWrapper);

    const carouselContainer = gallerySection.querySelector('.carousel-container');
    console.log('Carousel container:', carouselContainer);

    const carouselTrack = gallerySection.querySelector('.carousel-track');
    console.log('Carousel track:', carouselTrack);

    if (carouselTrack) {
      const allCards = carouselTrack.querySelectorAll('.carousel-card');
      console.log('Total .carousel-card elements found:', allCards.length);
      allCards.forEach((card, idx) => {
        console.log(`  Card ${idx}:`, card);
        console.log(`    Classes: ${card.className}`);
        console.log(`    Has anchor:`, card.querySelector('a'));
      });
    }
  } else {
    console.error('ERROR: .gallery section NOT FOUND in DOM!');
  }

  // Setup Gallery Carousel
  console.log('\n--- Setting up Gallery Carousel buttons ---');
  const galleryPrevBtn = document.querySelector('.gallery .carousel-nav.prev');
  const galleryNextBtn = document.querySelector('.gallery .carousel-nav.next');

  console.log('Gallery prev button:', galleryPrevBtn);
  console.log('Gallery next button:', galleryNextBtn);

  if (galleryPrevBtn) {
    galleryPrevBtn.addEventListener('click', handleGalleryPrev);
    console.log('✓ Gallery prev button click listener added');
  } else {
    console.warn('✗ Gallery prev button NOT found');
  }

  if (galleryNextBtn) {
    galleryNextBtn.addEventListener('click', handleGalleryNext);
    console.log('✓ Gallery next button click listener added');
  } else {
    console.warn('✗ Gallery next button NOT found');
  }

  // Setup Top4 Carousel
  console.log('\n--- Setting up Top4 Carousel buttons ---');
  const top4PrevBtn = document.querySelector('.top4 .carousel-nav.prev');
  const top4NextBtn = document.querySelector('.top4 .carousel-nav.next');

  if (top4PrevBtn) {
    top4PrevBtn.addEventListener('click', handleTop4Prev);
    console.log('✓ Top4 prev button click listener added');
  }

  if (top4NextBtn) {
    top4NextBtn.addEventListener('click', handleTop4Next);
    console.log('✓ Top4 next button click listener added');
  }

  // Initial carousel setup
  console.log('\n================================================================================');
  console.log('=== Calling initial carousel setup... ===');
  console.log('================================================================================\n');

  updateGalleryCarousel();
  updateTop4Carousel();

  console.log('\n================================================================================');
  console.log('=== Initialization complete ===');
  console.log('================================================================================\n\n');
});
