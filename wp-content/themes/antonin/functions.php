<?php
//https://github.com/Sumolari/wp-hmr-theme/tree/main/theme

// Enables HMR if Vite dev server is available.
require_once get_theme_file_path('/inc/hmr.php');

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