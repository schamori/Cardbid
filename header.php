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

  <!-- Mobile icons group -->
  <div class="nav-mobile-icons">
    <!-- Account Icon - spans both rows -->
    <div class="nav-account-wrapper">
      <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="nav-account-icon" title="My Account">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
      </a>
    </div>

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
        </a>
        <svg class="cart-icon-svg" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.21178 1.76158C6.3478 1.4046 6.55839 1.07661 6.83374 0.801273C7.34678 0.288227 8.04262 0 8.76818 0H12.6682C13.3937 0 14.0896 0.288227 14.6026 0.801273C14.8694 1.06809 15.0755 1.38434 15.2117 1.7285C16.1135 1.99696 16.9319 2.50111 17.5796 3.19386C18.3702 4.0396 18.8635 5.12021 18.9843 6.27164L19.2389 8.58665C20.558 8.68718 21.5621 9.90051 21.3877 11.2307L20.2987 19.4356C20.2952 19.4611 20.2917 19.4909 20.2878 19.5245C20.2641 19.7287 20.2243 20.0697 20.0961 20.3788C19.82 21.0444 19.2389 21.5613 18.55 21.7615C18.2225 21.8565 17.8893 21.8537 17.6854 21.8518L17.6164 21.8515H3.89317C3.86554 21.8515 3.83324 21.852 3.79698 21.8526C3.57442 21.8564 3.20334 21.8625 2.85523 21.7615C2.16625 21.5613 1.58515 21.0444 1.30905 20.3788C1.16211 20.0244 1.1184 19.6028 1.09206 19.3487C1.08645 19.2945 1.08163 19.248 1.07676 19.2114L0.0383467 11.3877C0.0142331 11.206 -0.0219679 10.931 0.0175614 10.6306C0.14669 9.6492 0.896788 8.83126 1.87503 8.62806C1.98035 8.60618 2.08808 8.59151 2.19764 8.58458L2.45242 6.26853L2.45263 6.26658C2.5806 5.12066 3.07747 4.04733 3.86837 3.20828C4.51151 2.526 5.32078 2.02866 6.21178 1.76158ZM6.45075 4.18959C6.12741 4.34578 5.83307 4.56045 5.5836 4.82511C5.14337 5.29214 4.86673 5.8895 4.79531 6.52731L4.56951 8.58002H16.8668L16.641 6.52629L16.6402 6.51961C16.5733 5.87767 16.2986 5.27513 15.8578 4.80367C15.6109 4.53966 15.3195 4.32484 14.9993 4.16761C14.8874 4.34966 14.7544 4.5184 14.6026 4.67017C14.3486 4.9242 14.047 5.12571 13.7151 5.26319C13.3832 5.40067 13.0274 5.47144 12.6682 5.47144H8.76818C8.04262 5.47144 7.34678 5.18321 6.83374 4.67017C6.68726 4.52369 6.5591 4.36231 6.45075 4.18959ZM6.57164 13.2657C6.57164 12.7233 6.13192 12.2836 5.5895 12.2836C5.04709 12.2836 4.60735 12.7233 4.60735 13.2657V17.1657C4.60735 17.7081 5.04709 18.1478 5.5895 18.1478C6.13192 18.1478 6.57164 17.7081 6.57164 17.1657V13.2657ZM10.7182 12.2836C11.2606 12.2836 11.7003 12.7233 11.7003 13.2657V17.1657C11.7003 17.7081 11.2606 18.1478 10.7182 18.1478C10.1757 18.1478 9.73602 17.7081 9.73602 17.1657V13.2657C9.73602 12.7233 10.1757 12.2836 10.7182 12.2836ZM16.8289 13.2657C16.8289 12.7233 16.3893 12.2836 15.8468 12.2836C15.3044 12.2836 14.8647 12.7233 14.8647 13.2657V17.1657C14.8647 17.7081 15.3044 18.1478 15.8468 18.1478C16.3893 18.1478 16.8289 17.7081 16.8289 17.1657V13.2657Z" fill="white"/>
        </svg>

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
  </div>

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
