<?php

// Converts a string to a slug.
function slug($str) {
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
	return $str;
}


// Gets a string between two strings.
function get_string_between($string, $start, $end) {
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  
  return substr($string, $ini, $len);
}

add_filter('acf/settings/remove_wp_meta_box', '__return_true');


// Used within ../content/, see Cayden for explanation if needed.
function insertIntoAttribute($value, $attribute) {
  // Remove the closing double quotation ( " ) from the end of an attribute.
  $openedAttribute = substr($attribute, 0, -1);

  // Insert the new string and close the attribute
  $newAttribute = $openedAttribute . ' ' . $value . '"';

  // Return newly updated attribute
  return $newAttribute;
}