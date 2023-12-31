<?php
/**
 * Enable Vite HMR for WordPress theme development.
 * 
 * Enable Vite Hot Module Replacement when a Vite dev server is available.
 * VITE_DEV_SERVER_ADDRESS environment variable must be set to the URL of the
 * running Vite dev server.
 * 
 * @link https://vitejs.dev/guide/api-hmr.html#hmr-api
 */

/**
 * Returns the URL of the running Vite dev server to which the theme should
 * connect to offer hot-module-replacement.
 * 
 * When there is no Vite dev server running this function returns `false`.
 * There is no Vite dev server running in production environment.
 * 
 * @return string|boolean URL of Vite dev server or `false` when running in
 * production.
 */
function getViteDevServerAddress()
{
    return getenv('VITE_DEV_SERVER_ADDRESS', true);
}

/**
 * Returns whether Vite HMR server is available or not.
 * Use this function as check to run Vite-specific patches.
 *
 * @return boolean `true` if Vite HMR server is available.
 */
function isViteHMRAvailable(): bool
{
    return !empty(getViteDevServerAddress());
}

/**
 * Loads given script as a EcmaScript module.
 * 
 * @param string $script_handle Name of the script to load as module.
 *
 * @return void
 */
function loadJSScriptAsESModule(string $script_handle)
{
    add_filter(
        'script_loader_tag', function ($tag, $handle, $src) use ($script_handle) {
            if ($script_handle === $handle ) {
                return sprintf(
                    '<script type="module" src="%s"></script>',
                    esc_url($src)
                );
            }
            
            return $tag;
        }, 10, 3
    );
}

if (!isViteHMRAvailable()) {
    return;
}

add_filter(
    'stylesheet_uri', function () {
        return getViteDevServerAddress().'/wp-content/themes/antonin/sass/style.scss';
    }
);

add_filter(
    'stylesheet_directory_uri', function () {
        return getViteDevServerAddress().'/wp-content/themes/antonin/sass';
    }
);

