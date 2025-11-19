<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/

get_header(); ?>

  <div class="app">
    <div class="hero-background"></div>
    <div class="content-wrapper">

      <!-- Hero Section -->
      <section class="hero">
        <div class="hero-content">
          <div class="hero-text">
            <h1 class="hero-title">
              Seltene Pokémon<br>
              Karten online kaufen<br>
              oder versteigern
            </h1>
            <p class="hero-description">
              Kaufe, verkaufe oder versteigere deine Pokémon Karten bequem online –
              mit transparentem Grading und fairen Preisen.
            </p>
            <div class="hero-buttons">
              <button class="hero-button primary">Zum Marktplatz</button>
              <button class="hero-button secondary">Mehr erfahren</button>
            </div>
          </div>
        </div>

        <div class="hero-cards">
          <div class="hero-card hero-card-1">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-3">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-5">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-main">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/characters.png" alt="Characters" class="card-image main">
          </div>
        </div>
      </section>

      <div class="lower-background"></div>

      <!-- Features Section -->
      <section class="features">
        <div class="features-container">
          <h2 class="features-title">Was ist Cardbid?</h2>
          <div class="features-grid">
            <div class="feature-card">
              <h3 class="feature-title">TCG Sammelkarten Marktplatz</h3>
              <p class="feature-description">Erweitere deine Sammlung mit exklusiven Sammelkarten. Finde seltene Karten, nutze KI-Grading und entdecke die besten Deals.</p>
            </div>
            <div class="feature-card">
              <h3 class="feature-title">KI-basierte Grading-Schätzung</h3>
              <p class="feature-description">Erhalten Sie eine präzise Bewertung des Kartenzustands mit AI-Technologie für alle Kartentypen. Professionell und zuverlässig.</p>
            </div>
            <div class="feature-card">
              <h3 class="feature-title">Auktions-Features & Chatbot</h3>
              <p class="feature-description">Bieten Sie in Echtzeit, sehen Sie laufende Auktionen und nutzen Sie unseren Chatbot für Expertenwissen über TCG-Karten.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Gallery, Top4, PreFooter, Footer sections would go here -->

    </div>
  </div>

<?php get_footer(); ?>
