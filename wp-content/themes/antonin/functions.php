<?php
//https://github.com/Sumolari/wp-hmr-theme/tree/main/theme

define('THEME_VERSION', wp_get_theme()->get('Version'));
define('DIST_URL', get_template_directory_uri() . '/dist/');


// Enables HMR if Vite dev server is available.
require get_template_directory() . '/inc/init.php';
require get_template_directory() . '/inc/scripts.php';

//require get_theme_file_path('/inc/hmr.php');

//
add_action(
    'wp_enqueue_scripts', function () {
        $handle = 'hello-world';
        $dependencies = array();
        $version = null;

        if (isViteHMRAvailable()) {
            loadJSScriptAsESModule($handle);
            wp_enqueue_script(
                $handle,
                getViteDevServerAddress() . '/js/main.js',
                $dependencies,
                $version
            );
        }
    }
);