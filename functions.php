<?php
/**
 * Storefront Child Theme - Cardbid Functions
 *
 * @package Storefront_Child_Cardbid
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent, child, and custom theme assets
 */
function storefront_child_cardbid_enqueue_assets() {
    // Enqueue parent theme (Storefront) stylesheet
    wp_enqueue_style(
        'storefront-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'storefront-child-style',
        get_stylesheet_uri(),
        array( 'storefront-parent-style' ),
        wp_get_theme()->get('Version')
    );

    // Enqueue Google Fonts - Inter
    wp_enqueue_style(
        'google-fonts-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Enqueue Cardbid custom styles (carousel, gradients, etc.)
    wp_enqueue_style(
        'cardbid-custom-style',
        get_stylesheet_directory_uri() . '/cardbid-style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Enqueue custom header styles
    wp_enqueue_style(
        'cc-header',
        get_stylesheet_directory_uri() . '/cc-header.css',
        array(),
        null
    );

    // Enqueue Cardbid custom JavaScript
    wp_enqueue_script(
        'cardbid-scripts',
        get_stylesheet_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get('Version'),
        true // Load in footer
    );

    // Enqueue custom header JavaScript
    wp_enqueue_script(
        'cc-header',
        get_stylesheet_directory_uri() . '/cc-header.js',
        array(),
        null,
        true
    );

    // Disable Storefront handheld nav to prevent conflicts
    wp_add_inline_style('cc-header', '.handheld-navigation{display:none!important}');
}
add_action( 'wp_enqueue_scripts', 'storefront_child_cardbid_enqueue_assets' );

/**
 * Remove Storefront default header elements globally
 * Our custom header.php replaces them
 */
function storefront_child_remove_default_header() {
    remove_action( 'storefront_header', 'storefront_header_container', 0 );
    remove_action( 'storefront_header', 'storefront_skip_links', 5 );
    remove_action( 'storefront_header', 'storefront_site_branding', 20 );
    remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
    remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
    remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
    remove_action( 'storefront_header', 'storefront_header_cart', 60 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
}
add_action( 'init', 'storefront_child_remove_default_header' );

/**
 * Hide WooCommerce breadcrumbs globally
 */
function cardbid_remove_woo_breadcrumbs() {
    remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}
add_action( 'init', 'cardbid_remove_woo_breadcrumbs' );

/**
 * Display custom metadata for WooCommerce product categories
 * This snippet adds set_price and release_date to category overview pages
 */

// Add custom metadata display to category description area
add_action( 'woocommerce_archive_description', 'display_pokemon_category_metadata', 15 );

function display_pokemon_category_metadata() {
    // Only run on product category pages
    if ( ! is_product_category() ) {
        return;
    }

    // Get the current category object
    $current_category = get_queried_object();

    if ( ! $current_category || ! isset( $current_category->term_id ) ) {
        return;
    }

    // Get the custom metadata
    $set_price = get_term_meta( $current_category->term_id, 'set_price', true );
    $release_date = get_term_meta( $current_category->term_id, 'release_date', true );

    // Only display if at least one field has data
    if ( empty( $set_price ) && empty( $release_date ) ) {
        return;
    }

    // Start building the output
    $output = '<div class="pokemon-category-meta" style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px; padding: 15px; margin: 15px 0;">';

    // Add a heading
    $output .= '<h4 style="margin-top: 0; color: #495057; font-size: 1.1em;">Set Information</h4>';

    // Display set price if available
    if ( ! empty( $set_price ) ) {
        $formatted_price = wc_price( $set_price ); // Format as WooCommerce price
        $output .= '<p style="margin: 8px 0;"><strong>Total Set Price:</strong> ' . $formatted_price . '</p>';
    }

    // Display release date if available
    if ( ! empty( $release_date ) ) {
        // Try to format the date nicely if it's in a standard format
        $formatted_date = $release_date;
        $timestamp = strtotime( $release_date );
        if ( $timestamp !== false ) {
            $formatted_date = date_i18n( get_option( 'date_format' ), $timestamp );
        }
        $output .= '<p style="margin: 8px 0;"><strong>Release Date:</strong> ' . esc_html( $formatted_date ) . '</p>';
    }

    $output .= '</div>';

    // Output the metadata
    echo $output;
}

// Optional: Add custom CSS for better styling (you can remove this if you prefer to style via your theme)
add_action( 'wp_head', 'pokemon_category_meta_styles' );

function pokemon_category_meta_styles() {
    if ( ! is_product_category() ) {
        return;
    }
    ?>
    <style>
    .pokemon-category-meta {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        color: white !important;
        border: none !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .pokemon-category-meta h4 {
        color: white !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 8px;
    }
    .pokemon-category-meta p {
        margin: 10px 0 !important;
    }
    .pokemon-category-meta .woocommerce-Price-amount {
        font-weight: bold;
        font-size: 1.1em;
    }
    </style>
    <?php
}

// Alternative hook if you want to display it in a different position
// Uncomment the line below and comment out the first add_action if you prefer it after the category title
// add_action( 'woocommerce_before_shop_loop', 'display_pokemon_category_metadata', 5 );

// Display metadata on category tiles/cards in category overview pages
add_action( 'woocommerce_shop_loop_subcategory_title', 'display_pokemon_category_tile_metadata', 15 );

function display_pokemon_category_tile_metadata( $category ) {
    // Get the custom metadata for this category
    $set_price = get_term_meta( $category->term_id, 'set_price', true );
    $release_date = get_term_meta( $category->term_id, 'release_date', true );

    // Only display if at least one field has data
    if ( empty( $set_price ) && empty( $release_date ) ) {
        return;
    }

    // Start building the output for the tile
    echo '<div class="pokemon-category-tile-meta" style="margin-top: 8px; font-size: 0.9em; color: #666;">';

    // Display set price if available
    if ( ! empty( $set_price ) ) {
        $formatted_price = wc_price( $set_price );
        echo '<div style="margin: 3px 0;"><strong>Set Price:</strong> ' . $formatted_price . '</div>';
    }

    // Display release date if available
    if ( ! empty( $release_date ) ) {
        // Try to format the date nicely if it's in a standard format
        $formatted_date = $release_date;
        $timestamp = strtotime( $release_date );
        if ( $timestamp !== false ) {
            $formatted_date = date_i18n( 'M j, Y', $timestamp ); // Shorter format for tiles
        }
        echo '<div style="margin: 3px 0;"><strong>Released:</strong> ' . esc_html( $formatted_date ) . '</div>';
    }

    echo '</div>';
}

/**
 * Helper function to get the newest sealed categories by release_date
 *
 * @param int $parent_category_id The parent category ID (e.g., Pokemon, One Piece, etc.)
 * @param int $limit Number of categories to return (default: 3)
 * @return array Array of category objects
 */
function get_newest_sealed_categories( $parent_category_id, $limit = 3 ) {
    // Get all subcategories of the parent category
    $args = array(
        'taxonomy'   => 'product_cat',
        'parent'     => $parent_category_id,
        'hide_empty' => false,
        'orderby'    => 'meta_value',
        'order'      => 'DESC',
        'meta_key'   => 'release_date',
    );

    $categories = get_terms( $args );

    if ( is_wp_error( $categories ) || empty( $categories ) ) {
        return array();
    }

    // Filter only sealed categories
    $sealed_categories = array();
    foreach ( $categories as $category ) {
        // Check if this is a sealed category (contains 'sealed' in slug)
        if ( strpos( $category->slug, 'sealed-' ) !== false ) {
            $release_date = get_term_meta( $category->term_id, 'release_date', true );
            if ( ! empty( $release_date ) ) {
                $category->release_date = $release_date;
                $sealed_categories[] = $category;
            }
        }
    }

    // Sort by release_date (newest first)
    usort( $sealed_categories, function( $a, $b ) {
        $date_a = strtotime( $a->release_date );
        $date_b = strtotime( $b->release_date );
        return $date_b - $date_a; // Descending order
    } );

    // Return only the requested number of categories
    return array_slice( $sealed_categories, 0, $limit );
}
