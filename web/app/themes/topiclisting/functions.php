<?php

/**
 * Register Menu functionalities
 */

// Register menu locations
function topiclisting_menus() {
	$locations = array(
    	'primary' => "Primary Header Menu",
    	'footer' => "Footer Menu",
	);
	register_nav_menus($locations);
}
add_action('init', 'topiclisting_menus');

// Add class "click-scroll" to primary menu links
add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
    if ($args->theme_location === 'primary') {
        $atts['class'] .= ' click-scroll';
    }
    return $atts;
}, 10, 4);

// Add class to footer menu ul
add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    if ($args->theme_location === 'footer') {
        return ['site-footer-link-item'];
    }
    return $classes;
}, 10, 4);

// Add class to footer menu a
add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
    if ($args->theme_location === 'footer') {
        $atts['class'] = 'site-footer-link';
    }
    return $atts;
}, 10, 4);


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Load custom Theme Settings page for editable footer info (phone/email)
 */

 require_once get_template_directory() . '/inc/theme-settings.php';


/**
* Register Widget Areas
*/

function topiclisting_register_sidebars() {
	for ($i = 1; $i <= 4; $i++) {
    	register_sidebar([
        	'name'      	=> "Footer Column $i",
        	'id'        	=> "footer-column-$i",
        	'before_widget' => '<div class="footer-widget mb-4">',
        	'after_widget'  => '</div>',
        	'before_title'  => '<h6 class="site-footer-title mb-3">',
        	'after_title'   => '</h6>',
    	]);
	}
}
add_action('widgets_init', 'topiclisting_register_sidebars');

// Add class to widget headings
add_filter('widget_title', function($title, $instance, $id_base) {
    return '<h6 class="site-footer-title mb-3">' . $title . '</h6>';
}, 10, 3);


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

// Enqueues fonts
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
add_action('wp_enqueue_scripts', 'topiclisting_enque_styles');
add_action('wp_enqueue_scripts', 'topiclisting_enque_scripts');
add_action( 'wp_enqueue_styles', 'topiclisting_enqueue_google_fonts' );

/**
* Register Duplicate post functionality
*/
require_once get_template_directory() . '/inc/duplicate-post.php';


/**
 * Register featured post meta box and styling logic
 */
require_once get_template_directory() . '/inc/featured-post-meta.php';