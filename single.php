<?php
/*
* This is a header area
 */
get_header(); ?>

    <section id="body_area">
        <div class="container">
            <?php //user page, post and widget traker function 
            get_template_part('templet_part/page_breadcrumb');
            ?>
            
            <div class="row">
                <div class="col-md-9" id="colum-9">
                   <?php get_template_part('templet_part/post_setup'); ?>
                   <div class="comments_area">
                    <?php 
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                                        ?>

                   </div>
                </div>
                <div class="col-md-3">
                    <?php //sidebar area ?>
                    <?php get_template_part('templet_part/widget_function') ?>
                </div>
            </div>
        </div>
    </section>


    <?php 
    /**
     * This is footer area
     */
    get_footer();
    ?>

<?php //wp_footer(); ?>
</body>
</html>