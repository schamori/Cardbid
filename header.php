<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Genaminto-Regular.woff2" as="font" type="font/woff2" crossorigin>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Custom Cardbid Navigation - OUTSIDE #page for sticky to work -->
<nav class="navigation">
  <!-- Logo spanning both rows on the left -->
  <div class="nav-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo-link">
      <div class="nav-logo">
        <div class="logo-icon">
          <img src="https://cardbid.eu/wp-content/uploads/2025/10/Cardbid_Maskottchen_White.png" alt="Cardbid Logo" />
        </div>
      <div class="logo-text">
        <span>Cardbid</span>
      </div>
    </div>
    </a>
  </div>

  <!-- Account Icon -->
  <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="nav-account-icon" title="My Account">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
    </svg>
  </a>

  <!-- Cart -->
  <div class="nav-cart-wrapper">
        <a href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>" class="nav-cart" title="Shopping Cart">
          <?php if ( function_exists( 'WC' ) ) : ?>
            <span class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?> Items</span>
            <span class="cart-price"><?php echo WC()->cart->get_cart_total(); ?></span>
          <?php else : ?>
            <span class="cart-items">0 Items</span>
            <span class="cart-price">0,00€</span>
          <?php endif; ?>
          <div class="cart-icon">
            <svg viewBox="0 0 24 24" fill="none">
              <path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V11M12 14H12.01M3.6 21 H20.4C20.9601 21 21.2401 21 21.454 20.891C21.6422 20.7951 21.7951 20.6422 21.891 20.454C22 20.2401 22 19.9601 22 19.4V11.6C22 11.0399 22 10.7599 21.891 10.546C21.7951 10.3578 21.6422 10.2049 21.454 10.109C21.2401 10 20.9601 10 20.4 10H3.6C3.03995 10 2.75992 10 2.54601 10.109C2.35785 10.2049 2.20487 10.3578 2.10899 10.546C2 10.7599 2 11.0399 2 11.6V19.4C2 19.9601 2 20.2401 2.10899 20.454C2.20487 20.6422 2.35785 20.7951 2.54601 20.891C2.75992 21 3.03995 21 3.6 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <!-- Mobile: Show icon with count badge -->
          <span class="cart-icon-mobile">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <?php if ( function_exists( 'WC' ) && WC()->cart->get_cart_contents_count() > 0 ) : ?>
              <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <?php endif; ?>
          </span>
        </a>

        <!-- Cart Dropdown -->
        <div class="cart-dropdown">
          <?php if ( function_exists( 'WC' ) && WC()->cart->get_cart_contents_count() > 0 ) : ?>
            <div class="cart-dropdown-items">
              <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                  $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
              ?>
                <div class="cart-dropdown-item">
                  <?php if ( $product_permalink ) : ?>
                    <a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-item-image">
                  <?php else : ?>
                    <div class="cart-item-image">
                  <?php endif; ?>
                    <?php echo $_product->get_image( 'thumbnail' ); ?>
                  <?php echo $product_permalink ? '</a>' : '</div>'; ?>

                  <div class="cart-item-details">
                    <?php if ( $product_permalink ) : ?>
                      <a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-item-name">
                        <?php echo wp_kses_post( $_product->get_name() ); ?>
                      </a>
                    <?php else : ?>
                      <span class="cart-item-name"><?php echo wp_kses_post( $_product->get_name() ); ?></span>
                    <?php endif; ?>
                    <div class="cart-item-meta">
                      <span class="cart-item-quantity">Qty: <?php echo $cart_item['quantity']; ?></span>
                      <span class="cart-item-price">
                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                      </span>
                    </div>
                  </div>
                </div>
              <?php
                endif;
              endforeach;
              ?>
            </div>

            <div class="cart-dropdown-footer">
              <div class="cart-dropdown-total">
                <span>Subtotal:</span>
                <strong><?php echo WC()->cart->get_cart_subtotal(); ?></strong>
              </div>
              <div class="cart-dropdown-actions">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>" class="btn-view-cart">View Cart</a>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'checkout' ) ); ?>" class="btn-checkout">Checkout</a>
              </div>
            </div>
          <?php else : ?>
            <div class="cart-dropdown-empty">
              <p>Your cart is empty</p>
            </div>
          <?php endif; ?>
        </div>
  </div>

  <!-- Mobile Menu Toggle -->
  <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle mobile menu">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- Right side content wrapper -->
  <div class="nav-content-wrapper">
    <!-- Top Row: Search Bar Only -->
    <div class="nav-row-top">
      <!-- FiboSearch Integration -->
      <div class="nav-search">
        <?php
        // FiboSearch integration - supports multiple methods
        if ( function_exists( 'dgwt_wcas_get_search_form' ) ) {
          // Method 1: Direct function call (Pro version)
          echo dgwt_wcas_get_search_form();
        } elseif ( shortcode_exists( 'fibosearch' ) ) {
          // Method 2: Shortcode (both Free and Pro)
          echo do_shortcode( '[fibosearch]' );
        } elseif ( shortcode_exists( 'wcas-search-form' ) ) {
          // Method 3: Legacy shortcode
          echo do_shortcode( '[wcas-search-form]' );
        }
        ?>
      </div>
    </div>

    <!-- Bottom Row: Game Categories -->
    <div class="nav-row-bottom">
      <div class="nav-links">
        <?php
        // Define game categories with their slugs and icons - Pokémon in the center
        $game_categories = array(
          array('name' => 'Magic: the Gathering', 'slug' => 'magic-the-gathering', 'icon' => '🔮'),
          array('name' => 'Yu-Gi-Oh!', 'slug' => 'yu-gi-oh', 'icon' => '🎴'),
          array('name' => 'Flesh and Blood', 'slug' => 'flesh-and-blood', 'icon' => '⚔️'),
          array('name' => 'Pokémon', 'slug' => 'pokemon-non-japanese', 'icon' => '⚪'),
          array('name' => 'Digimon', 'slug' => 'digimon', 'icon' => '🦖'),
          array('name' => 'Cardfight!! Vanguard', 'slug' => 'cardfight-vanguard', 'icon' => '🛡️'),
          array('name' => 'All Games', 'slug' => 'all-games', 'icon' => '🎮'),
        );

        foreach ($game_categories as $game) {
          // Handle "All Games" differently
          if ($game['slug'] === 'all-games') {
            echo '<a href="' . esc_url(home_url('/shop/')) . '" class="nav-link">' . esc_html($game['name']) . '</a>';
            continue;
          }

          $category = get_term_by('slug', $game['slug'], 'product_cat');
          if ($category) {
            echo '<a href="' . esc_url(get_term_link($category)) . '" class="nav-link nav-game-link" data-game="' . esc_attr($game['slug']) . '">';
            echo esc_html($game['name']);
            echo '</a>';
          }
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Mega Menu for Game Categories -->
  <div class="mega-menu">
    <div class="mega-menu-content">
      <?php
      // Define game categories - same order as navigation
      $game_categories = array(
        array('name' => 'Magic: the Gathering', 'slug' => 'magic-the-gathering', 'icon' => '🔮'),
        array('name' => 'Yu-Gi-Oh!', 'slug' => 'yu-gi-oh', 'icon' => '🎴'),
        array('name' => 'Flesh and Blood', 'slug' => 'flesh-and-blood', 'icon' => '⚔️'),
        array('name' => 'Pokémon', 'slug' => 'pokemon-non-japanese', 'icon' => '⚪'),
        array('name' => 'Digimon', 'slug' => 'digimon', 'icon' => '🦖'),
        array('name' => 'Cardfight!! Vanguard', 'slug' => 'cardfight-vanguard', 'icon' => '🛡️'),
      );

      foreach ($game_categories as $game) {
        $game_category = get_term_by('slug', $game['slug'], 'product_cat');

        if (!$game_category) continue;

        echo '<div class="mega-menu-game" data-game="' . esc_attr($game['slug']) . '">';
        echo '<ul class="mega-menu-list">';

        // Get all expansions to count total
        $all_expansions = get_latest_expansions($game['slug'], 999);
        $total_count = 0;
        if (!empty($all_expansions)) {
          foreach ($all_expansions as $exp) {
            if (strpos($exp->slug, 'singles-') !== 0 && strpos($exp->slug, 'sealed-') !== 0) {
              $total_count++;
            }
          }
        }

        // Get latest 8 expansions sorted by release date
        $expansions = get_latest_expansions($game['slug'], 8);

        if (!empty($expansions)) {
          foreach ($expansions as $expansion) {
            // Skip Singles and Sealed subcategories
            if (strpos($expansion->slug, 'singles-') === 0 || strpos($expansion->slug, 'sealed-') === 0) {
              continue;
            }

            // Get Singles and Sealed child categories
            $child_cats = get_terms(array(
              'taxonomy' => 'product_cat',
              'parent' => $expansion->term_id,
              'hide_empty' => false,
            ));

            $singles_url = get_term_link($expansion);
            $sealed_url = get_term_link($expansion);

            // Find specific Singles and Sealed categories
            foreach ($child_cats as $child) {
              if (strpos($child->slug, 'singles-') === 0) {
                $singles_url = get_term_link($child);
              } elseif (strpos($child->slug, 'sealed-') === 0) {
                $sealed_url = get_term_link($child);
              }
            }

            echo '<li class="expansion-item">';
            echo '<span class="expansion-name">' . esc_html($expansion->name) . '</span>';
            echo '<span class="expansion-types">';
            echo '<a href="' . esc_url($singles_url) . '" class="type-link">S</a>';
            echo '<a href="' . esc_url($sealed_url) . '" class="type-link">B</a>';
            echo '</span>';
            echo '</li>';
          }
        }

        echo '</ul>';
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <!-- Mobile Menu Drawer -->
  <div class="mobile-menu-drawer" id="mobileMenuDrawer">
    <div class="mobile-menu-header">
      <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close mobile menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <div class="mobile-menu-content">
      <!-- Mobile Search -->
      <div class="mobile-search">
        <?php
        if ( function_exists( 'dgwt_wcas_get_search_form' ) ) {
          echo dgwt_wcas_get_search_form();
        } elseif ( shortcode_exists( 'fibosearch' ) ) {
          echo do_shortcode( '[fibosearch]' );
        } elseif ( shortcode_exists( 'wcas-search-form' ) ) {
          echo do_shortcode( '[wcas-search-form]' );
        }
        ?>
      </div>

      <!-- Mobile Games Dropdown -->
      <div class="mobile-games-section">
        <button class="mobile-games-toggle" id="mobileGamesToggle">
          <span>Games</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="dropdown-arrow">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mobile-games-list" id="mobileGamesList">
          <?php
          $game_categories = array(
            array('name' => 'Magic: the Gathering', 'slug' => 'magic-the-gathering'),
            array('name' => 'Yu-Gi-Oh!', 'slug' => 'yu-gi-oh'),
            array('name' => 'Flesh and Blood', 'slug' => 'flesh-and-blood'),
            array('name' => 'Pokémon', 'slug' => 'pokemon-non-japanese'),
            array('name' => 'Digimon', 'slug' => 'digimon'),
            array('name' => 'Cardfight!! Vanguard', 'slug' => 'cardfight-vanguard'),
            array('name' => 'All Games', 'slug' => 'all-games'),
          );

          foreach ($game_categories as $game) {
            if ($game['slug'] === 'all-games') {
              echo '<a href="' . esc_url(home_url('/shop/')) . '" class="mobile-game-link">' . esc_html($game['name']) . '</a>';
              continue;
            }

            $category = get_term_by('slug', $game['slug'], 'product_cat');
            if ($category) {
              echo '<a href="' . esc_url(get_term_link($category)) . '" class="mobile-game-link">';
              echo esc_html($game['name']);
              echo '</a>';
            }
          }
          ?>
        </div>
      </div>

      <!-- Mobile Account Link -->
      <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="mobile-menu-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
        <span>My Account</span>
      </a>
    </div>
  </div>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
</nav>

<div id="page" class="hfeed site">
  <?php do_action( 'storefront_before_header' ); ?>
  <?php do_action( 'storefront_after_header' ); ?>

  <?php
  /**
   * Functions hooked in to storefront_before_content
   *
   * @hooked storefront_header_widget_region - 10
   * @hooked woocommerce_breadcrumb - 10
   */
  do_action( 'storefront_before_content' );
  ?>

  <div id="content" class="site-content" tabindex="-1">
    <div class="col-full">

    <?php
    /**
     * Functions hooked in to storefront_content_top
     *
     * @hooked woocommerce_breadcrumb - 10
     */
    do_action( 'storefront_content_top' );
    ?>
