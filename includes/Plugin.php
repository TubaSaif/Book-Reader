<?php

namespace BookReader;

use BookReader\PostTypes\Book;
use BookReader\PostTypes\Chapter;
use BookReader\Meta\ChapterMeta;

class Plugin {

    public function init() {
        // Initialize custom post types
        $this->register_post_types();

        // Initialize meta fields
        $this->register_meta_fields();

        // Hook into the single_template filter
        add_filter('single_template', [$this, 'load_custom_post_template']);
    }

    private function register_post_types() {
        (new Book())->register();
        (new Chapter())->register();
    }

    private function register_meta_fields() {
        (new ChapterMeta())->register();
    }

    public function load_custom_post_template($template) {
        global $post;

        // Check if the post type matches, e.g., 'book' or 'chapter'
        if ($post->post_type == 'book' && locate_template('single-book.php') != $template) {
            return plugin_dir_path(__FILE__) . 'templates/single-book.php';
        } elseif ($post->post_type == 'chapter' && locate_template('single-chapter.php') != $template) {
            return plugin_dir_path(__FILE__) . 'templates/single-chapter.php';
        }
        return $template;
    }
}

// Initialize the plugin
$bookReaderPlugin = new Plugin();
$bookReaderPlugin->init();
