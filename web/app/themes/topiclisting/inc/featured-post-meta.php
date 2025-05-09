<?php
function topiclisting_add_featured_meta_box() {
    add_meta_box(
        'topiclisting_featured_meta',
        'Featured Post',
        'topiclisting_featured_meta_callback',
        'post',
        'side'
    );
}
add_action('add_meta_boxes', 'topiclisting_add_featured_meta_box');

function topiclisting_featured_meta_callback($post) {
    $value = get_post_meta($post->ID, '_is_featured_post', true);
    ?>
    <label>
        <input type="checkbox" name="topiclisting_featured" value="1" <?php checked($value, '1'); ?>>
        Mark as featured (uses custom overlay layout)
    </label>
    <?php
}

function topiclisting_save_featured_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['topiclisting_featured'])) {
        update_post_meta($post_id, '_is_featured_post', '1');
    } else {
        delete_post_meta($post_id, '_is_featured_post');
    }
}
add_action('save_post', 'topiclisting_save_featured_meta');
