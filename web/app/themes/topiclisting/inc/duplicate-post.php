<?php
/**
 * Adds "Duplicate" post functionality to posts and pages.
 */

function topiclisting_duplicate_post_as_draft() {
    global $wpdb;

    if (! (isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'topiclisting_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    $post_id = isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']);
    $post = get_post($post_id);

    if ($post) {
        $new_post_id = wp_insert_post([
            'post_title'    => $post->post_title . ' (Copy)',
            'post_content'  => $post->post_content,
            'post_excerpt'  => $post->post_excerpt,
            'post_status'   => 'draft',
            'post_type'     => $post->post_type,
            'post_author'   => get_current_user_id(),
            'post_parent'   => $post->post_parent,
        ]);

        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'slugs']);
            wp_set_object_terms($new_post_id, $terms, $taxonomy, false);
        }

        $post_meta = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        foreach ($post_meta as $meta) {
            if ($meta->meta_key === '_wp_old_slug') continue;
            add_post_meta($new_post_id, $meta->meta_key, maybe_unserialize($meta->meta_value));
        }

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, original post not found.');
    }
}
add_action('admin_action_topiclisting_duplicate_post_as_draft', 'topiclisting_duplicate_post_as_draft');

function topiclisting_duplicate_post_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url(
            'admin.php?action=topiclisting_duplicate_post_as_draft&post=' . $post->ID,
            basename(__FILE__),
            'duplicate_nonce'
        ) . '" title="Duplicate this item">Duplicate</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'topiclisting_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'topiclisting_duplicate_post_link', 10, 2);
