<?php
/**
 * IFRAME-FRIENDLY Dokan Sell Item Wizard (self-contained)
 * - Shows a 4-step form
 * - On POST: clones via Dokan SPMV and applies fields so it appears under “More offers”
 * - No redirects; shows a success screen and postMessage to parent window
 */
defined('ABSPATH') || exit;

// Vendors only
if ( ! is_user_logged_in() || ! function_exists('dokan_is_user_seller') || ! dokan_is_user_seller(get_current_user_id()) ) {
  echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif">Only vendors can access this wizard.</div>';
  return;
}

/** ---------- FINALIZE: handle form submit (same file) ---------- */
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sell_item_finish']) ) {

  // Nonce
  if ( empty($_POST['sell_item_wizard_nonce']) || ! wp_verify_nonce($_POST['sell_item_wizard_nonce'], 'sell_item_wizard') ) {
    echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif;color:#b00020">Invalid request (nonce).</div>';
    return;
  }

  $vendor_id   = get_current_user_id();
  $original_id = absint($_POST['original_id'] ?? 0);

  if ( ! $original_id ) {
    echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif;color:#b00020">Missing original product.</div>';
    return;
  }

  if ( ! class_exists('Dokan_SPMV_Product_Duplicator') ) {
    echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif;color:#b00020">Dokan SPMV module not available.</div>';
    return;
  }

  // 1) Clone using Dokan SPMV (writes dokan_product_map → shows in “More offers”)
  $new_id = Dokan_SPMV_Product_Duplicator::instance()->clone_product($original_id, $vendor_id);
  if ( is_wp_error($new_id) ) {
    echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif;color:#b00020">Clone failed: ' . esc_html($new_id->get_error_message()) . '</div>';
    return;
  }
  if ( ! $new_id ) {
    echo '<div style="padding:16px;font-family:system-ui,Arial,sans-serif;color:#b00020">Clone failed: no product ID returned.</div>';
    return;
  }

  // 2) Apply custom metadata
  update_post_meta($new_id, '_card_language', sanitize_text_field($_POST['lang'] ?? ''));
  update_post_meta($new_id, '_card_holofoil', !empty($_POST['holofoil']) ? 'yes' : 'no');
  update_post_meta($new_id, '_card_reverse_holo', !empty($_POST['reverse_holo']) ? 'yes' : 'no');
  update_post_meta($new_id, '_card_condition', sanitize_text_field($_POST['condition'] ?? ''));

  // 3) Mode
  $mode = sanitize_text_field($_POST['mode'] ?? 'instant');

  if ( $mode === 'instant' ) {
    wp_set_object_terms($new_id, 'simple', 'product_type', false);
    update_post_meta($new_id, '_manage_stock', 'yes');
    $qty = max(1, (int)($_POST['qty'] ?? 1));
    update_post_meta($new_id, '_stock', $qty);
    update_post_meta($new_id, '_stock_status', $qty > 0 ? 'instock' : 'outofstock');
    $price = wc_format_decimal($_POST['price'] ?? '0');
    update_post_meta($new_id, '_regular_price', $price);
    update_post_meta($new_id, '_price', $price);
  } else {
    // Auction (requires Woo Simple Auctions + Dokan Auction module)
    wp_set_object_terms($new_id, 'auction', 'product_type', false);
    update_post_meta($new_id, '_auction_start_price', wc_format_decimal($_POST['auction_start_price'] ?? '0'));
    update_post_meta($new_id, '_auction_bid_increment', wc_format_decimal($_POST['auction_bid_increment'] ?? '0'));
    $from = sanitize_text_field($_POST['auction_start'] ?? '');
    $to   = sanitize_text_field($_POST['auction_end'] ?? '');
    if ($from) update_post_meta($new_id, '_auction_dates_from', $from);
    if ($to)   update_post_meta($new_id, '_auction_dates_to', $to);
  }

  // 4) Shipping class (optional)
  if ( ! empty($_POST['shipping_class_id']) ) {
    wp_set_object_terms($new_id, (int) $_POST['shipping_class_id'], 'product_shipping_class', false);
  }

  // 5) Success screen (no redirect)
  $edit_url = function_exists('dokan_edit_product_url') ? dokan_edit_product_url($new_id) : get_edit_post_link($new_id, '');

  ?>
  <style>
    html,body{margin:0;padding:0;background:transparent;font-family:system-ui,Arial,sans-serif}
    .wiz-success{padding:20px 18px}
    .wiz-success h2{margin:0 0 10px;font-size:20px}
    .wiz-actions a,.wiz-actions button{display:inline-block;margin:8px 8px 0 0;padding:10px 14px;border-radius:8px;border:1px solid #ddd;background:#fff;cursor:pointer;text-decoration:none}
    .wiz-actions a:hover,.wiz-actions button:hover{background:#f7f7f7}
  </style>
  <div class="wiz-success">
    <h2>Offer created ✅</h2>
    <p>Product ID: <strong><?php echo (int)$new_id; ?></strong></p>
    <div class="wiz-actions">
      <?php if ($edit_url): ?>
        <a href="<?php echo esc_url($edit_url); ?>" target="_blank" rel="noopener">Open in editor</a>
      <?php endif; ?>
      <button type="button" onclick="try{parent.postMessage({type:'sellWizardDone',productId:<?php echo (int)$new_id; ?>,editUrl:'<?php echo esc_js($edit_url ?: ''); ?>'},'*');}catch(e){}; window.close && window.close();">Close</button>
    </div>
  </div>
  <script>
    // Also auto-notify parent overlay (in case user doesn't click Close)
    try{ parent.postMessage({type:'sellWizardDone',productId:<?php echo (int)$new_id; ?>,editUrl:'<?php echo esc_js($edit_url ?: ''); ?>'}, '*'); }catch(e){}
  </script>
  <?php
  return;
}

/** ---------- SHOW FORM (GET) ---------- */
$original_id = isset($_GET['product_id']) ? absint($_GET['product_id']) : 0;
?>
<style>
  /* Hide any Dokan dashboard chrome if present; keep iframe clean */
  .dokan-dashboard-header, .dokan-dashboard-menu, .dokan-dashboard-sidebar { display:none !important; }
  .dokan-dashboard-wrap { margin:0 !important; padding:0 !important; }
  html,body{margin:0;padding:0;background:transparent;font-family:system-ui,Arial,sans-serif}
  .wiz-wrap{padding:18px}
  .wiz-title{margin:0 0 12px;font-size:20px}
  .wizard-step{margin:12px 0;padding:12px 0;border-top:1px solid #eee}
  .wizard-step h3{margin:0 0 8px;font-size:16px}
  .wizard-step label{display:block;margin:6px 0}
  .wizard-nav{margin-top:10px}
  .wizard-nav button{margin-right:8px;padding:10px 14px;border-radius:8px;border:1px solid #ddd;background:#fff;cursor:pointer}
  .wizard-nav button:hover{background:#f7f7f7}
</style>

<!-- harmless placeholders if some dashboard JS expects them -->
<div id="dokan-analytics-app" style="display:none"></div>
<div id="hero" style="display:none"></div>
<div id="hero-title" style="display:none"></div>

<div class="wiz-wrap">
  <h2 class="wiz-title">Sell this item</h2>

  <form method="post" enctype="multipart/form-data" id="sell-item-form">
    <?php wp_nonce_field('sell_item_wizard', 'sell_item_wizard_nonce'); ?>
    <input type="hidden" name="original_id" value="<?php echo esc_attr($original_id); ?>" />

    <!-- Step 1 -->
    <div class="wizard-step" data-step="1">
      <h3>Card details</h3>
      <label>Language
        <select name="lang" required>
          <option value="en">English 🇬🇧</option>
          <option value="de">Deutsch 🇩🇪</option>
        </select>
      </label>
      <label><input type="checkbox" name="holofoil" value="1"> Holofoil</label>
      <label><input type="checkbox" name="reverse_holo" value="1"> Reverse Holo</label>
      <label>Condition
        <select name="condition" required>
          <option>mint</option><option>near_mint</option><option>excellent</option>
          <option>good</option><option>played</option><option>poor</option>
        </select>
      </label>
      <div class="wizard-nav">
        <button type="button" class="next">Next</button>
      </div>
    </div>

    <!-- Step 2 -->
    <div class="wizard-step" data-step="2" style="display:none">
      <h3>Sale type</h3>
      <label><input type="radio" name="mode" value="instant" required> Instant sell</label>
      <label><input type="radio" name="mode" value="auction" required> Auction</label>
      <div class="auction-fields" style="display:none;">
        <label>Start price <input type="number" step="0.01" name="auction_start_price"></label>
        <label>Bid increment <input type="number" step="0.01" name="auction_bid_increment"></label>
        <label>Start <input type="datetime-local" name="auction_start"></label>
        <label>End <input type="datetime-local" name="auction_end"></label>
      </div>
      <div class="wizard-nav">
        <button type="button" class="prev">Back</button>
        <button type="button" class="next">Next</button>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="wizard-step" data-step="3" style="display:none">
      <h3>Quantity & price (for instant)</h3>
      <div class="instant-fields">
        <label>Price <input type="number" step="0.01" name="price"></label>
        <label>Quantity <input type="number" min="1" name="qty"></label>
      </div>
      <div class="wizard-nav">
        <button type="button" class="prev">Back</button>
        <button type="button" class="next">Next</button>
      </div>
    </div>

    <!-- Step 4 -->
    <div class="wizard-step" data-step="4" style="display:none">
      <h3>Delivery</h3>
      <p>We use your Dokan Shipping settings. You can adjust them in your vendor dashboard.</p>
      <?php
      $classes = get_terms(['taxonomy' => 'product_shipping_class','hide_empty' => false]);
      if (!is_wp_error($classes) && $classes) {
        echo '<label>Shipping class <select name="shipping_class_id"><option value="">—</option>';
        foreach ($classes as $c) echo '<option value="'.esc_attr($c->term_id).'">'.esc_html($c->name).'</option>';
        echo '</select></label>';
      }
      ?>
      <div class="wizard-nav">
        <button type="button" class="prev">Back</button>
        <button type="submit" name="sell_item_finish" value="1">Create offer</button>
      </div>
    </div>
  </form>
</div>

<script>
(function(){
  function show(step){
    document.querySelectorAll('.wizard-step').forEach(function(s){ s.style.display='none'; });
    var el = document.querySelector('.wizard-step[data-step="'+step+'"]');
    if (el) el.style.display='block';
  }
  var step=1; show(step);

  document.querySelectorAll('.next').forEach(function(b){
    b.addEventListener('click', function(){ step++; show(step); });
  });
  document.querySelectorAll('.prev').forEach(function(b){
    b.addEventListener('click', function(){ step--; show(step); });
  });
  document.querySelectorAll('input[name=mode]').forEach(function(r){
    r.addEventListener('change', function(){
      var a = document.querySelector('.auction-fields');
      if (a) a.style.display = (this.value==='auction') ? 'block' : 'none';
    });
  });
})();
</script>
