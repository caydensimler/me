<?php
// Guide to GeneratePress Hooks - https://docs.generatepress.com/article/hooks-visual-guide/

// Footer Code Embed
function footer_embeds() {}
// add_action('wp_footer', 'footer_embeds');

// Google Analytics
function add_google_analytics() { ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=TRACKING_ID_GOES_HERE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'TRACKING_ID_GOES_HERE');
  </script>
<?php }
// add_action('wp_head', 'add_google_analytics');

// Add Footer Template Part
function inside_footer() {
  get_template_part('template-parts/footer');
}
add_action('generate_before_copyright', 'inside_footer');