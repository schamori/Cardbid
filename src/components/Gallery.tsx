
import React, { useState } from 'react';
import './Gallery.css';

const Gallery: React.FC = () => {
  const [currentIndex, setCurrentIndex] = useState(2);
  
  const cards = [
    { name: 'Card 1', price: '€ 25,00' },
    { name: 'Card 2', price: '€ 35,00' },
    { name: 'Meloetta ex - 159', price: '€ 25,00' },
    { name: 'Card 4', price: '€ 45,00' },
    { name: 'Card 5', price: '€ 55,00' }
  ];

  const handlePrev = () => {
    if (currentIndex > 0) {
      setCurrentIndex(currentIndex - 1);
    }
  };

  const handleNext = () => {
    if (currentIndex < cards.length - 1) {
      setCurrentIndex(currentIndex + 1);
    }
  };

  return (
    <section className="gallery">
      <div className="gallery-container">
        <div className="gallery-header">
          <h2 className="gallery-title">Höchste Gebote</h2>
          <button className="view-all-button">Alle ansehen</button>
        </div>

        <div className="carousel-wrapper">
          <button 
            className="carousel-nav prev" 
            onClick={handlePrev}
            disabled={currentIndex === 0}
            aria-label="Previous"
          >
            <svg viewBox="0 0 24 24" fill="none">
              <path d="M15 18L9 12L15 6" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>

          <div className="carousel-container">
            <div 
              className="carousel-track"
              style={{ transform: `translateX(calc(-50% + ${-currentIndex * 316}px))` }}
            >
              {cards.map((card, index) => {
                const distance = Math.abs(index - currentIndex);
                const opacity = distance === 0 ? 1 : distance === 1 ? 0.9 : 0.8;
                const blur = distance === 0 ? 0 : distance === 1 ? 1 : 2;
                const scale = distance === 0 ? 1 : 0.95;

                return (
                  <div
                    key={index}
                    className={`carousel-card ${index === currentIndex ? 'active' : ''}`}
                    style={{
                      opacity,
                      filter: `blur(${blur}px)`,
                      transform: `scale(${scale})`
                    }}
                  >
                    <div className="card-image-placeholder">
                      {card.name}
                    </div>
                  </div>
                );
              })}
            </div>
          </div>

          <button 
            className="carousel-nav next" 
            onClick={handleNext}
            disabled={currentIndex === cards.length - 1}
            aria-label="Next"
          >
            <svg viewBox="0 0 24 24" fill="none">
              <path d="M9 18L15 12L9 6" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>
        </div>

        <div className="gallery-info">
          <h3 className="info-title">{cards[currentIndex].name}</h3>
          <p className="info-subtitle">Starting bid: {cards[currentIndex].price}</p>
          <div className="info-status">
            <span>Auction not started</span>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Gallery;
