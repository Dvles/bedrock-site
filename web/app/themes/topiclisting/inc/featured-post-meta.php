<?php
function topiclisting_add_featured_meta_box() {
    add_meta_box(
        'topiclisting-featured-meta',
        'Post Display Options',
        'topiclisting_featured_meta_box_callback',
        'post',
        'side'
    );
}
add_action('add_meta_boxes', 'topiclisting_add_featured_meta_box');

function topiclisting_featured_meta_box_callback($post) {
    $is_featured = get_post_meta($post->ID, '_is_featured_post', true);
    $has_overlay = get_post_meta($post->ID, '_has_featured_overlay', true);
    ?>
    <p>
        <label>
            <input type="checkbox" name="topiclisting_featured_post" value="1" <?php checked($is_featured, 1); ?> />
            Featured Post
        </label>
    </p>
    <p>
        <label>
            <input type="checkbox" name="topiclisting_featured_overlay" value="1" <?php checked($has_overlay, 1); ?> />
            Show featured image
        </label>
    </p>
    <?php
}

function topiclisting_save_featured_meta($post_id) {
    update_post_meta($post_id, '_is_featured_post', isset($_POST['topiclisting_featured_post']) ? 1 : 0);
    update_post_meta($post_id, '_has_featured_overlay', isset($_POST['topiclisting_featured_overlay']) ? 1 : 0);
}
add_action('save_post', 'topiclisting_save_featured_meta');
