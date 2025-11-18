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
 * Optional: Remove Storefront default header/footer for Cardbid template
 * Uncomment if you want the custom template to be completely standalone
 */
/*
function storefront_child_remove_default_template_hooks() {
    if ( is_page_template( 'page-cardbid-home.php' ) ) {
        remove_all_actions( 'storefront_header' );
        remove_all_actions( 'storefront_footer' );
    }
}
add_action( 'wp', 'storefront_child_remove_default_template_hooks' );
*/
