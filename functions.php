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
