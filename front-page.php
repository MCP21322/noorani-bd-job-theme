<?php
/**
 * Template Name: Home page
 */
get_header(); ?>
    <section id="body_area">
        <div class="container">
            <?php //user page, post and widget traker function 
            get_template_part('templet_part/page_breadcrumb');
            ?>
            <div class="row">
                <?php // home page html scrima ?>
                <div class="col-md-9" id="colum-9">
                    <h1>নূরানী চাকরী</h1>
                    <div class="jobs_container">
                        <?php echo do_shortcode('[noorani_all_jobs]'); ?>
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