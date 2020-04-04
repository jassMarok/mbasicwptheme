<?php get_header(); ?>
    <main>
        Home.php
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- post thumbnail -->
                <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(array(120,120)); ?>
                    </a>
                <?php endif; ?>
                <!-- /post thumbnail -->
                
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <!-- /post title -->

                <!-- post details -->
                <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                <span class="author">Published by <?php the_author_posts_link(); ?></span>
                <!-- /post details -->
                <?php edit_post_link(); ?>
            </article>
            <!-- /article -->
        <?php endwhile; ?>

        <?php else: ?>
            <!-- article -->
            <article>
                <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
            </article>
            <!-- /article -->
        <?php endif; ?>
    </main>
<?php get_footer();