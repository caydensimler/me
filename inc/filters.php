<?php

add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Add body class(es)
// add_filter( 'body_class', 'additional_body_classes' );
function additional_body_classes( $classes ) {
  $classes[] = 'add classes here';
  return $classes;
}