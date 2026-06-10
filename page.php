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
                </div>
                <div class="col-md-3">
                    <?php if(is_active_sidebar('main_sidebar_1')) : ?>
                        <div id="secandary" class="widget_area">
                              <?php // when open the contact us page then hidden the sidebar?>
                            <?php if ( ! is_page('contact') ) : ?>
                                <?php dynamic_sidebar('main_sidebar_1');  ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>    
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

    <?php wp_footer(); ?>
</body>
</html>