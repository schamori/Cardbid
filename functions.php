<?php

// Enqueue your header assets
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('cc-header', get_stylesheet_directory_uri() . '/cc-header.css', [], null);
  wp_enqueue_script('cc-header', get_stylesheet_directory_uri() . '/cc-header.js', [], null, true);
});

// Optional: disable Storefront handheld nav so it doesn't clash
add_action('wp_enqueue_scripts', function () {
  wp_add_inline_style('cc-header', '.handheld-navigation{display:none!important}');
});
