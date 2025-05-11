<?php

add_filter('manage_pages_columns', function ($columns) {
    $columns['page_id'] = 'ID';
    return $columns;
});

add_action('manage_pages_custom_column', function ($column, $post_id) {
    if ($column === 'page_id') {
        echo $post_id;
    }
}, 10, 2);

// Add ID column to Posts list
add_filter('manage_posts_columns', function ($columns) {
    $columns['post_id'] = 'ID';
    return $columns;
});

add_action('manage_posts_custom_column', function ($column, $post_id) {
    if ($column === 'post_id') {
        echo $post_id;
    }
}, 10, 2);