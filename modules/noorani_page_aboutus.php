<?php 
//all number show for hire and job post shortcode function 

function bd_job_about_statistics_func() {
    // get dynamic number from database
    $count_jobs = wp_count_posts('job')->publish;
    $success_hires = get_option('successful_hires_count', 0);
    $partners = 500; 


    ob_start(); ?>

    <div class="row" id='author_img'>
        <div class="col-md-6" id='teem_membur_picture1'>
            <div class="mahady_pictur" style="background: green;  border-radius: 50%;width: 16%;height: 100%;text-align: center;margin-left: 40%; ">
                mahady
            </div>
            <p style="color:green;font-weight: bold;">MD: Mahady hasan as a Theme devloper</p>
        </div>
        <div class="col-md-6" id='teem_membur_picture2'>
            <div class="bellal_picture" style="background: green;  border-radius: 50%;width: 16%;height: 100%;text-align: center;margin-left: 40%; ">
                bellal
            </div>
            <p style="color:green;font-weight: bold;">MD: Bellal hosen as a Marketer</p>
        </div>
    </div>
    
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-3">
            <div class="stat-box" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="color: #0073aa; font-size: 35px; font-weight: bold; margin-bottom: 5px;">
                    <span id='job_count' data-target='<?php echo number_format_i18n($count_jobs); ?>'>0+</span>
                </h3>
                <p style="margin: 0; color: #666; font-size: 16px;">পোস্ট করা জব</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="stat-box" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="color: #28a745; font-size: 35px; font-weight: bold; margin-bottom: 5px;">
                    <span id='all_appointment' data-target='<?php echo number_format_i18n($success_hires); ?>'>0+</span>
                </h3>
                <p style="margin: 0; color: #666; font-size: 16px;">সফল নিয়োগ</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="stat-box" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="color: #ffc107; font-size: 35px; font-weight: bold; margin-bottom: 5px;">
                    <span id='company_patner' data-target='<?php echo number_format_i18n($partners); ?>'>0<p>+</p></span>
                </h3>
                <p style="margin: 0; color: #666; font-size: 16px;">কোম্পানি পার্টনার</p>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('about_statistics', 'bd_job_about_statistics_func');








