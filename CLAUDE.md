# CLAUDE.md - AI Assistant Guide for Cardbid

This document provides AI assistants with comprehensive guidance on the Cardbid codebase structure, development workflows, and key conventions.

## Project Overview

**Cardbid** is a WordPress-based online marketplace for trading card games (TCG), specializing in Pokémon cards. The platform supports buying, selling, and auctioning rare collectible cards with features like AI-based grading estimation.

### Core Technologies
- **WordPress** 5.0+ (CMS foundation)
- **Storefront Theme** (parent theme)
- **WooCommerce** (e-commerce functionality)
- **Dokan** (multi-vendor marketplace plugin)
- **FiboSearch** (enhanced search functionality)
- **PHP** 7.4+ (backend)
- **React/TypeScript** (src/ components - development only)
- **Custom CSS** (styling with glassmorphism and gradient designs)
- **JavaScript** (vanilla JS for interactions)

### Business Model
- Multi-vendor marketplace where users can buy/sell TCG cards
- Auction features for rare cards
- AI-powered card grading estimates
- Product categories with custom metadata (set prices, release dates)

---

## Repository Structure

```
/home/user/Cardbid/
├── CLAUDE.md                    ← This file
├── README.md                    ← Basic project info
├── CHILD-THEME-SETUP.md        ← WordPress theme installation guide
├── WORDPRESS-DEPLOYMENT.md     ← Deployment instructions
├── style.css                   ← Main WordPress theme stylesheet (CRITICAL)
├── functions.php               ← WordPress theme functions and hooks
├── header.php                  ← Custom site header (replaces Storefront)
├── footer.php                  ← Custom site footer
├── page-cardbid-home.php       ← Custom homepage template
├── cardbid-style.css           ← Homepage-specific styles
├── script.js                   ← JavaScript for carousels and interactions
├── cc-header.css               ← Custom header styles
├── cc-header.js                ← Custom header JavaScript
├── index.html                  ← Static HTML prototype (reference only)
│
├── fonts/                      ← Custom fonts (Genaminto)
│   ├── Genaminto-Regular.woff2
│   └── Genaminto-Bold.woff2
│
├── src/                        ← React development components (NOT used in production)
│   ├── App.tsx
│   ├── components/
│   │   ├── Navigation.tsx
│   │   ├── Hero.tsx
│   │   ├── Features.tsx
│   │   ├── Gallery.tsx
│   │   ├── Top4.tsx
│   │   ├── PreFooter.tsx
│   │   └── Footer.tsx
│   └── utils/
│
├── woocommerce/                ← WooCommerce template overrides
│   ├── archive-product.php     ← Product catalog page (custom sorting)
│   └── loop/
│       └── orderby.php         ← Custom sorting dropdown
│
└── dokan/                      ← Dokan multi-vendor template overrides
    ├── sell-item-wizard.php    ← Custom vendor product upload wizard
    └── products/
        ├── new-product.php
        └── tmpl-add-product-popup.php
```

### Critical Files Reference

| File | Purpose | When to Modify |
|------|---------|----------------|
| `style.css` | WordPress theme definition + global styles | Styling changes, theme metadata |
| `functions.php` | WordPress hooks, asset loading, customizations | Adding features, enqueuing assets |
| `header.php` | Site navigation and header HTML | Navigation changes |
| `footer.php` | Site footer HTML | Footer content/links |
| `page-cardbid-home.php` | Custom homepage template | Homepage layout changes |
| `woocommerce/archive-product.php` | Product catalog customization | Shop page behavior |

---

## Development Workflows

### WordPress Child Theme Architecture

This is a **child theme** of Storefront. Key principles:

1. **Never modify Storefront directly** - all customizations go in child theme files
2. **`style.css` header is sacred** - maintains the parent-child relationship:
   ```css
   /*
   Theme Name: Storefront Child - Cardbid
   Template: storefront
   */
   ```
3. **Template hierarchy** - WordPress looks for templates in this order:
   - Child theme files (this repo)
   - Parent theme (Storefront)
   - WordPress defaults

### Asset Loading Pattern

**CRITICAL**: Use WordPress enqueuing (never hardcode `<link>` or `<script>` tags in templates except in standalone pages)

```php
// In functions.php
wp_enqueue_style('handle-name', get_stylesheet_directory_uri() . '/file.css');
wp_enqueue_script('handle-name', get_stylesheet_directory_uri() . '/file.js');
```

