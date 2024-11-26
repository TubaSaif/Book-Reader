<?php
/* Template Name: Books List */

// Get header
get_header(); ?>

<div class="book-list-container">
    <h1>Our Collection of Books</h1>
    
    <?php
    // Custom query to retrieve all "Books" posts
    $books_query = new WP_Query(array(
        'post_type' => 'book', // Assuming your custom post type for books is "book"
        'posts_per_page' => -1 // Retrieve all books
    ));
    
    if ($books_query->have_posts()) :
        echo '<div class="book-grid">';
        while ($books_query->have_posts()) : $books_query->the_post(); ?>
        
            <div class="book-item">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                <?php endif; ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20); // Limit the description length ?></p>
            </div>
        
        <?php endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p>No books found.</p>';
    endif;
    ?>
</div>

<?php
// Get footer
get_footer();
?>
