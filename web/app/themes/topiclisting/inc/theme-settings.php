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
    <div class="wrap" style="max-width: 720px; margin-top: 40px;">
        <h1 style="font-size: 2.5rem; font-weight: 600; margin-bottom: 24px;">Theme Settings</h1>
        
        <form method="post" action="options.php" style="background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
            <?php settings_fields('topiclisting_settings_group'); ?>
            <?php do_settings_sections('theme-settings'); ?>
            
            <hr style="margin: 24px 0;">
            
            <?php submit_button('Save Settings', 'primary', 'submit', false); ?>
        </form>
    </div>
    <style>
        .form-table th {
            font-weight: 600;
            font-size: 16px;
            padding: 20px 10px 20px 0;
        }
        .form-table td {
            padding: 20px 10px;
        }
        input.regular-text {
            padding: 8px 12px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 400px;
        }
    </style>
    <?php
}
