<?php

/**
 * Checks is the current activate theme is blocksy
 */
if ( !function_exists('tainacan_blocksy_is_blocksy_activated') ) {
    function tainacan_blocksy_is_blocksy_activated() {
        $theme = wp_get_theme();
        $is_correct_theme = strpos( $theme->get_stylesheet(), 'blocksy' ) !== false;

        $is_child_theme_of_blocksy = FALSE;
        if ($theme->parent() !== false)
            $is_child_theme_of_blocksy = strpos( $theme->get_template(), 'blocksy' ) !== false;

        $another_theme_in_preview = false;
        if ( (isset( $_REQUEST['theme'] ) && strpos( strtolower( $_REQUEST['theme'] ), 'blocksy' ) === false || isset( $_REQUEST['customize_theme'] ) && strpos( strtolower( $_REQUEST['customize_theme'] ), 'blocksy' ) === false) && strpos( $_SERVER['REQUEST_URI'], 'customize' ) !== false ) {
            $another_theme_in_preview = true;
        }
        return ($is_correct_theme || $is_child_theme_of_blocksy) && !$another_theme_in_preview;
    }
}

/**
 * Gets plugin or theme directory URL
 */
if ( !function_exists('tainacan_blocksy_get_plugin_dir_url') ) {
    function tainacan_blocksy_get_plugin_dir_url() {
        return !TAINACAN_BLOCKSY_IS_CHILD_THEME ? plugin_dir_url(__FILE__) : get_stylesheet_directory_uri();
    }
}

/**
 * Gets plugin or theme directory path
 */
if ( !function_exists('tainacan_blocksy_get_plugin_dir_path') ) {
    function tainacan_blocksy_get_plugin_dir_path() {
        return !TAINACAN_BLOCKSY_IS_CHILD_THEME ? plugin_dir_path(__FILE__) : get_stylesheet_directory();
    }
}

/**
 * Manages correct template location in plugin
 */
if ( !function_exists('tainacan_blocksy_get_template_part') ) {
    function tainacan_blocksy_get_template_part($path) {
        if (!TAINACAN_BLOCKSY_IS_CHILD_THEME) {
            include(TAINACAN_BLOCKSY_PLUGIN_DIR_PATH . '/' . $path . '.php');
            return; // Should not return this, as include contains boolean
        } else
            return get_template_part($path);
    }
}
