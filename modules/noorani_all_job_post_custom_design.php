<?php 
//noorani all jobs custom design 
//নুরানী "সকল পোস্ট" শেকশনের কার্ড কাস্টম ডিজাই এখানে করা হয়েছে 
function noorani_all_job_post_custom_design(){
    $args = array(
        'post_type' => 'job',
        'posts_per_page' => 10,

    );
    $all_jobs_query = new WP_Query($args);

    ob_start(); 
    ?>
        <div class="noorani_job_listing_container">
            <?php if($all_jobs_query->have_posts()) : ?>
                <?php while($all_jobs_query->have_posts()) : $all_jobs_query->the_post(); ?>
                <?php
                // collect mata data
                $noorani_name = get_post_meta( get_the_ID(), 'noorani_name',true );
                $job_location = get_post_meta( get_the_ID(), 'job_location', true );
                ?>
                <div id='jobs_card_area'>
                    <div class="job-card" id="noorani_job_card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 8px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                        <h3 style="margin: 0 0 10px 0;">
                            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: #0073aa;">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="job-meta" style="font-size: 14px; color: #666;">
                            <strong>প্রতিষ্ঠান:</strong> <?php echo esc_html($noorani_name ? $noorani_name : 'নূরানী মাদ্রাসা'); ?> | 
                            <strong>স্থান:</strong> <?php echo esc_html($job_location ? $job_location : 'বাংলাদেশ'); ?>
                        </div>
                        <div class="job-footer" style="margin-top: 10px; text-align: right;">
                            <a href="<?php the_permalink(); ?>" style="background: #0073aa; color: #fff; padding: 5px 15px; border-radius: 4px; text-decoration: none; font-size: 13px;">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>দুঃখিত, বর্তমানে কোনো নিয়োগ বিজ্ঞপ্তি নেই।</p>
            <?php endif; ?>
        </div>        
    <?php
    return ob_get_clean();
}

add_shortcode('noorani_all_jobs', 'noorani_all_job_post_custom_design');



