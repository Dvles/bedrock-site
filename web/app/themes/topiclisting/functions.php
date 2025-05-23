<?php


//  Enable Featured Image Support
add_theme_support('post-thumbnails');
add_theme_support('responsive-embeds');

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
            'topiclisting-bootstrap-icons-cdn',
            'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
            [],
            null
          );
          

        wp_enqueue_style(
            'topiclisting-css',
            "$theme_uri/assets/css/templatemo-topic-listing.css",
            ['topiclisting-bootstrap', 'topiclisting-bootstrap-icons-cdn'],
            '1.0',
            'all'
        );

        wp_enqueue_style(
            'splide-min-css',
            "https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css",
            ['topiclisting-bootstrap', 'topiclisting-bootstrap-icons-cdn'],
            '4',
            'all'
        );
    }
}

// Enqueues style.css on dashboard.
function enqueue_client_admin_styles($hook) {
    // Only load on dashboard
    if ($hook !== 'index.php') {
        return;
    }

    wp_enqueue_style(
        'client-dashboard-style',
        get_template_directory_uri() . '/assets/css/client-dashboard.css',
        [],
        filemtime(get_template_directory() . '/assets/css/client-dashboard.css')
    );
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

        wp_enqueue_script(
            'splide-min-js',
            "https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js",
            ['jquery', 'bootstrap', 'jquery-sticky', 'click-scroll'],
            'all',
            true
        );

        wp_enqueue_script(
            'splie-slider-js',
            "$theme_uri/assets/js/splide-slider.js",
            ['jquery', 'bootstrap', 'jquery-sticky', 'click-scroll'],
            'all',
            true
        );

        wp_enqueue_script(
            'pinterest', 
            'https://assets.pinterest.com/js/pinit.js', 
            [], 
            null, 
            true);

        
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
add_action('admin_enqueue_scripts', 'enqueue_client_admin_styles');
add_action('wp_enqueue_scripts', 'topiclisting_enque_scripts');
add_action( 'wp_enqueue_styles', 'topiclisting_enqueue_google_fonts' );

// Register Duplicate post functionality
require_once get_template_directory() . '/inc/duplicate-post.php';

// Register featured post meta box and styling logic
require_once get_template_directory() . '/inc/featured-post-meta.php';

// Register ADMIN style for better UI/UX
require_once get_template_directory() . '/inc/admin.php';

// Register Widget Area 
require_once get_template_directory() . '/inc/widget-area.php';

// Register  
require_once get_template_directory() . '/inc/widget-area.php';

// Register  
require_once get_template_directory() . '/inc/custom-admin-footer.php';

// Register Client role
if ( function_exists('get_template_directory') ) {
  $admin_customizations = get_template_directory() . '/inc/page-post-id.php';
  if ( file_exists($admin_customizations) ) {
    require_once $admin_customizations;
  }
}

