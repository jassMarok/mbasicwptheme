<?php while (have_posts()): the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <?php
    if (has_post_thumbnail()):
        the_post_thumbnail('large');
    endif;
    ?>

    <?php the_content(); ?>

<?php endwhile; ?>