### Custom Template Pattern

Custom page templates use this header format:
```php
<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/
```

**Usage**:
1. Create PHP file in theme root
2. Add template header comment
3. User selects template in Page Attributes when creating WordPress page

---

## Key Conventions and Patterns

### 1. WooCommerce Category Metadata

Categories have custom fields:
- `set_price` - Total value of the card set
- `release_date` - When the set was released

**Accessing metadata:**
```php
$set_price = get_term_meta($category->term_id, 'set_price', true);
$release_date = get_term_meta($category->term_id, 'release_date', true);
```

**Display locations:**
- Category archive pages (`functions.php:113` - `display_pokemon_category_metadata`)
- Category tiles (`functions.php:211` - `display_pokemon_category_tile_metadata`)

### 2. Custom Styling Approach

The theme uses **glassmorphism** design with:
- Gradient backgrounds (`linear-gradient`)
- Transparent windowed containers
- Box shadows and blur effects
- Rounded corners (`border-radius: 48px`)

**Example pattern:**
```css
.window {
  background: linear-gradient(to bottom, #A2A3A7 0%, #ffffff 30%);
  border-radius: 48px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
}
```

### 3. Navigation System

**Custom header replaces Storefront navigation entirely:**
- `header.php` - Custom HTML structure
- `cc-header.css` - Styling
- `cc-header.js` - Interactive behavior (mega menu, cart dropdown)

**Key features:**
- Sticky navigation
- Mega menu with game categories
- WooCommerce cart integration with dropdown preview
- FiboSearch integration
- Account links

**DO NOT** use Storefront navigation hooks/functions - they're removed in `functions.php:82-94`

### 4. WooCommerce Integration

**Product catalog customization:**
- Categories sorted by release date (newest first) for "Pokemon Non-Japanese" parent
- Custom archive template in `woocommerce/archive-product.php`
- Windowed container styling for shop pages

**Category metadata display:**
- Automatically displays set price and release date on category pages
- Purple gradient styling for metadata boxes
- Functions check `if (!function_exists())` to avoid conflicts with Code Snippets plugin

### 5. Git Workflow

**Branch naming convention:**
```
claude/feature-description-{session-id}
```

**Commit message style** (inferred from git log):
```
feat: Add modern cart dropdown with glassmorphism design
fix: Cart dropdown now properly hidden by default
refactor: Simplify mega menu to clean list of last 8 expansions
```

**Prefixes:**
- `feat:` - New features
- `fix:` - Bug fixes
- `refactor:` - Code restructuring without behavior change

**ALWAYS:**
- Develop on designated Claude branch
- Use descriptive commit messages
- Push with `-u origin <branch-name>`

### 6. Function Declarations

**Pattern for theme functions:**
```php
if (!function_exists('function_name')) {
    function function_name() {
        // Implementation
    }
}
```

**Why:** Prevents conflicts with WordPress Code Snippets plugin or other sources that may define the same function.

---

## Common Development Tasks

### Adding a New Page Template

1. Create `page-template-name.php` in theme root
2. Add WordPress template header:
   ```php
   <?php
   /*
   Template Name: Template Display Name
   Description: Brief description
   */
   ```
3. Use `get_header()` and `get_footer()` OR create standalone HTML
4. Enqueue specific styles if needed:
   ```php
   wp_enqueue_style('template-css', get_stylesheet_directory_uri() . '/template.css');
   ```

### Modifying WooCommerce Templates

1. Copy template from `wp-content/plugins/woocommerce/templates/` to `woocommerce/` in theme
2. Modify the copied file (never modify plugin files directly)
3. WordPress automatically uses theme version
4. Check template version compatibility in file header

### Adding Custom CSS

**For global styles:**
- Edit `style.css` - applies to all pages

**For specific pages:**
- Create separate CSS file (e.g., `feature.css`)
- Enqueue conditionally in `functions.php`:
  ```php
  if (is_page('page-slug')) {
      wp_enqueue_style('feature-css', get_stylesheet_directory_uri() . '/feature.css');
  }
  ```

### Working with Product Categories

**Get latest expansions by parent category:**
```php
$expansions = get_latest_expansions('pokemon-non-japanese', 10);
```
(Defined in `functions.php:252`)

**Display category with metadata:**
- Set price and release date automatically display if values exist
- Styling is automatically applied via inline styles in `functions.php:172`

