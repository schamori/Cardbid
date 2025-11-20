<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/

// Enqueue the stylesheet
wp_enqueue_style('cardbid-home-css', get_stylesheet_directory_uri() . '/cardbid-style.css', array(), '1.0');
?>
<?php get_header(); ?>

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

  </div>
</div>

<?php get_footer(); ?>
