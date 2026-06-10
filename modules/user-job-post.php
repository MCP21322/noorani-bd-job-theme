<?php
// user job post short code make 
include_once('validator.php');

function user_job_post_shortcode(){
    if(!is_user_logged_in()){
        return '<p>দয়া করে আগে লগইন করুন।</p>';
    }
    
    ob_start(); 
    ?>
    <div class="job-form-wrapper">
        <form action="" method="POST">
            <p><input type="text" name="job_title" placeholder="চাকরির শিরোনাম" style="width:100%;" required></p>
            <p><textarea name="job_description" placeholder="আপনার মাদ্রাসার সম্পর্কে বিস্তারিত" style="width:100%;" required></textarea></p>
            <p><input type="text" name="company_name" placeholder="মাদ্রাসার নাম" style="width:100%;" required></p>
            <p><input type="text" name="job_location" placeholder="লোকেশন" style="width:100%;" required></p>
            <p><input type="text" name="education" placeholder="শিক্ষকের যোগ্যতা" style="width:100%;" required></p>
            <p><input type="tel" name="phone_number" placeholder="মোবাইল বাম্বার"  style="width:100%;" required></p>
            <p><input type="submit" name="submit_job" value="পাবলিশ করুন" id='noorani_job_submit'></p>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'user_job_post', 'user_job_post_shortcode' );


add_action('init', 'usr_job_post_handler');
// handle user form submition 
function usr_job_post_handler(){
  if(isset($_POST['submit_job']) && is_user_logged_in()){
    $job_title = ($_POST['job_title']);
    $job_location = ($_POST['job_location']);
    $job_desc = ($_POST['job_description']);
    $education = ($_POST['education']);
    $phone_number = ($_POST['phone_number']);
    $company_name = ($_POST['company_name']);
    
    $noorani_user_job_post = [
        'job_title' => $job_title,
        'job_location' => $job_location,
        'job_desc' => $job_desc,
        'education' => $education,
        'phone_number' => $phone_number,
    ];

    $user_job_post_result = noorani_user_sanitize(noorani_user_job_post);

    // make new post
    $new_job = array(
        'post_title' => $job_title,
        'job_location' => $job_location,
        'post_content' => $job_desc,
        'education'     => $education,
        'phone_number'  => $phone_number,
        'post_status'   => 'pending',
        'post_type'     => 'job',

    );
    $post_id = wp_insert_post($new_job);

    if($post_id){
        //mata data and companey name store
        update_post_meta( $post_id, 'company_name', $user_job_post_result[5]);
        update_post_meta( $post_id, 'job_location', $user_job_post_result[1]);

        // redirect if success
        wp_redirect(add_query_arg('job_success', '1', home_url('/job-post/')));
        exit;
    };

  }; 

}