### Customizing Navigation

**Header modifications:**
- Edit `header.php` for HTML structure
- Edit `cc-header.css` for styling
- Edit `cc-header.js` for JavaScript behavior

**Cart functionality:**
- Cart count updated via `WC()->cart->get_cart_contents_count()`
- Cart total via `WC()->cart->get_cart_total()`
- Cart dropdown shows product thumbnails and details

---

## Important Constraints and Guardrails

### ❌ DO NOT

1. **Modify parent theme files** - all changes must be in child theme
2. **Hardcode URLs** - always use `home_url()`, `get_stylesheet_directory_uri()`, etc.
3. **Edit plugin files directly** - use template overrides or hooks
4. **Use Storefront navigation functions** - we use custom header
5. **Add inline styles in templates** - use CSS files and enqueue them
6. **Create files without WordPress compatibility checks** - use `defined('ABSPATH') || exit;`
7. **Use deprecated WordPress functions** - check WordPress Codex for current standards
8. **Remove function_exists checks** - needed for Code Snippets compatibility

### ✅ DO

1. **Use WordPress functions** for paths, URLs, and data retrieval
2. **Follow WordPress coding standards** - proper indentation, naming conventions
3. **Enqueue assets properly** via `wp_enqueue_style()` and `wp_enqueue_script()`
4. **Check for plugin existence** before using plugin functions:
   ```php
   if (function_exists('wc_get_products')) {
       // Use WooCommerce function
   }
   ```
5. **Use hooks and filters** instead of modifying core functionality
6. **Test on actual WordPress install** - this is a live theme, not standalone
7. **Escape output** - use `esc_url()`, `esc_html()`, `esc_attr()` for security
8. **Maintain child theme relationship** - never break the `Template: storefront` reference

---

## React/TypeScript Components (src/)

**IMPORTANT**: The `src/` directory contains **development-only** React components used during initial prototyping.

**Current status**: NOT used in production WordPress theme

**Purpose**: Reference for component logic and styling that was converted to PHP templates

**Relationship to PHP templates:**
- `src/components/Navigation.tsx` → `header.php` + `cc-header.css/js`
- `src/components/Hero.tsx` → Part of `page-cardbid-home.php`
- `src/components/Gallery.tsx` → Product carousel in homepage template
- `src/components/Features.tsx` → Features section in homepage template

**DO NOT** try to integrate React into WordPress templates. The React code is for reference only.

---

## WooCommerce-Specific Notes

### Product Categories

- Organized hierarchically (e.g., Pokemon Non-Japanese → Scarlet & Violet → Surging Sparks)
- Parent categories: Pokemon Non-Japanese, Pokemon Japanese, etc.
- Subcategories: Individual sets/expansions

### Category Sorting

Default sorting for "Pokemon Non-Japanese" subcategories:
- **By**: Release date (custom meta field)
- **Order**: Descending (newest first)
- **Logic**: `woocommerce/archive-product.php:19-34`

### Custom Metadata Display

Metadata boxes use inline CSS (not ideal but working):
- Background: Purple gradient
- Displays: Set price (formatted with `wc_price()`) and release date
- Appears: On category archive pages and category tiles

**Future improvement**: Move inline styles to CSS file

---

## Dokan Multi-Vendor Customizations

**Purpose**: Allow users to sell their own cards on the platform

**Custom templates:**
- `dokan/sell-item-wizard.php` - Custom product upload flow
- `dokan/products/tmpl-add-product-popup.php` - Add product modal

**Note**: Dokan customization is minimal currently. Most vendor functionality uses default Dokan templates.

---

## Testing and Debugging

### WordPress Debug Mode

Enable in `wp-config.php` (on live site):
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

### Common Issues

**Styles not loading:**
- Check `functions.php` enqueue statements
- Verify file paths with `get_stylesheet_directory_uri()`
- Clear WordPress cache plugins
- Hard refresh browser (Ctrl+Shift+R)

**Template not appearing:**
- Verify template header comment format
- Check file is in theme root (not subdirectory)
- Try deactivating/reactivating theme

**WooCommerce not working:**
- Ensure WooCommerce and Storefront are active
- Check for plugin conflicts
- Verify WooCommerce template version compatibility

**Navigation issues:**
- Check `header.php` for PHP errors
- Verify FiboSearch plugin is active
- Test WooCommerce cart/account page links

