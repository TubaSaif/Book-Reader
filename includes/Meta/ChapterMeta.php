<?php

namespace BookReader\Meta;

class ChapterMeta {
    public function register() {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save_meta']);
    }

    public function add_meta_box() {
        add_meta_box(
            'book_link',
            'Link to Book',
            [$this, 'display_meta_box'],
            'chapter',
            'side'
        );
    }

    public function display_meta_box($post) {
        $books = get_posts(['post_type' => 'book', 'numberposts' => -1]);
        $current_book_id = get_post_meta($post->ID, '_linked_book', true);

        echo '<select name="linked_book">';
        echo '<option value="">Select a Book</option>';
        foreach ($books as $book) {
            echo '<option value="' . $book->ID . '" ' . selected($current_book_id, $book->ID, false) . '>' . $book->post_title . '</option>';
        }
        echo '</select>';
    }

    public function save_meta($post_id) {
        if (isset($_POST['linked_book'])) {
            update_post_meta($post_id, '_linked_book', sanitize_text_field($_POST['linked_book']));
        }
    }
}
