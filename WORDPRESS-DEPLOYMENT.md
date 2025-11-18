# WordPress Deployment Guide for Cardbid Homepage

This guide explains how to deploy your Cardbid landing page to WordPress using **WP Pusher** (syncing from GitHub).

## ✅ What You Have Now

- `page-cardbid-home.php` - WordPress page template
- `cardbid-style.css` - Stylesheet for the template
- `script.js` - JavaScript file
- `images/` - Folder for card and character images

## 📁 WordPress Theme File Structure

You need to place these files in your **WordPress theme folder**. Here's the structure:

```
wp-content/
└── themes/
    └── your-theme-name/      ← Your active theme folder
        ├── page-cardbid-home.php     ← The template file
        ├── cardbid-style.css         ← The stylesheet
        ├── script.js                 ← JavaScript
        ├── images/                   ← Image folder
        │   ├── card.png
        │   └── characters.png
        └── fonts/                    ← Font files (if using custom fonts)
            ├── Genaminto-Regular.woff2
            └── Genaminto-Bold.woff2
```

## 🚀 Deployment Steps

### Option 1: WP Pusher (GitHub → WordPress)

**WP Pusher syncs your theme folder from GitHub to WordPress automatically.**

1. **Push to GitHub**
   ```bash
   cd /home/user/Cardbid
   git add page-cardbid-home.php cardbid-style.css script.js
   git commit -m "Add WordPress page template for Cardbid homepage"
   git push origin your-branch-name
   ```

2. **Set Up WP Pusher** (if not already done)
   - Install WP Pusher plugin in WordPress
   - Connect it to your GitHub repository
   - Point it to your **theme folder**
   - Enable "Auto push on GitHub webhook"

3. **Create the Page in WordPress**
   - Go to WordPress Dashboard → **Pages** → **Add New**
   - Title: "Home" (or whatever you want)
   - In the sidebar, find **Page Attributes** → **Template**
   - Select: **"Cardbid Home Page"**
   - Click **Publish**

4. **Set as Homepage** (optional)
   - Go to **Settings** → **Reading**
   - Select "A static page"
   - Choose your "Home" page as the homepage
   - Save

### Option 2: Manual FTP Upload (No GitHub)

1. Connect to your WordPress server via FTP/SFTP
2. Navigate to: `wp-content/themes/your-theme-name/`
3. Upload:
   - `page-cardbid-home.php`
   - `cardbid-style.css`
   - `script.js`
   - `images/` folder
4. Follow steps 3-4 from Option 1 above

## 🔧 How It Works

### The Template File (`page-cardbid-home.php`)

```php
<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/

// This loads the CSS file
wp_enqueue_style('cardbid-home-css', get_stylesheet_directory_uri() . '/cardbid-style.css', array(), '1.0');
?>
```

- **`wp_enqueue_style()`** tells WordPress to load your CSS file properly
- **`get_stylesheet_directory_uri()`** points to your theme folder
- The template is a **standalone page** (doesn't use default WordPress header/footer)

### Image Paths in Template

All image paths use WordPress functions:
```php
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/card.png" alt="Pokemon Card">
```

This ensures images load correctly regardless of your WordPress URL structure.

## 📝 Important Notes

### ✅ WP Pusher WILL sync:
- `page-cardbid-home.php` (template file)
- `cardbid-style.css` (stylesheet)
- `script.js` (JavaScript)
- `images/` folder (all images)
- `fonts/` folder (custom fonts)

### ❌ WP Pusher will NOT sync:
- WordPress Pages (created in admin - these are in the database)
- Posts
- Settings
- Plugins (unless you set up a separate plugin repo)

### 🔄 Making Updates

1. Edit files locally in `/home/user/Cardbid/`
2. Commit and push to GitHub:
   ```bash
   git add .
   git commit -m "Update homepage design"
   git push
   ```
3. WP Pusher automatically pulls changes to your live site
4. Refresh your WordPress page - changes appear instantly!

## 🎨 Customizing Styles

Edit `cardbid-style.css` with any CSS changes. All your current gradient, animations, and layout styles are already in this file.

Changes are applied automatically when you push to GitHub (if using WP Pusher).

## 🐛 Troubleshooting

**CSS not loading?**
- Check file path in template matches actual filename: `cardbid-style.css`
- Clear WordPress cache (if using a caching plugin)
- Hard refresh browser: `Ctrl+Shift+R` (Windows) or `Cmd+Shift+R` (Mac)

**Images not showing?**
- Ensure images are in `images/` folder in your theme
- Check image filenames match exactly (case-sensitive!)
- Replace placeholder paths with actual image URLs

**Template not appearing in WordPress?**
- Make sure file starts with `<?php` and has the Template Name comment
- Check file is in the active theme folder (not a different theme)
- Try deactivating/reactivating the theme

## 📚 Resources

- [WP Pusher Documentation](https://wppusher.com/documentation)
- [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
- [wp_enqueue_style Reference](https://developer.wordpress.org/reference/functions/wp_enqueue_style/)

---

**🎉 You're all set!** Your Cardbid homepage is now managed via GitHub and deployable to WordPress.
