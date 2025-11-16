
import React, { useState } from 'react';
import './Top4.css';

const Top4: React.FC = () => {
  const [currentIndex, setCurrentIndex] = useState(0);
  
  const cards = [
    { name: "Team Rocket's Spidops", price: '€ 182,00' },
    { name: 'Toxicroak ex', price: '€ 119,00' },
    { name: 'Pikachu on the Ball', price: '€ 99,00' },
    { name: 'Gyarados ex', price: '€ 105,00' }
  ];

  const handlePrev = () => {
    if (currentIndex > 0) {
      setCurrentIndex(currentIndex - 1);
    }
  };

  const handleNext = () => {
    if (currentIndex < cards.length - 3) {
      setCurrentIndex(currentIndex + 1);
    }
  };

  return (
    <section className="top4">
      <div className="top4-container">
        <div className="top4-header">
          <h2 className="top4-title">Top 4 Verkauft</h2>
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
              style={{ transform: `translateX(-${currentIndex * 328}px)` }}
            >
              {cards.map((card, index) => (
                <div key={index} className="top4-card">
                  <div className="card-badge">
                    <span>Auction ended</span>
                  </div>
                  <div className="card-image-placeholder">
                    {card.name}
                  </div>
                  <h3 className="card-title">{card.name}</h3>
                  <p className="card-price">Sold for {card.price}</p>
                </div>
              ))}
            </div>
          </div>

          <button 
            className="carousel-nav next" 
            onClick={handleNext}
            disabled={currentIndex >= cards.length - 3}
            aria-label="Next"
          >
            <svg viewBox="0 0 24 24" fill="none">
              <path d="M9 18L15 12L9 6" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>
        </div>
      </div>
    </section>
  );
};

export default Top4;
