<?php 
//sign up data base make and management

$nootani_job_message = '';

function handle_noorani_job_submission(){
    global $nootani_job_message;

    // চেক করা হচ্ছে ফর্ম সাবমিট হয়েছে কি না
    if(isset($_POST['job_submit'])){
        //নিরাপত্তা নিশ্চিত করা
        $job_title = sanitize_text_field($_POST['job_title']);
        $job_desc = wp_kses_post($_POST['job_desc']);

        // ডাটা অ্যারে সাজানো
        $new_job_array = array(
            'post_title' => $job_title,
            'post_content' => $job_desc,
            'post_status'  => 'pending',
            'post_type' => 'job',
        );
        
        //ডাটাবেসে ইনসার্ট করা
        $post_id = wp_insert_post($new_job_array);

        if($post_id && !is_wp_error($post_id)){
           // সাকসেস হলে পেজ রিফ্রেশ করে ইউআরএল-এ একটা মেসেজ পাঠাবে
           wp_redirect(add_query_arg('job_success','1', home_url('/')));
           exit;
        }
    
    }
}

add_action('template_redirect', 'handle_noorani_job_submission');

