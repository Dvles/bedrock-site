<?php

// Clone the default Editor role and create 'Client Editor'
add_action('init', function () {
    remove_role('client_editor'); // clean reset

    $editor = get_role('editor');

    if ($editor) {
        add_role('client_editor', 'Client Editor', $editor->capabilities);
    }
});



// remove unecessary theme pages
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

// remove unecessary dashboard widgets
function remove_default_dashboard_widgets_for_client() {
    if (!current_user_can('client_editor')) {
        return;
    }

    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');       // Quick Draft
    remove_meta_box('dashboard_primary', 'dashboard', 'side');           // WP Events & News
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');       // At a Glance
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');        // Activity
}
add_action('wp_dashboard_setup', 'remove_default_dashboard_widgets_for_client');


// custom dashboard widget
function add_custom_client_welcome_widget() {
    if (!current_user_can('client_editor')) {
        return;
    }

    $current_user = wp_get_current_user();
    $first_name = $current_user->user_firstname ?: $current_user->display_name;
    $title = '👋 Hi ' . esc_html($first_name);

    wp_add_dashboard_widget('custom_client_welcome', $title, function () {
        get_template_part('template-parts/dashboard/welcome-client');
    });
}
add_action('wp_dashboard_setup', 'add_custom_client_welcome_widget');




?>