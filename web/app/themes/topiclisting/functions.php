<?php

// Enqueues style.css on the front.
if (! function_exists("topiclisting_enque_styles")){

    function topiclisting_enque_styles(){
        $theme_uri = get_template_directory_uri();

        wp_enqueue_style(
            'topiclisting-bootstrap',
            "$theme_uri/assets/css/bootstrap.min.css",
            [],
            '1.0',
            'all'
        );

        wp_enqueue_style(
            'topiclisting-bootstrap-icons',
            "$theme_uri/assets/css/bootstrap-icons.css",
            ['topiclisting-bootstrap'], 
            '1.0',
            'all'
        );

        wp_enqueue_style(
            'topiclisting-css',
            "$theme_uri/assets/css/templatemo-topic-listing.css",
            ['topiclisting-bootstrap', 'topiclisting-bootstrap-icons'],
            '1.0',
            'all'
        );
    }
}

// Enqueues scripts on the front
if (! function_exists("topiclisting_enque_scripts")){

    function topiclisting_enque_scripts(){
        $theme_uri = get_template_directory_uri();

        wp_enqueue_script('jquery'); // never enqueue your own jQuery !!
        wp_enqueue_script(
            'bootstrap',
            "$theme_uri/assets/js/bootstrap.bundle.min.js",
            ['jquery'],
            'all',
            true
        );

        wp_enqueue_script(
            'jquery-sticky',
            "$theme_uri/assets/js/jquery.sticky.js",
            ['jquery'],
            'all',
            true
        );

        wp_enqueue_script(
            'click-scroll',
            "$theme_uri/assets/js/click-scroll.js",
            ['jquery'],
            'all',
            true
        );

        wp_enqueue_script(
            'custom-js',
            "$theme_uri/assets/js/custom.js",
            ['jquery', 'bootstrap', 'jquery-sticky', 'click-scroll'],
            'all',
            true
        );
    }
}


add_action('wp_enqueue_scripts', 'topiclisting_enque_styles');
add_action('wp_enqueue_scripts', 'topiclisting_enque_scripts');


function topiclisting_enqueue_google_fonts() {
    // Preconnect for performance
    wp_enqueue_style( 'google-fonts-preconnect', 'https://fonts.googleapis.com', [], null );
    wp_enqueue_style( 'google-fonts-preconnect2', 'https://fonts.gstatic.com', [], null );
    wp_style_add_data( 'google-fonts-preconnect2', 'crossorigin', 'anonymous' );

    // font request
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap',
        [],
        null
    );
}
add_action( 'wp_enqueue_styles', 'topiclisting_enqueue_google_fonts' );



error_log("Enqueuing styles...");
error_log('functions.php is being loaded');