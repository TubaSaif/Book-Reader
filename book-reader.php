<?php
/**
 * Plugin Name: Book Reader
 * Description: A plugin to manage books and chapters, link chapters to books, and display them on the frontend.
 * Version: 1.0.0
 * Author: Tuba Saif
 */

if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/vendor/autoload.php';



// Initialize the plugin
use BookReader\Plugin;
function run_book_reader() {
    $plugin = new Plugin();
    $plugin->init();
}
run_book_reader();


// Initialize Main Plugin Class
// use BookReader\Plugin;
// Plugin::get_instance();