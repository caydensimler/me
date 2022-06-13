<?php
/**
 * Add widgets to the dashboard.
 *
 * Must be included in functions.php
 *
 * THE FOLLOWING ARE ALL ONLY EXAMPLES. DUPLICATE AND MODIFY AS NEEDED.
 *
 * @package GenerateChild
 */

/**
 * Display custom shortcodes.
 */
function gpc_shortcodes_dashboard_widget() {
  wp_add_dashboard_widget(
    'gpc_shortcodes_dashboard_widget', // Widget slug.
    'Shortcodes', // Title.
    'gpc_shortcodes_dashboard_widget_function' // Display function.
  );
}
add_action( 'wp_dashboard_setup', 'gpc_shortcodes_dashboard_widget' );
function gpc_shortcodes_dashboard_widget_function() {
  echo '<p>Any custom shortcodes for use on your site will appear here.</p>';
  echo '<dl>';
  echo '<dt>[gpc_output_staff]</dt>';
  echo '<dd>Output a list of staff members.</dd>';
  echo '</dl>';
}


// Quick Links
add_action('wp_dashboard_setup', 'dashboard_quick_links');
function dashboard_quick_links() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget('dashboard_links', 'Quick Links', 'dashboard_links');
}

function dashboard_links() {
echo '
  <p>
    - <a href="/wp-admin/theme-editor.php?file=style.css&theme=generatepress-child">style.css</a>
    <br>
    - <a href="/wp-admin/theme-editor.php?file=functions.php&theme=generatepress-child">functions.php</a>
  </p>
';
}


// Documentation/Reference Links
add_action('wp_dashboard_setup', 'dashboard_documentation_links');
function dashboard_documentation_links() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget('dashboard_docs', 'Documentation', 'dashboard_documentation');
}

function dashboard_documentation() {
echo '
  <p>
    Documentation and resources for tools/functionality used throughout the site, including optional libraries loaded based on necessary components.
  </p>
  <p>
    <strong>GeneratePress</strong> <br>
    - <a href="https://docs.generatepress.com/" target="_blank">Documentation</a>
    <br>
    - <a href="https://docs.generatepress.com/collection/hooks/" target="_blank">Available Hooks</a>
    <br>
    - <a href="https://docs.generatepress.com/article/hooks-visual-guide/" target="_blank">Hooks Visual Guide</a>
  </p>
  <p>
    <strong>Libraries</strong> <br>
    - <a href="https://kenwheeler.github.io/slick/" target="_blank">Slick Carousel</a>
    <br>
    - <a href="https://fontawesome.com/icons?d=gallery" target="_blank">Font Awesome</a>
  </p>
';
}