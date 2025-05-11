<?php


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


