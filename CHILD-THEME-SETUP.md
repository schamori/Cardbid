# Storefront Child Theme - Cardbid Setup Guide

This is a **WordPress child theme** for the Storefront parent theme, featuring a custom Cardbid landing page.

## 📋 Requirements

- WordPress 5.0 or higher
- **Storefront theme** (parent theme) must be installed
- PHP 7.4 or higher

## 📁 Theme Structure

```
storefront-child-cardbid/          ← This folder
├── style.css                       ← Child theme stylesheet (with Template: storefront)
├── functions.php                   ← Enqueues parent/child styles & scripts
├── page-cardbid-home.php          ← Custom page template for Cardbid homepage
├── cardbid-style.css              ← (Legacy - now merged into style.css)
├── script.js                      ← JavaScript for animations
├── fonts/                         ← Custom fonts (Genaminto)
│   ├── Genaminto-Regular.woff2
│   └── Genaminto-Bold.woff2
├── images/                        ← Images (add your card/character images here)
│   ├── card.png
│   └── characters.png
└── src/                           ← Original development files
```

## 🚀 Installation Methods

### Method 1: WP Pusher (Recommended - GitHub Sync)

1. **Install Storefront Parent Theme First**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New"
   - Search for "Storefront"
   - Install and Activate

2. **Setup WP Pusher for Child Theme**
   - Install WP Pusher plugin
   - Go to WP Pusher → Install Theme
   - Repository: `schamori/Cardbid`
   - Branch: `claude/add-gradient-background-019tCkqP8CUQs4kasXHWXTuY` (or your merged branch)
   - Theme Type: **Theme**
   - Push-to-Deploy: Enable

3. **Activate Child Theme**
   - Go to Appearance → Themes
   - Find "Storefront Child - Cardbid"
   - Click "Activate"

4. **Create Homepage**
   - Go to Pages → Add New
   - Title: "Home" (or any name)
   - In Page Attributes → Template: Select **"Cardbid Home Page"**
   - Publish

5. **Set as Homepage** (optional)
   - Go to Settings → Reading
   - "A static page" → Homepage: Select your "Home" page
   - Save

### Method 2: Manual Upload

1. **Install Storefront** (as above)

2. **Upload Child Theme**
   - Download/clone this repository
   - Zip the entire folder
   - Go to Appearance → Themes → Add New → Upload Theme
   - Upload the zip file
   - Activate

3. **Follow steps 4-5 from Method 1**

### Method 3: FTP/SFTP

1. **Install Storefront** (as above)

2. **Upload via FTP**
   - Connect to your server
   - Navigate to `/wp-content/themes/`
   - Upload this entire folder
   - Rename folder to: `storefront-child-cardbid` (if needed)

3. **Activate** (follow steps 3-5 from Method 1)

## 🎨 What's Included

### Custom Cardbid Homepage Features:
- ✅ Diagonal gradient background (#1e2741 → #6973db → #3a5ab6 → #e6eeff)
- ✅ Wiggling card animations
- ✅ Cards and character figures positioned on right side
- ✅ Windowed boxes for Gallery ("Höchste Gebote") and Top4 ("Top 4 Verkauft")
- ✅ Transparent "Was ist Cardbid?" section showing gradient
- ✅ Pre-footer box with overlap effect
- ✅ Full responsive design

### How It Works:

The `functions.php` file properly loads:
1. **Storefront parent styles** first
2. **Child theme styles** second (from style.css)
3. **Custom JavaScript** (only on Cardbid homepage template)
4. **Google Fonts** (Inter font family)

## 🔧 Customization

### Adding Your Images

Replace placeholder images in the template:

1. Upload images to `/wp-content/themes/storefront-child-cardbid/images/`
2. Or use WordPress Media Library and update paths in `page-cardbid-home.php`:

```php
<!-- Replace this: -->
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png">

<!-- With this: -->
<img src="<?php echo wp_get_attachment_url(123); ?>">
<!-- (where 123 is your Media Library image ID) -->
```

### Editing Styles

**All styles are in `style.css`** - edit this file to customize:
- Colors (CSS variables at top of file)
- Gradient angles and colors
- Animation speeds
- Layout spacing

### Editing the Homepage

Edit `page-cardbid-home.php` to change:
- HTML structure
- Content text
- Navigation links
- Feature descriptions

### Adding Custom Fonts

1. Upload font files to `/fonts/` folder
2. Add @font-face rules to `style.css` (already included for Genaminto)

## 🔄 Updating via GitHub (WP Pusher)

1. Make changes locally to any file
2. Commit and push:
   ```bash
   git add .
   git commit -m "Update homepage design"
   git push
   ```
3. WP Pusher automatically syncs changes to live site
4. Refresh your WordPress page - changes appear!

## 🐛 Troubleshooting

### Parent theme not found
**Error:** "The parent theme is missing. Please install the 'Storefront' parent theme."

**Fix:** Install and activate Storefront theme first.

### Styles not loading
**Check:**
1. Is Storefront installed?
2. Is the child theme activated (not just Storefront)?
3. Clear WordPress cache (if using caching plugin)
4. Hard refresh browser: `Ctrl+Shift+R`

### Template not appearing
**Check:**
1. File `page-cardbid-home.php` exists in theme folder
2. File starts with proper template header:
   ```php
   <?php
   /*
   Template Name: Cardbid Home Page
   */
   ```
3. Try deactivating/reactivating the theme

### Images not loading
**Check:**
1. Images exist in `/images/` folder
2. File names match exactly (case-sensitive)
3. Image paths use `get_stylesheet_directory_uri()` (not relative paths)

## 📚 File Descriptions

### Core Theme Files

**`style.css`**
- Main stylesheet with WordPress theme header
- **Critical:** Must have `Template: storefront` to be recognized as child theme
- Contains all Cardbid custom styles (gradients, animations, layout)

**`functions.php`**
- Enqueues parent theme styles
- Enqueues child theme styles
- Loads fonts and scripts
- Optional: Remove Storefront header/footer on custom template

**`page-cardbid-home.php`**
- Custom page template
- Standalone design (doesn't use default WordPress header/footer)
- Uses all custom Cardbid styling

### Supporting Files

**`script.js`** - JavaScript for:
- Mega menu interactions
- Carousel functionality
- Animation triggers

**`fonts/`** - Custom Genaminto font files

**`images/`** - Image assets (cards, characters)

## ✅ Child Theme Benefits

1. **Parent theme updates don't overwrite your customizations**
2. **Inherits all Storefront features** (WooCommerce support, theme customizer, etc.)
3. **Can use Storefront features on other pages** (only custom template uses Cardbid design)
4. **Proper WordPress standards** (enqueuing, hooks, filters)

## 🎯 Next Steps

After installation:

1. **Add real images** to `/images/` folder
2. **Update navigation links** in page template
3. **Create additional pages** using Storefront's default templates
4. **Customize Storefront settings** via Appearance → Customize (affects non-Cardbid pages)
5. **Set up WooCommerce** if needed (Storefront is built for it)

## 📖 Resources

- [Storefront Theme Documentation](https://docs.woocommerce.com/documentation/themes/storefront/)
- [WordPress Child Themes Guide](https://developer.wordpress.org/themes/advanced-topics/child-themes/)
- [WP Pusher Documentation](https://wppusher.com/documentation)

---

**🎉 Your Storefront child theme with Cardbid homepage is ready!**
