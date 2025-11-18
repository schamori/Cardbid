<?php
/**
 * Show options for ordering with professional custom icon buttons
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$current_orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
?>

<div class="woocommerce-ordering woocommerce-ordering-professional">
    <div class="sorting-controls">
        <!-- Price Sorting Control -->
        <div class="sort-group price-group">
            <div class="sort-icon">
                <svg width="24" height="24" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M266.781,304.906c4.406,0,8.859-0.594,13.188-1.75l1.688-0.469v-18.063l-3.094,1.141
                        c-3.844,1.422-7.813,2.156-11.781,2.156c-11.688,0-22.313-5.891-28.563-15.609H272.5l2.625-12.844h-41.906
                        c-0.313-1.875-0.469-3.75-0.469-5.594c0-0.75,0.031-1.5,0.094-2.219h43.875l2.656-12.844h-43.047
                        c5.688-11.469,17.531-18.953,30.453-18.953c4.469,0,8.875,0.906,13.125,2.703l2.594,1.094l3.453-17.031l-1.844-0.688
                        c-5.578-2.031-11.391-3.078-17.328-3.078c-22.313,0-42.094,14.703-48.688,35.953h-9.688v12.844h7.406
                        c-0.031,0.719-0.047,1.5-0.047,2.219c0,1.781,0.109,3.625,0.344,5.594h-7.703v12.844h10.875
                        C226.875,291.875,245.766,304.906,266.781,304.906z" />
                    <path d="M0,116v280h512v-8V116H0z M496,380H16V132h480V380z" />
                    <path
                        d="M80.578,357.281h350.844c4.984-20.375,21.453-36.219,42.172-40.234V194.953
                        c-20.719-4.031-37.188-19.875-42.172-40.234H80.578c-4.984,20.359-21.453,36.203-42.172,40.234v122.094
                        C59.125,321.063,75.594,336.906,80.578,357.281z M400.344,235.984c11.031,0,20,8.953,20,20s-8.969,20-20,20
                        c-11.063,0-20-8.953-20-20S389.281,235.984,400.344,235.984z M256,171.656c46.594,0,84.344,37.766,84.344,84.328
                        c0,46.594-37.75,84.359-84.344,84.359c-46.563,0-84.344-37.766-84.344-84.359C171.656,209.422,209.438,171.656,256,171.656z
                         M111.656,235.984c11.063,0,20,8.953,20,20s-8.938,20-20,20c-11.031,0-20-8.953-20-20S100.625,235.984,111.656,235.984z"
                        fill="currentColor" />
                </svg>
            </div>
            <span class="sort-label">Price</span>
            <div class="sort-arrows">
                <form method="get" class="arrow-form">
                    <button type="submit"
                        class="arrow-btn arrow-up <?php echo ($current_orderby === 'price-desc') ? 'active' : ''; ?>"
                        title="<?php echo esc_attr__('Price: High to Low', 'woocommerce'); ?>">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 17H10M4 12H13M18 11V19M18 19L21 16M18 19L15 16M4 7H16" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <input type="hidden" name="orderby" value="price-desc" />
                    <input type="hidden" name="paged" value="1" />
                    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
                </form>

                <form method="get" class="arrow-form">
                    <button type="submit"
                        class="arrow-btn arrow-down <?php echo ($current_orderby === 'price') ? 'active' : ''; ?>"
                        title="<?php echo esc_attr__('Price: Low to High', 'woocommerce'); ?>">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 17H16M4 12H13M4 7H10M18 13V5M18 5L21 8M18 5L15 8" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <input type="hidden" name="orderby" value="price" />
                    <input type="hidden" name="paged" value="1" />
                    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
                </form>
            </div>
        </div>

        <!-- Numbers/Latest Sorting Control -->
        <div class="sort-group numbers-group">
            <div class="sort-icon">
                <svg width="24" height="24" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M32 2C15.432 2 2 15.432 2 32s13.432 30 30 30s30-13.432 30-30S48.568 2 32 2M18 16.723L22.619 15H26v14h-3.945V17.908H22l-3.33 1.271l-.67-2.456M23.207 49c-1.832 0-3.377-.459-4.207-.959l.676-2.375c.586.291 1.941.832 3.291.832c1.719 0 2.592-.789 2.592-1.811c0-1.334-1.395-1.939-2.855-1.939h-1.35v-2.271h1.287c1.109-.02 2.523-.414 2.523-1.561c0-.813-.695-1.416-2.09-1.416c-1.154 0-2.375.479-2.963.813l-.674-2.293c.85-.52 2.549-1.02 4.377-1.02c3.027 0 4.707 1.521 4.707 3.373c0 1.439-.85 2.564-2.594 3.148v.039c1.702.294 3.073 1.522 3.073 3.294C29 47.248 26.801 49 23.207 49M35.5 27.053l1.824-1.611c3.08-2.689 4.578-4.236 4.619-5.846c0-1.123-.693-2.014-2.32-2.014c-1.215 0-2.277.594-3.018 1.146l-.93-2.309c1.063-.785 2.711-1.42 4.619-1.42c3.189 0 4.947 1.82 4.947 4.32c0 2.309-1.715 4.152-3.754 5.932l-1.301 1.057v.043H45.5V29h-10v-1.947M46 45.662h-1.832V49h-3.393v-3.338H34v-2.133L39.789 35h4.379v8.205H46v2.457"
                        fill="currentColor" />
                    <path
                        d="M39.389 40.107l-2.047 3.057v.041h3.434v-3.098c0-.844.047-1.703.117-2.609h-.092c-.494.906-.895 1.725-1.412 2.609"
                        fill="currentColor" />
                </svg>
            </div>
            <span class="sort-label">Number</span>
            <div class="sort-arrows">
                <form method="get" class="arrow-form">
                    <button type="submit"
                        class="arrow-btn arrow-up <?php echo ($current_orderby === 'date') ? 'active' : ''; ?>"
                        title="<?php echo esc_attr__('Newest First', 'woocommerce'); ?>">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 17H10M4 12H13M18 11V19M18 19L21 16M18 19L15 16M4 7H16" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <input type="hidden" name="orderby" value="date" />
                    <input type="hidden" name="paged" value="1" />
                    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
                </form>

                <form method="get" class="arrow-form">
                    <button type="submit"
                        class="arrow-btn arrow-down <?php echo ($current_orderby === 'date-asc') ? 'active' : ''; ?>"
                        title="<?php echo esc_attr__('Oldest First', 'woocommerce'); ?>">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 17H16M4 12H13M4 7H10M18 13V5M18 5L21 8M18 5L15 8" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <input type="hidden" name="orderby" value="date-asc" />
                    <input type="hidden" name="paged" value="1" />
                    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .woocommerce-ordering-professional {
        background: #ffffff;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 16px 22px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        display: block;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }

    .sorting-controls {
        display: flex;
        gap: 32px;
        align-items: center;
    }

    .sort-group {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 8px 16px;
        border-radius: 6px;
        transition: all 0.2s ease;
        background: #f8f9fa;
        border: 1px solid transparent;
    }

    .sort-icon {
        color: #495057;
        display: flex;
        align-items: center;
        transition: color 0.2s ease;
    }

    .sort-group:hover .sort-icon {
        color: #007cba;
    }

    .sort-label {
        font-size: 17px;
        font-weight: 500;
        color: #495057;
        margin: 0;
        white-space: nowrap;
    }

    .sort-arrows {
        display: flex;
        gap: 3px;
        margin-left: 4px;
    }

    .arrow-form {
        margin: 0;
    }

    .arrow-btn {
        background: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.15s ease;
        color: #6c757d;
        padding: 0;
    }

    .arrow-btn:hover {
        background: #007cba;
        border-color: #007cba;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 124, 186, 0.2);
    }

    .arrow-btn.active {
        background: #007cba;
        border-color: #007cba;
        color: #ffffff;
        box-shadow: 0 0 0 2px rgba(0, 124, 186, 0.2);
    }

    .arrow-btn svg {
        transition: transform 0.15s ease;
    }

    .arrow-btn:hover svg {
        transform: scale(1.1);
    }

    /* Professional hover effects for Price */
    .price-group:hover .sort-icon {
        color: #28a745;
    }

    .price-group .arrow-btn:hover,
    .price-group .arrow-btn.active {
        background: #28a745;
        border-color: #28a745;
    }

    .price-group .arrow-btn:hover {
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    }

    .price-group .arrow-btn.active {
        box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
    }

    /* Professional hover effects for Numbers */
    .numbers-group:hover .sort-icon {
        color: #6f42c1;
    }

    .numbers-group .arrow-btn:hover,
    .numbers-group .arrow-btn.active {
        background: #6f42c1;
        border-color: #6f42c1;
    }

    .numbers-group .arrow-btn:hover {
        box-shadow: 0 2px 4px rgba(111, 66, 193, 0.2);
    }

    .numbers-group .arrow-btn.active {
        box-shadow: 0 0 0 2px rgba(111, 66, 193, 0.2);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .woocommerce-ordering-professional {
            padding: 15px 18px;
        }

        .sorting-controls {
            gap: 16px;
        }

        .sort-group {
            padding: 6px 12px;
            gap: 6px;
        }

        .sort-label {
            font-size: 18px;
        }

        .arrow-btn {
            width: 36px;
            height: 36px;
        }

        .sort-icon svg {
            width: 24px;
            height: 24px;
        }

        .arrow-btn svg {
            width: 18px;
            height: 18px;
        }
    }

    @media (max-width: 480px) {
        .sorting-controls {
            flex-direction: column;
            gap: 8px;
            align-items: stretch;
        }

        .sort-group {
            justify-content: space-between;
            padding: 8px 12px;
        }

        .sort-arrows {
            margin-left: 0;
        }
    }

    /* Focus states for accessibility */
    .arrow-btn:focus {
        outline: 2px solid #007cba;
        outline-offset: 2px;
    }

    /* Loading state */
    .arrow-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }
</style>