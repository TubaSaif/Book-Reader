<?php
get_header();

while (have_posts()) : the_post();
    the_title('<h1>', '</h1>');
    the_content();
    

    $current_book = get_post_meta(get_the_ID(), '_linked_book', true);

    $chapters = get_posts([
        'post_type' => 'chapter',
        'meta_key' => '_linked_book',
        'meta_value' => $current_book,
        'orderby' => 'date',
        'order' => 'ASC'
    ]);

    $current_index = array_search(get_the_ID(), wp_list_pluck($chapters, 'ID'));

    $prev_chapter = $chapters[$current_index - 1] ?? null;
    $next_chapter = $chapters[$current_index + 1] ?? null;

    if ($prev_chapter) {
        echo '<a href="' . get_permalink($prev_chapter->ID) . '">pppPrevious Chapter</a>';
    }

    if ($next_chapter) {
        echo '<a href="' . get_permalink($next_chapter->ID) . '">Next Chapter</a>';
    }

endwhile;

get_footer();
