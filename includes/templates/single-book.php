<?php
//get_header();

while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>

    <h2>Chapters</h2>
    <ul>
        <?php
        $chapters = new WP_Query([
            'post_type' => 'chapter',
            'meta_query' => [
                [
                    'key' => '_linked_book',
                    'value' => get_the_ID(),
                ]
            ]
        ]);

        while ($chapters->have_posts()) : $chapters->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </ul>
<?php
endwhile;

get_footer();

