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
        <svg viewBox="0 0 74 58" fill="none">
          <path d="M67.5096 34.0127C65.6908 30.992 62.7747 28.9468 59.5472 27.5559C59.2883 27.4444 58.0789 27.0224 58.0039 26.8476C57.9742 26.7728 57.9833 26.4599 57.9897 26.2428C58.1505 20.7784 58.3419 15.3308 58.5436 9.87046C58.5436 7.93362 58.7656 5.55918 57.379 4.18635C56.4841 3.44274 55.6166 3.09566 54.4746 3.11779C52.3343 3.15929 50.0657 3.45373 47.917 3.57564C42.1417 3.90319 33.173 4.22612 27.4011 4.58693C24.5716 4.74659 23.0673 5.50351 22.5964 8.41432C21.747 13.6574 21.5515 19.5451 21.2731 24.859C21.2386 25.5173 21.2076 26.2165 21.186 26.872C17.7607 27.5876 13.4653 25.5582 11.4377 22.5885C11.9296 20.2589 11.884 18.2214 9.18876 17.3145L10.7778 13.6163C10.7823 13.6059 10.7949 13.6011 10.8054 13.6054C12.345 14.2316 11.7786 14.2412 12.2425 14.8791C12.5473 15.2984 13.2176 15.7248 13.7433 15.7962C17.4731 16.3021 20.4186 10.8836 20.2473 7.75604C20.1434 5.85868 18.8797 4.66908 16.9143 4.85896C16.544 4.89468 16.0515 5.12302 16.0515 5.12302C15.2814 4.87429 10.5984 2.91721 9.49082 2.40961C9.39573 1.75291 9.19007 0.744506 7.76042 0.195691C3.44297 -1.28994 -0.125471 6.07503 1.27935 9.46004C1.67182 10.4052 2.67381 11.0721 3.71771 11.1169C4.1597 11.1358 4.61293 10.9082 4.97998 10.9682C5.32688 11.0248 6.22735 11.4925 6.6261 11.6596C6.80547 11.7422 6.77494 11.71 6.74952 11.7963L4.96523 15.792C2.60224 15.6533 1.18587 17.4583 0.65786 19.516C0.278975 20.9925 0.263639 22.2883 1.21494 23.5574C0.85446 24.5039 0.0930383 25.5909 0.0112436 26.6036C-0.263499 30.0115 4.47432 30.1014 4.88519 27.0207C5.32965 27.3222 6.16308 27.8302 7.22101 27.5675C7.49649 27.7942 8.99245 28.9746 9.56005 29.3455C13.0331 31.6151 16.8158 32.7733 20.9925 32.0769C20.8731 34.0512 20.605 40.1556 20.5741 42.139C20.521 45.5676 21.3934 47.1631 24.5999 47.4292C24.8719 47.4599 25.1875 47.4503 25.4233 47.4503C25.5248 47.4581 25.5829 47.4365 25.5829 47.5683C25.5449 47.8204 25.2223 48.4112 25.1211 48.7711C24.9668 49.3198 24.817 49.8926 24.8321 50.4643C23.2138 49.9412 21.7761 48.9844 19.9814 49.5173C18.016 50.101 17.5149 52.1573 18.8001 53.6744C20.0482 55.1476 25.7782 57.8464 27.6647 57.6114C29.6076 57.3694 29.252 55.3511 29.4224 54.0049C29.6978 51.8287 30.0656 49.5726 31.1999 47.6593L45.1877 48.0699C45.7187 49.7156 46.4159 51.5312 48.0584 52.3966C47.4589 52.8326 46.8412 53.0902 46.3247 53.6812C44.9487 55.2558 45.0651 57.6078 47.4966 57.9115C48.6683 58.0579 50.9567 57.9993 51.3363 57.9118C52.0273 57.7689 52.5874 57.6613 53.2108 57.3157C55.4424 56.0787 56.9427 51.3901 54.0506 50.1447C53.5409 49.9251 53.2015 49.985 52.735 49.8731C52.1158 49.7244 51.078 49.0627 50.8879 48.448C50.8744 48.3468 51.0009 48.3503 51.0082 48.3503H53.6029C56.0463 48.3503 57.4268 46.366 57.4268 44.4462L57.7053 32.5372C58.7501 32.9738 59.762 33.4928 60.6518 34.1946C61.0326 34.4948 62.4309 35.825 62.5397 36.2124C62.6032 36.438 61.7546 37.2816 61.5615 37.5649C61.2453 38.0287 60.9231 38.648 60.7804 39.1883C59.9209 42.4404 63.041 44.3135 65.2433 41.6406C66.4146 42.8589 68.0017 44.8301 69.9402 44.4104C70.8423 44.215 71.5787 43.4919 71.9185 42.6754C72.0185 42.4351 72.0488 41.9976 72.1782 41.827C72.2985 41.6682 72.757 41.5483 72.9637 41.4031C73.6442 41.0246 74 40.329 74 39.7082V39.3956C74 36.247 70.1983 34.6393 67.5096 34.0131V34.0127Z" fill="white"/>
          <path d="M53.2953 8.11335C52.9517 7.76122 52.3996 7.6111 51.6544 7.66548C48.3419 7.91031 29.0126 8.92493 28.8177 8.9352L28.7913 8.9365L28.7649 8.93607C28.5861 8.93737 26.9363 9.02082 26.7815 11.5005L26.7811 11.507C26.7653 11.727 25.2113 33.5792 25.2113 40.598L25.2106 40.632C25.2106 40.632 25.1972 41.3451 25.6779 41.8339C26.0226 42.1844 26.5663 42.3622 27.2937 42.3622C31.6129 42.3622 51.3875 42.9386 51.5884 42.9444C51.7759 42.9574 52.559 42.9236 52.8977 42.6112C53.1233 42.4031 53.233 42.0851 53.233 41.6389C53.233 38.4937 53.7843 10.2555 53.7898 9.97079L53.7949 9.89689C53.7958 9.88894 53.914 8.74764 53.2953 8.11335ZM29.7093 16.2062C29.3474 15.9878 29.2352 15.5161 29.4556 15.1577C29.5212 15.0511 30.1396 14.0993 31.6553 13.4894C32.3675 13.2029 33.8787 12.97 35.0084 13.3484C35.41 13.4831 35.6253 13.9143 35.4893 14.3119C35.3534 14.7094 34.9179 14.9221 34.5164 14.7879C33.8467 14.5635 32.7167 14.7026 32.2331 14.8974C31.1879 15.3179 30.7783 15.9308 30.7614 15.9567C30.6175 16.1906 30.3678 16.3182 30.1108 16.3182C29.974 16.3182 29.8352 16.282 29.7093 16.2062ZM33.6552 27.5712C32.0688 27.3887 30.7988 25.7939 30.3803 23.7058C30.517 23.7402 30.6593 23.7623 30.8068 23.7672C31.8472 23.8024 32.7176 23.0484 32.7509 22.0832C32.7841 21.118 31.9676 20.3072 30.9272 20.272C30.7687 20.2667 30.615 20.2816 30.4668 20.3108C31.0361 18.082 32.5742 16.5745 34.2849 16.7713C36.3417 17.0081 37.868 19.6175 37.6941 22.5998C37.5203 25.582 35.7119 27.8076 33.6552 27.5709V27.5712ZM42.7995 32.1963C42.638 32.2857 41.1828 33.0688 39.8625 33.0793C39.8088 33.0797 39.7496 33.0828 39.684 33.086C39.5685 33.0913 39.434 33.0978 39.2786 33.0978C38.6061 33.0978 37.5362 32.9788 35.86 32.1545C35.4804 31.9678 35.3255 31.5117 35.5141 31.1358C35.7027 30.7601 36.1632 30.6065 36.5428 30.7934C38.249 31.6324 39.1012 31.5915 39.6104 31.5679C39.6986 31.5637 39.7781 31.5601 39.8501 31.5595C40.6362 31.5532 41.7064 31.0587 42.0524 30.8686C42.4226 30.6654 42.89 30.797 43.0958 31.1634C43.3017 31.5298 43.1692 31.9918 42.7994 32.1961L42.7995 32.1963ZM49.3024 22.9434C49.1286 25.9256 47.3202 28.1513 45.2635 27.9145C43.7567 27.7411 42.5356 26.2937 42.0581 24.3597C42.2613 24.4482 42.4826 24.5064 42.7179 24.523C43.7827 24.5982 44.7052 23.8338 44.7785 22.8155C44.8519 21.7973 44.0482 20.9109 42.9834 20.8357C42.6273 20.8106 42.2883 20.881 41.9905 21.0219C42.4776 18.5932 44.0897 16.9074 45.8931 17.1151C47.9498 17.3518 49.4763 19.9611 49.3024 22.9434ZM50.158 17.2436C50.0714 17.2749 49.9826 17.2898 49.8955 17.2898C49.5849 17.2898 49.293 17.1016 49.1773 16.7978C49.1597 16.7543 48.8753 16.0825 47.9449 15.4743C47.5092 15.1895 46.4285 14.833 45.7278 14.9231C45.3076 14.9762 44.9225 14.6834 44.8681 14.2672C44.8136 13.8511 45.1102 13.4699 45.5308 13.4161C46.7131 13.2646 48.1491 13.7869 48.7906 14.2061C50.156 15.0987 50.5735 16.1524 50.6166 16.2697C50.7617 16.664 50.5565 17.1 50.1581 17.2436H50.158Z" fill="white"/>
        </svg>
      </div>
      <div class="logo-text">
        <span>Cardbid</span>
      </div>
    </div>
    </a>
  </div>

  <!-- Mobile Menu Toggle -->
  <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle mobile menu">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- Right side content wrapper -->
  <div class="nav-content-wrapper">
    <!-- Top Row: Search Bar, Account Icon, Cart -->
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

      <!-- Account Icon -->
      <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="nav-account-icon" title="My Account">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
      </a>

      <!-- Cart -->
      <div class="nav-cart-wrapper">
        <a href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>" class="nav-cart">
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

        // Add "Show all" link
        if ($total_count > 0) {
          echo '<a href="' . esc_url(get_term_link($game_category)) . '" class="show-all-link">';
          echo 'Show all (' . $total_count . ')';
          echo '</a>';
        }

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
