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
        add_filter('template_include', [$this, 'load_custom_post_template']);
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
    
        // Check if we are on a single book page and load the custom single-book template
        if (is_singular('book') && locate_template('single-book.php') != $template) {
            return plugin_dir_path(dirname(__FILE__)) . '/templates/single-book.php';
        }
    
        // Check if we are on a single chapter page and load the custom single-chapter template
        if (is_singular('chapter') && locate_template('single-chapter.php') != $template) {
            return plugin_dir_path(dirname(__FILE__)) . '/templates/single-chapter.php';
        }
    
        // Check if we are on an archive page for books and load the custom archive-book template
        if (is_post_type_archive('book') && locate_template('archive-book.php') != $template) {
            return plugin_dir_path(dirname(__FILE__)) . '/templates/archive-book.php';
        }
    
        // Return the default template if no custom template applies
        return $template;
    }
    
    
}

// Initialize the plugin
$bookReaderPlugin = new Plugin();
$bookReaderPlugin->init();
