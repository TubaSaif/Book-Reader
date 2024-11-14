<?php

namespace BookReader\PostTypes;

class Book {
    public function register() {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type() {
        register_post_type('book', [
            'labels' => [
                'name' => 'Books',
                'singular_name' => 'Book',
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'books'],
            'supports' => ['title', 'editor', 'thumbnail'],
        ]);
    }
}
