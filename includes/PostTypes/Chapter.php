<?php

namespace BookReader\PostTypes;

class Chapter {
    public function register() {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type() {
        register_post_type('chapter', [
            'labels' => [
                'name' => 'Chapters',
                'singular_name' => 'Chapter',
            ],
            'public' => true,
            'rewrite' => ['slug' => 'chapters'],
            'supports' => ['title', 'editor'],
        ]);
    }
}
