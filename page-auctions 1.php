<?php
/* Template Name: Auctions (FacetWP) */
defined('ABSPATH') || exit;

get_header('shop');

/* Open WooCommerce content wrappers (adds .woocommerce etc.) */
do_action('woocommerce_before_main_content');
echo '<aside id="secondary" class="widget-area" role="complementary">'; 
dynamic_sidebar('auctions-sidebar'); 
echo '</aside>';
?>

<?php
// --- (optional) toolbar above grid ---
echo '<div class="shop-toolbar" style="display:flex;justify-content:space-between;gap:.75rem;flex-wrap:wrap;margin:1rem 0;">';
if ( function_exists('woocommerce_result_count') ) {
    woocommerce_result_count();
}
echo do_shortcode('[facetwp facet="sorting"]'); // your FacetWP Sort facet (optional)
echo '</div>';
// --- end toolbar ---

$paged = max( 1, get_query_var('paged'), get_query_var('page') );

$q = new WP_Query([
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 24,
    'paged'          => $paged,
    'tax_query'      => [[
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => ['auction'], // Simple Auctions product type
    ]],
    'facetwp'        => true,      // tell FacetWP this is the listing
]);

if ( $q->have_posts() ) {
    woocommerce_product_loop_start();        // <ul class="products columns-X">
    while ( $q->have_posts() ) {
        $q->the_post();
        do_action('woocommerce_shop_loop');  // keeps badges etc.
        wc_get_template_part('content', 'product');
    }
    woocommerce_product_loop_end();          // </ul>

    echo do_shortcode('[facetwp pager="true"]'); // AJAX pager
    wp_reset_postdata();
} else {
    wc_no_products_found();
}


do_action('woocommerce_after_main_content');
do_action('storefront_sidebar');   // or: get_sidebar();


/* Close wrappers */

get_footer('shop');