---

## Deployment Process

### Via WP Pusher (Recommended)

1. **Commit changes locally:**
   ```bash
   git add .
   git commit -m "feat: Description of changes"
   ```

2. **Push to designated branch:**
   ```bash
   git push -u origin claude/branch-name-{session-id}
   ```

3. **WP Pusher auto-deploys** theme files to live WordPress site

4. **Changes appear immediately** (may need to clear cache)

### Manual Deployment

1. **Upload via FTP** to `/wp-content/themes/storefront-child-cardbid/`
2. **OR zip and upload** via WordPress admin (Appearance → Themes → Add New → Upload)

### What Gets Deployed

**Included:**
- All PHP files
- CSS files
- JavaScript files
- Fonts directory
- Images (if added)

**Excluded:**
- `src/` directory (React components - not needed)
- `.git/` directory
- Node modules (if present)
- Documentation files (though harmless if included)

---

## Performance Considerations

### Image Loading

- Homepage uses hardcoded image URLs (currently pointing to cardbid.eu)
- **Best practice**: Upload to WordPress Media Library and use `wp_get_attachment_url()`
- Consider lazy loading for carousels

### Script Loading

- All scripts loaded in footer (`true` parameter in `wp_enqueue_script`)
- Conditional loading for page-specific scripts (not currently implemented)

### Database Queries

- Product queries limited (e.g., 20 products for homepage carousel)
- Category queries use meta_key sorting (indexed for performance)
- **Avoid** N+1 queries - batch fetch related data

### Caching

- Compatible with WordPress caching plugins
- Static assets (CSS/JS) versioned with `wp_get_theme()->get('Version')`

---

## Security Best Practices

### Input Sanitization

Always sanitize user input:
```php
$user_input = sanitize_text_field($_POST['field']);
$url = esc_url($_POST['url']);
```

### Output Escaping

Always escape output:
```php
echo esc_html($title);
echo esc_url($link);
echo esc_attr($attribute);
```

### Nonce Verification

For forms and AJAX:
```php
wp_nonce_field('action_name', 'nonce_field_name');
if (!wp_verify_nonce($_POST['nonce_field_name'], 'action_name')) {
    die('Security check failed');
}
```

### Current Security Measures

- `defined('ABSPATH') || exit;` in PHP files
- WooCommerce handles payment security
- WordPress handles user authentication
- **Note**: Custom forms should add nonce verification

---

## Useful WordPress Functions Reference

### Path and URL Functions

```php
get_stylesheet_directory_uri()    // Child theme URL (for assets)
get_template_directory_uri()      // Parent theme URL
home_url('/')                      // Site home URL
admin_url('admin.php?page=x')     // Admin URL
```

### WooCommerce Functions

```php
wc_get_products(array $args)           // Get products
wc_get_page_permalink('shop')          // Get WooCommerce page URL
WC()->cart->get_cart_contents_count()  // Cart item count
WC()->cart->get_cart_total()           // Cart total
wc_price($amount)                      // Format price with currency
```

### Theme Functions

```php
get_header()           // Load header.php
get_footer()           // Load footer.php
get_template_part()    // Load template part
wp_head()              // Required in <head>
wp_footer()            // Required before </body>
body_class()           // Add body classes
```

### Custom Taxonomy/Term Functions

```php
get_term_meta($term_id, 'meta_key', true)  // Get term metadata
get_terms(array $args)                      // Get taxonomy terms
get_term_by('slug', $slug, 'taxonomy')     // Get term by slug
```

---

## AI Assistant Specific Guidelines

### When Making Changes

1. **Read before writing** - Always read files before modifying
2. **Understand context** - Check how existing code works before adding features
3. **Test WordPress compatibility** - Remember this is WordPress, not standalone PHP
4. **Follow established patterns** - Match existing code style and structure
5. **Preserve parent theme relationship** - Never break Storefront connection

### Asking for Clarification

Ask the user if unclear about:
- Which page/template should be modified
- Whether change is global or page-specific
- Styling preferences (colors, layout, animations)
- Plugin availability (WooCommerce features, Dokan features)

### Code Organization Preferences

1. **Functions.php** - Keep functions grouped by purpose (comments help)
2. **CSS** - Global in `style.css`, page-specific in separate files
3. **JavaScript** - Minimal inline, prefer external files
4. **Templates** - Clean HTML, PHP only for dynamic content

