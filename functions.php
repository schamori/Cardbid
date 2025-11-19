<?php
/**
 * Cardbid Theme Functions
 */

// Register navigation menus
function cardbid_register_menus() {
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'cardbid'),
  ));
}
add_action('after_setup_theme', 'cardbid_register_menus');

// Add WooCommerce support
function cardbid_add_woocommerce_support() {
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'cardbid_add_woocommerce_support');

// Enqueue styles and scripts
function cardbid_enqueue_styles() {
  // Main stylesheet
  wp_enqueue_style('cardbid-style', get_stylesheet_uri(), array(), '1.0');

  // Custom cardbid style
  wp_enqueue_style('cardbid-custom', get_template_directory_uri() . '/cardbid-style.css', array(), '1.0');

  // Scripts
  wp_enqueue_script('cardbid-script', get_template_directory_uri() . '/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'cardbid_enqueue_styles');

// Update cart count via AJAX (for dynamic cart updates)
function cardbid_cart_count_fragments($fragments) {
  ob_start();
  ?>
  <span class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?> Items</span>
  <?php
  $fragments['.cart-items'] = ob_get_clean();

  ob_start();
  ?>
  <span class="cart-price"><?php echo WC()->cart->get_cart_total(); ?></span>
  <?php
  $fragments['.cart-price'] = ob_get_clean();

  return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'cardbid_cart_count_fragments');
