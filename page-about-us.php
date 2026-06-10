<?php
/**
 * Template Name: About Us Page
 */

get_header(); ?>

<div id="primary" class="content-area container my-5">
    <main id="main" class="site-main">

        <?php
        while ( have_posts() ) :
            the_post();
        ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header mb-4 text-center">
                    <h1 class="entry-title" style="color: #0073aa; font-weight: bold;"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    
                    <div class="wordpress-editor-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="statistics-section mb-5">
                        <?php echo do_shortcode('[about_statistics]'); ?>
                    </div>
                </div>
            </article>

        <?php
        endwhile; // End of the loop.
        ?>

    </main>
</div>

<?php get_footer(); ?>