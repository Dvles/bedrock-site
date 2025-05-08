<?php

//Register settings
function topiclisting_register_theme_settings() {
    register_setting('topiclisting_settings_group', 'topiclisting_phone');
    register_setting('topiclisting_settings_group', 'topiclisting_email');

    add_settings_section('topiclisting_main_section', '', null, 'theme-settings');

    add_settings_field(
        'topiclisting_phone',
        'Phone Number',
        function () {
            $value = get_option('topiclisting_phone', '');
            echo '<input type="text" name="topiclisting_phone" value="' . esc_attr($value) . '" class="regular-text">';
        },
        'theme-settings',
        'topiclisting_main_section'
    );

    add_settings_field(
        'topiclisting_email',
        'Email Address',
        function () {
            $value = get_option('topiclisting_email', '');
            echo '<input type="email" name="topiclisting_email" value="' . esc_attr($value) . '" class="regular-text">';
        },
        'theme-settings',
        'topiclisting_main_section'
    );
}
add_action('admin_init', 'topiclisting_register_theme_settings');


// custom admin page 
function topiclisting_add_theme_menu_page() {
    add_menu_page(
        'Theme Settings',                   // Page title
        'Theme Settings',                   // Menu title
        'manage_options',                   // Capability
        'theme-settings',                   // Menu slug
        'topiclisting_render_theme_settings_page', // Callback function to render the form
        'dashicons-admin-generic',          // Icon
        61                                   // Position
    );
}
add_action('admin_menu', 'topiclisting_add_theme_menu_page');

// render/save data
function topiclisting_render_theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>Theme Settings</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('topiclisting_settings_group');
                do_settings_sections('theme-settings');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}
