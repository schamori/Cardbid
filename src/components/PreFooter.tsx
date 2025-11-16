
import React from 'react';
import './PreFooter.css';

const PreFooter: React.FC = () => {
  return (
    <section className="pre-footer">
      <div className="pre-footer-container">
        <h2 className="pre-footer-title">Neu im TCG Karten Hobby?</h2>
        <div className="pre-footer-buttons">
          <button className="contact-button">Kontaktformular</button>
          <button className="contact-button">Kontakt per Whatsapp</button>
          <button className="contact-button">Chatbot starten</button>
        </div>
      </div>
    </section>
  );
};

export default PreFooter;
