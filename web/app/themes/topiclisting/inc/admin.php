<?php
add_action('admin_enqueue_scripts', function () {
  $theme_uri = get_template_directory_uri();
  wp_enqueue_style('topiclisting-admin-style', $theme_uri . '/assets/css/admin-style.css', [], '1.0');
});
?>