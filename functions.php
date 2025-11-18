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
 * Enqueue parent and child theme styles
 */
function storefront_child_cardbid_enqueue_styles() {
    // Enqueue parent theme (Storefront) stylesheet
    wp_enqueue_style(
        'storefront-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Enqueue child theme stylesheet (this will load AFTER parent)
    wp_enqueue_style(
        'storefront-child-style',
        get_stylesheet_uri(),
        array( 'storefront-parent-style' ), // Dependency: load after parent
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_cardbid_enqueue_styles' );

/**
 * Enqueue custom fonts
 */
function storefront_child_cardbid_enqueue_fonts() {
    // Google Fonts - Inter
    wp_enqueue_style(
        'google-fonts-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_cardbid_enqueue_fonts' );

/**
 * Enqueue custom JavaScript for Cardbid homepage
 */
function storefront_child_cardbid_enqueue_scripts() {
    // Only load on pages using the Cardbid Home Page template
    if ( is_page_template( 'page-cardbid-home.php' ) ) {
        wp_enqueue_script(
            'cardbid-scripts',
            get_stylesheet_directory_uri() . '/script.js',
            array(), // No dependencies
            wp_get_theme()->get('Version'),
            true // Load in footer
        );
    }
}
add_action( 'wp_enqueue_scripts', 'storefront_child_cardbid_enqueue_scripts' );

/**
 * Enqueue custom header assets (cc-header)
 */
function storefront_child_enqueue_header_assets() {
    wp_enqueue_style(
        'cc-header',
        get_stylesheet_directory_uri() . '/cc-header.css',
        array(),
        null
    );
    wp_enqueue_script(
        'cc-header',
        get_stylesheet_directory_uri() . '/cc-header.js',
        array(),
        null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_header_assets' );

/**
 * Disable Storefront handheld nav to prevent conflicts with custom header
 */
function storefront_child_disable_handheld_nav() {
    wp_add_inline_style('cc-header', '.handheld-navigation{display:none!important}');
}
add_action( 'wp_enqueue_scripts', 'storefront_child_disable_handheld_nav' );

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
