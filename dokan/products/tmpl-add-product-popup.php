<?php
// File: wp-content/themes/storefront-child/dokan/products/tmpl-add-product-popup.php
?>
<script type="text/html" id="tmpl-dokan-add-new-product">
    <div id="dokan-add-new-product-popup" class="white-popup dokan-add-new-product-popup">
        <div class="gs-wrap">
            <div class="gs-card">
                <div class="gs-icon" aria-hidden="true">🛒</div>
                <h2 class="gs-title"><?php esc_html_e( 'Sell an item', 'dokan-lite' ); ?></h2>
                <p class="gs-subtitle">
                    <?php esc_html_e( 'To sell an item, search it here. On the product page, click “Sell this Item”.', 'dokan-lite' ); ?>
                </p>

                <div class="gs-search">
                    <?php if ( shortcode_exists( 'fibosearch' ) ) : ?>
                        <?php echo do_shortcode( '[fibosearch placeholder="Search by name, set, or SKU…"]' ); ?>
                    <?php elseif ( shortcode_exists( 'wcas-search-form' ) ) : /* older alias */ ?>
                        <?php echo do_shortcode( '[wcas-search-form placeholder="Search by name, set, or SKU…"]' ); ?>
                    <?php else : ?>
                        <p class="gs-error">
                            <?php esc_html_e( 'FiboSearch is not active. Please activate it to use the search here.', 'dokan-lite' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <p class="gs-help">
                    <?php esc_html_e( 'Tip: Find the exact product, then use “Sell this Item” on that page to list your offer.', 'dokan-lite' ); ?>
                </p>
            </div>
        </div>
    </div>

    <style>
        /* Scoped, clean styling for the popup */
        #dokan-add-new-product-popup .gs-wrap {
            padding: 24px;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 60%);
        }
        #dokan-add-new-product-popup .gs-card {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            padding: 28px 24px;
            text-align: center;
        }
        #dokan-add-new-product-popup .gs-icon { font-size: 34px; margin-bottom: 8px; }
        #dokan-add-new-product-popup .gs-title {
            margin: 0 0 8px; font-size: 22px; font-weight: 700; color: #0f172a;
        }
        #dokan-add-new-product-popup .gs-subtitle {
            margin: 0 auto 18px; max-width: 580px; color: #475569; font-size: 15px;
        }
        #dokan-add-new-product-popup .gs-help {
            margin-top: 10px; color: #64748b; font-size: 13px;
        }
        #dokan-add-new-product-popup .gs-error {
            margin: 12px 0 0; color: #b91c1c; font-weight: 600;
        }

        /* Make the FiboSearch field look great inside the popup */
        #dokan-add-new-product-popup .gs-search {
            max-width: 640px;
            margin: 0 auto;
        }
        /* FiboSearch wraps: support current and older class names */
        #dokan-add-new-product-popup .dgwt-wcas-search-wrapp,
        #dokan-add-new-product-popup .dgwt-wcas-sf-wrapp {
            width: 100%;
        }
        /* Input height & font-size */
        #dokan-add-new-product-popup .dgwt-wcas-search-input {
            height: 48px;
            font-size: 16px;
        }
        /* Dropdown should sit flush in our modal */
        .select2-container--open .select2-dropdown--below,
        .select2-container--open .select2-dropdown--above { margin-top: 0; }
    </style>
</script>

<?php do_action( 'dokan_add_product_js_template_end' ); ?>
