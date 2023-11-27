<?php

if (! function_exists('ntimdev_setup')) {
    /**
     * Sets up theme defaults and registers support for various Wordpress features.
     * 
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails
     */
    function ntimdev_setup() {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('ntim', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let Wordpress manage the document title.
         * By adding theme support, we declare that this theme does not use
         * a hard-coded HTML <title> tag in the document head, and expect Wordpress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        
        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        /**
         * Switch default core markup for search form, gallery and caption
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'gallery',
            'caption',
        ]);

        // Add support for core custom logo.
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        // Add Post Type Support
        add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

        add_theme_support( 'align-wide' );
	    add_theme_support( 'wp-block-styles' );

	    add_theme_support( 'editor-styles' );

        // Register menu bars
        register_nav_menus([
            'primary' => esc_html__('Primary Menu', 'herobiz'),
            'footer' => esc_html__('Footer Menu', 'herobiz'),
        ]);

        // Disable admin bar shown on top of the page when in development
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('after_setup_theme', 'ntimdev_setup');

if (! function_exists('ntimdev_public_scripts')) {
    /**
     * Enqueue public scripts and styles
     */
    function ntimdev_public_scripts() {
        $theme = wp_get_theme();

        // CSS
        wp_enqueue_style('style', get_theme_file_uri('/assets/css/style.css'), [], $theme->get('Version'));

        // Scripts
        wp_enqueue_script('main', get_theme_file_uri('/assets/js/main.js'), [], $theme->get('Version'), true);
    }
}
add_action('wp_enqueue_scripts', 'ntimdev_public_scripts');

if (! function_exists('ntimdev_giscus_script')) {
    function ntimdev_giscus_script() {
        if (is_single()) {
            ?>
                <script src="https://giscus.app/client.js"
                    data-repo="NtimYeboah/ntim.dev"
                    data-repo-id="R_kgDOKwH1Gg"
                    data-category="Announcements"
                    data-category-id="DIC_kwDOKwH1Gs4CbHnQ"
                    data-mapping="pathname"
                    data-strict="0"
                    data-reactions-enabled="1"
                    data-emit-metadata="0"
                    data-input-position="bottom"
                    data-theme="preferred_color_scheme"
                    data-lang="en"
                    data-loading="lazy"
                    crossorigin="anonymous"
                    async>
                </script>
            <?php
        }
    }
}
add_action('wp_footer', 'ntimdev_giscus_script');
