<?php
const VITE_HMR_CLIENT_HANDLE = 'vite-client';
require get_theme_file_path('/inc/hmr.php');

class antonin23HandleScripts {
    public function __construct() {
        add_action('wp_enqueue_scripts', function() {
            $this->dequeue_styles();
            $this->enqueue_main_styles();
            $this->register_styles();
            $this->enqueues_conditionnal();
            $this->enqueue_main_scripts();
        });

        add_action('wp_footer', function() { $this->footer_style(); });
    }
    public function dequeue_styles() {
        wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
    }

    public function register_styles() {
        wp_register_style('antonin23-loop', DIST_URL . 'loop-post-card.css', array(), THEME_VERSION);
        wp_register_style('antonin23-swiper', DIST_URL . 'libs/swiper.css', array(), THEME_VERSION);
    }
    public function enqueue_main_styles() {
        wp_enqueue_style('antonin23-style', DIST_URL . 'main.css', array(), THEME_VERSION);
    }
    public function enqueue_main_scripts() {
//        wp_enqueue_script('antonin23-js', DIST_URL . 'theme.js', array(), THEME_VERSION, true);
//        wp_add_inline_script('antonin23-js', 'const site_uri = "' . get_site_url() . '"; const stylesheet_directory_uri = "' . get_stylesheet_directory_uri() . '";');
        wp_enqueue_script(
            VITE_HMR_CLIENT_HANDLE,
            getViteDevServerAddress().'/@vite/client',
            array(),
            null
        );
        loadJSScriptAsESModule(VITE_HMR_CLIENT_HANDLE);
    }
    public function enqueues_conditionnal() {
        if (is_archive() || is_home()) {
            wp_enqueue_style('antonin23-loop');
            wp_enqueue_style('antonin23-blog', DIST_URL . 'blog.css', array(), THEME_VERSION);
        }
        if (is_archive()) wp_enqueue_style('antonin23-archive', DIST_URL . 'archive.css', array(), THEME_VERSION);
        if (is_single()) wp_enqueue_style('antonin23-single', DIST_URL . 'single.css', array(), THEME_VERSION);
        if (is_page()) wp_enqueue_style('antonin23-page', DIST_URL . 'page.css', array(), THEME_VERSION);
        if (is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
        if (is_front_page()) {
//	        wp_enqueue_style('antonin23-frontpage-css', DIST_URL . 'front-page.css', array(), THEME_VERSION);
//	        wp_enqueue_script('antonin23-front-page-js', DIST_URL . 'front-page.js', array(), THEME_VERSION, true);
        }
        if(is_search()) wp_enqueue_style('antonin23-loop');
        if(paginate_links()) wp_enqueue_style('antonin23-navigation', DIST_URL . 'components/navigation.css', array(), THEME_VERSION);
        if(is_page_template('template-about.php')) wp_enqueue_style('aa-template-about', DIST_URL . 'template-about.css', array(), THEME_VERSION);
    }
    public function footer_style() {
        wp_enqueue_style('antonin23-footer-style', DIST_URL . 'footer.css', array(), THEME_VERSION);
    }
}

new antonin23HandleScripts();