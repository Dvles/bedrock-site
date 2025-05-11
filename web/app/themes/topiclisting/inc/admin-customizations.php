<?php
function add_custom_client_role() {
    add_role('client_editor', 'Client Editor', [
        'read' => true,
        'edit_posts' => true,
        'edit_pages' => true,
        'edit_others_posts' => true,
        'edit_others_pages' => true,
        'publish_posts' => true,
        'publish_pages' => true,
        'delete_posts' => false,
        'delete_pages' => false,
        'upload_files' => true,
        'edit_theme_options' => false,
    ]);
}
add_action('init', 'add_custom_client_role');

function customize_admin_menu_for_client() {
    if (!current_user_can('administrator')) {
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('users.php');
        remove_menu_page('index.php'); // Dashboard
    }
}
add_action('admin_menu', 'customize_admin_menu_for_client', 999);

function client_dashboard_widget() {
    wp_add_dashboard_widget('custom_client_help', 'Welcome!', function() {
        echo '<p>Welcome to your site’s dashboard. Use the sidebar to edit pages or posts.</p>';
    });
}
add_action('wp_dashboard_setup', 'client_dashboard_widget');


?>