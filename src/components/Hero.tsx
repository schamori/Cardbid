
import React from 'react';
import './Hero.css';

const Hero: React.FC = () => {
  return (
    <section className="hero">
      <div className="hero-content">
        <div className="hero-text">
          <h1 className="hero-title">
            Seltene Pokémon<br />
            Karten online kaufen<br />
            oder versteigern
          </h1>
          <p className="hero-description">
            Kaufe, verkaufe oder versteigere deine Pokémon Karten bequem online – 
            mit transparentem Grading und fairen Preisen.
          </p>
          <div className="hero-buttons">
            <button className="hero-button primary">Zum Marktplatz</button>
            <button className="hero-button secondary">Mehr erfahren</button>
          </div>
        </div>
      </div>

      <div className="hero-cards">
        <div className="hero-card hero-card-1">
          <div className="card-placeholder">Card 1</div>
        </div>
        <div className="hero-card hero-card-2">
          <div className="card-placeholder">Card 2</div>
        </div>
        <div className="hero-card hero-card-3">
          <div className="card-placeholder">Card 3</div>
        </div>
        <div className="hero-card hero-card-4">
          <div className="card-placeholder">Card 4</div>
        </div>
        <div className="hero-card hero-card-5">
          <div className="card-placeholder">Card 5</div>
        </div>
        <div className="hero-card hero-card-main">
          <div className="card-placeholder main">Main Card</div>
        </div>
      </div>
    </section>
  );
};

export default Hero;
