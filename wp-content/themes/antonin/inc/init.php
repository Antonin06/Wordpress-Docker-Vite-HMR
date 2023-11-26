<?php
define('DISALLOW_FILE_EDIT', true);
function antonin23_setup()
{
    load_theme_textdomain('antonin23', get_template_directory() . '/languages');

    add_theme_support('post-thumbnails');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('custom-units');

    register_nav_menus(
        array(
            'menu-primary' => __('Menu primary', 'antonin23'),
            'menu-footer' => __('Menu footer', 'antonin23'),
        )
    );

    add_post_type_support('page', 'excerpt');

    add_theme_support('custom-logo');
    add_editor_style('dist/editor-style.css');
}

add_action('after_setup_theme', 'antonin23_setup');

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('antonin23-admin-js', DIST_URL . 'editor.js', array(), THEME_VERSION, true);
});


/**
 * Disable the emoji's
 */
function disable_wordpress_scripts()
{

    /* ---------------------------- Les svg à l'ouverture du body sont gérés par perfmatters ---------------------------- */

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'disable_wordpress_scripts');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}