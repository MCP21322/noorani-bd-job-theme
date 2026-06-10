<?php
/**
 * Template Name: archive-blog_post page
 */
?>

<?php get_header(); ?>

<section id="blog_archive_area" class="py-5" style="background: #f8faf9;">
    <div class="container">
        <?php //user page, post and widget traker function 
            get_template_part('templet_part/page_breadcrumb');
        ?>
        <div class="row">
            <div class="col-md-9">
                <div class="section-title mb-4" id="archive_job">
                    <h1 class="font-weight-bold" style="border-bottom: 1px solid #ddd; font-size: 31px; padding-bottom: 15px; margin-bottom: 25px;">
                        আমাদের ব্লগ ও ক্যারিয়ার টিপস
                    </h1>
                </div>

                <div class="blog-listing-container">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <div class="blog-card" style="border: 1px solid #ddd; padding: 20px; margin-bottom: 15px; border-radius: 8px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                
                                <h3 style="margin: 0 0 12px 0;">
                                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: #0073aa; font-size: 22px; font-weight: bold;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <h3 class='thumbnail' style="margin: 0 0 12px 0;">
                                    <?php // post thumbnail area ?>
                                    <a href="<?php the_permalink(); ?>" >
                                        <?php if(has_post_thumbnail()): ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium')?>" alt="<?php the_title(); ?>">
                                        <?php else: ?>
                                            <p>no image uploded</p>
                                        <?php endif; ?>
                                    </a>
                                </h3>

                                <div class="blog-content" style="font-size: 15px; color: #0a0707; line-height: 1.6; margin-bottom: 15px;">
                                    <?php 
                        
                                        echo wp_trim_words( get_the_excerpt(), 40, '...' ); 
                                    ?>
                                </div>

                                <div class="blog-footer" style="text-align: right;">
                                    <a href="<?php the_permalink(); ?>" style="background: #0073aa; color: #fff; padding: 6px 20px; border-radius: 4px; text-decoration: none; font-size: 14px; display: inline-block;">বিস্তারিত পড়ুন</a>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php // blog pagination function here ?>
                        <div class="col-md-12 mt-4">
                            <?php 
                                the_posts_pagination(array(
                                    'mid_size' => 2,
                                    'prev_text' => __('« Previous','nurani-job-bd'),
                                    'next_text' => __('Next','nurani-job-bd'),
                                    'screen_reader' => '',
                                ));
                            ?>
                        </div>

                    <?php else : ?>
                        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: #fff;">
                            <p style="margin:0;">দুঃখিত, বর্তমানে কোনো ব্লগ পোস্ট পাওয়া যায়নি।</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-3">
                <aside class="sidebar-area">
                    <?php get_template_part('templet_part/widget_function'); ?>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>




