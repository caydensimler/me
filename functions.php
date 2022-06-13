<?php

/**
 * Enqueue child theme style.css on front AND back end.
 */
add_action( 'wp_enqueue_scripts', 'theme_assets' );
add_action( 'admin_enqueue_scripts', 'theme_assets' );
function theme_assets() {
  wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), true );
  wp_enqueue_style( 'theme-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.css', false, 'all');
}

/**
 * Enqueuing wp-blocks and wp-dom javascript
 * for use in /assets/js/blocks.js
 */
add_action( 'enqueue_block_editor_assets', 'block_assets' );
function block_assets() {
	wp_enqueue_script( 'block-scripts', get_stylesheet_directory_uri() . '/assets/js/blocks.js', array( 'wp-blocks', 'wp-dom' ), false, true );
}


// Include other functions as needed from the /inc directory
require get_stylesheet_directory() . '/inc/acf-options-page.php';
require get_stylesheet_directory() . '/inc/cpts.php';
require get_stylesheet_directory() . '/inc/dashboard-widgets.php';
require get_stylesheet_directory() . '/inc/filters.php';
require get_stylesheet_directory() . '/inc/hooks.php';
require get_stylesheet_directory() . '/inc/internal.php';
require get_stylesheet_directory() . '/inc/menus.php';
require get_stylesheet_directory() . '/inc/optimizations.php';
require get_stylesheet_directory() . '/inc/shortcodes.php';
require get_stylesheet_directory() . '/inc/utilities.php';

require get_stylesheet_directory() . '/content/Content.php';
require get_stylesheet_directory() . '/blocks/register.php';


/**
 * ------------------------------------------------------------------
 * Theme code starts here. Don't touch the stuff above :)
 * ------------------------------------------------------------------
 */


/**
 * Reusable Blocks accessible in backend
 */
function reusable_blocks_admin_link() {
  add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-networking', 22 );
}
add_action( 'admin_menu', 'reusable_blocks_admin_link' );