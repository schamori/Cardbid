
import React from 'react';
import './Features.css';

const Features: React.FC = () => {
  const features = [
    {
      title: 'TCG Sammelkarten Marktplatz',
      description: 'Erweitere deine Sammlung mit exklusiven Sammelkarten. Finde seltene Karten, nutze KI-Grading und entdecke die besten Deals.'
    },
    {
      title: 'KI-basierte Grading-Schätzung',
      description: 'Erhalten Sie eine präzise Bewertung des Kartenzustands mit AI-Technologie für alle Kartentypen. Professionell und zuverlässig.'
    },
    {
      title: 'Auktions-Features & Chatbot',
      description: 'Bieten Sie in Echtzeit, sehen Sie laufende Auktionen und nutzen Sie unseren Chatbot für Expertenwissen über TCG-Karten.'
    }
  ];

  return (
    <section className="features">
      <div className="features-container">
        <h2 className="features-title">Was ist Cardbid?</h2>
        <div className="features-grid">
          {features.map((feature, index) => (
            <div key={index} className="feature-card">
              <h3 className="feature-title">{feature.title}</h3>
              <p className="feature-description">{feature.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Features;