### Git Commit Guidance

- **Feat**: New features, new templates, new functionality
- **Fix**: Bug fixes, styling corrections, broken links
- **Refactor**: Code reorganization without behavior change
- **Docs**: Documentation updates (like this file)

**Commit message format:**
```
<type>: <short description>

<optional longer description>
<optional list of changes>
```

### Common Modification Patterns

**Adding a feature:**
1. Determine scope (global vs page-specific)
2. Create/modify appropriate template
3. Add styles to CSS file
4. Add JavaScript if needed
5. Enqueue assets in functions.php
6. Test on actual WordPress page

**Fixing a bug:**
1. Identify the file causing the issue
2. Read surrounding code for context
3. Make minimal change to fix issue
4. Verify fix doesn't break other features
5. Commit with descriptive message

**Styling changes:**
1. Locate existing styles in `style.css` or specific CSS file
2. Modify or add new rules
3. Use existing design patterns (gradients, glassmorphism)
4. Test responsive behavior
5. Ensure no conflicts with WooCommerce styles

---

## Quick Reference: File Purposes

| File | Primary Purpose | Modify For |
|------|-----------------|------------|
| `style.css` | WordPress theme definition, global styles | Theme metadata, site-wide styling |
| `functions.php` | WordPress hooks, asset loading, custom functions | New features, enqueuing, WooCommerce mods |
| `header.php` | Site header and navigation | Navigation changes, header content |
| `footer.php` | Site footer | Footer links, footer content |
| `page-cardbid-home.php` | Custom homepage template | Homepage layout and content |
| `cardbid-style.css` | Homepage-specific styles | Homepage styling |
| `script.js` | Carousel and interaction JavaScript | Homepage interactions |
| `cc-header.css` | Custom header styles | Navigation styling |
| `cc-header.js` | Header interactions (mega menu, cart) | Navigation behavior |
| `woocommerce/archive-product.php` | Product catalog template | Shop page layout, category sorting |
| `woocommerce/loop/orderby.php` | Product sorting dropdown | Sorting options |
| `dokan/sell-item-wizard.php` | Vendor product upload wizard | Vendor product creation flow |

---

## Frequently Asked Questions

### Q: Why are there React components in src/ if this is WordPress?

**A**: The site was initially prototyped with React. The components were then converted to PHP templates for WordPress compatibility. The src/ directory remains as a reference but is not used in production.

### Q: Can I use npm/build tools with this theme?

**A**: Currently, no build process is set up. The theme uses vanilla JavaScript and CSS. If you want to add build tools (Webpack, Vite, etc.), coordinate with the user first as it would change the deployment workflow.

### Q: How do I add a new product category with metadata?

**A**:
1. Create category in WooCommerce → Products → Categories
2. Add custom fields via WordPress admin or programmatically:
   ```php
   update_term_meta($term_id, 'set_price', '199.99');
   update_term_meta($term_id, 'release_date', '2025-01-15');
   ```

### Q: Why check for function_exists everywhere?

**A**: The site uses Code Snippets plugin which may define the same functions. Wrapping in `if (!function_exists())` prevents fatal errors from function redeclaration.

### Q: How do I update the mega menu categories?

**A**: Edit `header.php` navigation structure and update the category fetching logic in the mega menu section. The menu currently uses `get_latest_expansions()` to dynamically populate.

### Q: Can I use Gutenberg blocks?

**A**: Yes, WordPress supports Gutenberg for regular pages. However, custom templates like `page-cardbid-home.php` use hardcoded HTML and don't use Gutenberg. Consider user needs before adding block support.

---

## Version History

- **v1.0.0** - Initial child theme with custom homepage, navigation, and WooCommerce integration
- Recent updates include cart dropdown, mega menu improvements, and category metadata display

---

## Additional Resources

- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [WooCommerce Theming](https://woocommerce.com/documentation/plugins/woocommerce/woocommerce-theming/)
- [Storefront Documentation](https://docs.woocommerce.com/documentation/themes/storefront/)
- [WordPress Codex](https://codex.wordpress.org/)
- [WooCommerce Hooks Reference](https://woocommerce.com/document/introduction-to-hooks-actions-and-filters/)

---

**Last Updated**: November 22, 2025
**Maintained By**: AI assistants working with the Cardbid team
**Repository**: https://github.com/schamori/Cardbid
