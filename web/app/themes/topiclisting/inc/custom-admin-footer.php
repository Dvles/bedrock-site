<?php

function custom_admin_footer_logo() {
    echo '<span id="footer-thankyou">';
    echo 'Custom WP Built with ❤️ by COMPANY &nbsp;';
    echo '<img src="' . get_template_directory_uri() . '/assets/images/logo-small.png" alt="Logo" style="height:16px; vertical-align:middle;">';
    echo '</span>';
}
add_filter('admin_footer_text', 'custom_admin_footer_logo');

