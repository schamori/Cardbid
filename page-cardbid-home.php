<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/

// Enqueue the stylesheet
wp_enqueue_style('cardbid-home-css', get_stylesheet_directory_uri() . '/cardbid-style.css', array(), '1.0');

get_header();
?>

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
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-2">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-3">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-4">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-5">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-main">
            <img src="https://cardbid.eu/wp-content/uploads/2025/10/Charakter_Beide_mit_Schatten.png" alt="Characters" class="card-image main">
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

      <!-- Gallery Section - Höchste Gebote (Simple Auction Integration) -->
      <section class="gallery">
        <div class="gallery-container">
          <div class="gallery-header">
            <h2 class="gallery-title">Höchste Gebote</h2>
            <button class="view-all-button">Alle ansehen</button>
          </div>

          <div class="carousel-wrapper">
            <button class="carousel-nav prev" aria-label="Previous">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <div class="carousel-container">
              <div class="carousel-track">
                <?php
                // Get limited WooCommerce products (20 products for carousel performance)
                $products = wc_get_products(array(
                    'limit' => 20,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'status' => 'publish'
                ));

                // Debug: Output product count
                echo '<!-- Found ' . count($products) . ' products -->';

                // Display products
                if (!empty($products) && count($products) > 0) :
                    $count = 0;
                    foreach ($products as $product) :
                        $active_class = ($count === 2) ? ' active' : '';
                        $product_id = $product->get_id();
                        $product_url = get_permalink($product_id);
                        $product_title = $product->get_name();
                        $product_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
                        if (!$product_image) {
                            $product_image = 'https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png';
                        }

                        // Debug: Output each card
                        echo '<!-- Card ' . $count . ': ' . esc_html($product_title) . ' -->';

                        // Get product price
                        $product_price = $product->get_price();
                        $formatted_price = $product_price ? number_format((float)$product_price, 2, ',', '.') : '0,00';
                        ?>
                        <div class="carousel-card<?php echo $active_class; ?>"
                             data-product-id="<?php echo $product_id; ?>"
                             data-product-name="<?php echo esc_attr($product_title); ?>"
                             data-product-url="<?php echo esc_url($product_url); ?>"
                             data-product-price="<?php echo esc_attr($formatted_price); ?>">
                          <a href="<?php echo esc_url($product_url); ?>">
                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" class="card-image">
                          </a>
                        </div>
                        <?php
                        $count++;
                    endforeach;
                else : ?>
                  <!-- Fallback cards if no auctions found -->
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card active">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <button class="carousel-nav next" aria-label="Next">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>

          <div class="gallery-info">
            <?php
            // Display info for the center product (index 2 or first one)
            if (!empty($products)) :
                $display_product = isset($products[2]) ? $products[2] : $products[0];
                $display_title = $display_product->get_name();
                $display_price = $display_product->get_price();
                $display_url = get_permalink($display_product->get_id());
                $formatted_display_price = $display_price ? number_format((float)$display_price, 2, ',', '.') : '0,00';
                ?>
                <h3 class="info-title"><?php echo esc_html($display_title); ?></h3>
                <p class="info-subtitle">Price: € <span class="info-price"><?php echo $formatted_display_price; ?></span></p>
                <a href="<?php echo esc_url($display_url); ?>" class="info-button">Bid now</a>
            <?php else : ?>
                <h3 class="info-title">No products available</h3>
                <p class="info-subtitle">Price: € <span class="info-price">0,00</span></p>
                <a href="#" class="info-button">Bid now</a>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <!-- Top4 Section - Top 4 Verkauft (WooCommerce In-Stock Items) -->
      <section class="top4">
        <div class="top4-container">
          <div class="top4-header">
            <h2 class="top4-title">Top 4 Verkauft</h2>
            <button class="view-all-button">Alle ansehen</button>
          </div>

          <div class="carousel-wrapper">
            <button class="carousel-nav prev" aria-label="Previous">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <div class="carousel-container">
              <div class="carousel-track">
                <?php
                // Get top products using wc_get_products (recommended method)
                $top4_products = wc_get_products(array(
                    'limit' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'status' => 'publish'
                ));

                if (!empty($top4_products)) :
                    foreach ($top4_products as $product) :
                        $product_id = $product->get_id();
                        $product_url = get_permalink($product_id);
                        $product_title = $product->get_name();
                        $product_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
                        if (!$product_image) {
                            $product_image = 'https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png';
                        }
                        ?>
                        <div class="top4-card">
                          <a href="<?php echo esc_url($product_url); ?>">
                            <div class="card-badge">
                              <span>In Stock</span>
                            </div>
                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" class="card-image">
                            <h3 class="card-title"><?php echo esc_html($product_title); ?></h3>
                            <p class="card-price"><?php echo $product->get_price_html(); ?></p>
                          </a>
                        </div>
                        <?php
                    endforeach;
                else : ?>
                  <!-- Fallback cards if no products found -->
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Team Rocket's Spidops</h3>
                    <p class="card-price">€ 182,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Toxicroak ex</h3>
                    <p class="card-price">€ 119,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Pikachu on the Ball</h3>
                    <p class="card-price">€ 99,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Gyarados ex</h3>
                    <p class="card-price">€ 105,00</p>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <button class="carousel-nav next" aria-label="Next">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
      </section>

      <!-- PreFooter Section -->
      <section class="pre-footer">
        <div class="pre-footer-container">
          <h2 class="pre-footer-title">Neu im TCG Karten Hobby?</h2>
          <div class="pre-footer-buttons">
            <button class="contact-button">Kontaktformular</button>
            <button class="contact-button">Kontakt per Whatsapp</button>
            <button class="contact-button">Chatbot starten</button>
          </div>
        </div>
      </section>

      <!-- Footer Section -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-section footer-nav">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#dashboard">Dashboard</a>
            <a href="#account">Account</a>
          </div>

          <div class="footer-section footer-logo">
            <div class="footer-logo-icon">
              <svg viewBox="0 0 74 58" fill="none">
                <path d="M67.5096 34.0127C65.6908 30.992 62.7747 28.9468 59.5472 27.5559C59.2883 27.4444 58.0789 27.0224 58.0039 26.8476C57.9742 26.7728 57.9833 26.4599 57.9897 26.2428C58.1505 20.7784 58.3419 15.3308 58.5436 9.87046C58.5436 7.93362 58.7656 5.55918 57.379 4.18635C56.4841 3.44274 55.6166 3.09566 54.4746 3.11779C52.3343 3.15929 50.0657 3.45373 47.917 3.57564C42.1417 3.90319 33.173 4.22612 27.4011 4.58693C24.5716 4.74659 23.0673 5.50351 22.5964 8.41432C21.747 13.6574 21.5515 19.5451 21.2731 24.859C21.2386 25.5173 21.2076 26.2165 21.186 26.872C17.7607 27.5876 13.4653 25.5582 11.4377 22.5885C11.9296 20.2589 11.884 18.2214 9.18876 17.3145L10.7778 13.6163C10.7823 13.6059 10.7949 13.6011 10.8054 13.6054C12.345 14.2316 11.7786 14.2412 12.2425 14.8791C12.5473 15.2984 13.2176 15.7248 13.7433 15.7962C17.4731 16.3021 20.4186 10.8836 20.2473 7.75604C20.1434 5.85868 18.8797 4.66908 16.9143 4.85896C16.544 4.89468 16.0515 5.12302 16.0515 5.12302C15.2814 4.87429 10.5984 2.91721 9.49082 2.40961C9.39573 1.75291 9.19007 0.744506 7.76042 0.195691C3.44297 -1.28994 -0.125471 6.07503 1.27935 9.46004C1.67182 10.4052 2.67381 11.0721 3.71771 11.1169C4.1597 11.1358 4.61293 10.9082 4.97998 10.9682C5.32688 11.0248 6.22735 11.4925 6.6261 11.6596C6.80547 11.7422 6.77494 11.71 6.74952 11.7963L4.96523 15.792C2.60224 15.6533 1.18587 17.4583 0.65786 19.516C0.278975 20.9925 0.263639 22.2883 1.21494 23.5574C0.85446 24.5039 0.0930383 25.5909 0.0112436 26.6036C-0.263499 30.0115 4.47432 30.1014 4.88519 27.0207C5.32965 27.3222 6.16308 27.8302 7.22101 27.5675C7.49649 27.7942 8.99245 28.9746 9.56005 29.3455C13.0331 31.6151 16.8158 32.7733 20.9925 32.0769C20.8731 34.0512 20.605 40.1556 20.5741 42.139C20.521 45.5676 21.3934 47.1631 24.5999 47.4292C24.8719 47.4599 25.1875 47.4503 25.4233 47.4503C25.5248 47.4581 25.5829 47.4365 25.5829 47.5683C25.5449 47.8204 25.2223 48.4112 25.1211 48.7711C24.9668 49.3198 24.817 49.8926 24.8321 50.4643C23.2138 49.9412 21.7761 48.9844 19.9814 49.5173C18.016 50.101 17.5149 52.1573 18.8001 53.6744C20.0482 55.1476 25.7782 57.8464 27.6647 57.6114C29.6076 57.3694 29.252 55.3511 29.4224 54.0049C29.6978 51.8287 30.0656 49.5726 31.1999 47.6593L45.1877 48.0699C45.7187 49.7156 46.4159 51.5312 48.0584 52.3966C47.4589 52.8326 46.8412 53.0902 46.3247 53.6812C44.9487 55.2558 45.0651 57.6078 47.4966 57.9115C48.6683 58.0579 50.9567 57.9993 51.3363 57.9118C52.0273 57.7689 52.5874 57.6613 53.2108 57.3157C55.4424 56.0787 56.9427 51.3901 54.0506 50.1447C53.5409 49.9251 53.2015 49.985 52.735 49.8731C52.1158 49.7244 51.078 49.0627 50.8879 48.448C50.8744 48.3468 51.0009 48.3503 51.0082 48.3503H53.6029C56.0463 48.3503 57.4268 46.366 57.4268 44.4462L57.7053 32.5372C58.7501 32.9738 59.762 33.4928 60.6518 34.1946C61.0326 34.4948 62.4309 35.825 62.5397 36.2124C62.6032 36.438 61.7546 37.2816 61.5615 37.5649C61.2453 38.0287 60.9231 38.648 60.7804 39.1883C59.9209 42.4404 63.041 44.3135 65.2433 41.6406C66.4146 42.8589 68.0017 44.8301 69.9402 44.4104C70.8423 44.215 71.5787 43.4919 71.9185 42.6754C72.0185 42.4351 72.0488 41.9976 72.1782 41.827C72.2985 41.6682 72.757 41.5483 72.9637 41.4031C73.6442 41.0246 74 40.329 74 39.7082V39.3956C74 36.247 70.1983 34.6393 67.5096 34.0131V34.0127Z" fill="#6974DC"/>
              </svg>
            </div>
            <span class="logo-text">Cardbid</span>
          </div>

          <div class="footer-section footer-contact">
            <h4>Kontakt</h4>
            <p>info@cardbid.eu</p>
            <p>+49 123 456 789</p>
          </div>

          <div class="footer-section footer-social">
            <h4>Folge uns</h4>
            <div class="social-links">
              <a href="#" aria-label="Facebook">FB</a>
              <a href="#" aria-label="Instagram">IG</a>
              <a href="#" aria-label="Twitter">TW</a>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; <?php echo date('Y'); ?> Cardbid. Alle Rechte vorbehalten.</p>
          <div class="footer-links">
            <a href="#">Impressum</a>
            <a href="#">Datenschutz</a>
            <a href="#">AGB</a>
          </div>
        </div>
      </footer>

    </div>
  </div>

    </div><!-- .col-full -->
  </div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
