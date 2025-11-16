
import React from 'react';
import Navigation from './components/Navigation';
import Hero from './components/Hero';
import Features from './components/Features';
import Gallery from './components/Gallery';
import Top4 from './components/Top4';
import PreFooter from './components/PreFooter';
import Footer from './components/Footer';
import './App.css';

function App() {
  return (
    <div className="app">
      <div className="hero-background" />
      <div className="content-wrapper">
        <Navigation />
        <Hero />
        <div className="lower-background" />
        <Features />
        <Gallery />
        <Top4 />
        <PreFooter />
        <Footer />
      </div>
    </div>
  );
}

export default App;
