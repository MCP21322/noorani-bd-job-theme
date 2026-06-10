<?php
/*
* This is a header area
 */
get_header(); ?>

    <section id="body_area">
        <div class="container">
            <div class="row">
                <div class="col-md-9" id="colum-9">
                    <?php get_template_part('templet_part/blog_setup'); ?>

                </div>
                <div class="col-md-3">
                    <?php // widget loaded on home page ?>
                   <div id="secondary">
                        <?php dynamic_sidebar('main_sidebar_1');  ?>
                    </div> 
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

