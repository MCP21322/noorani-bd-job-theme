<?php
//  log in function
//লগ ইন করার ফাংশন 
include_once('validator.php'); 

function custom_login_form_shortcode(){
    //when user already log in
    //ইউজার যখন লগ ইন করা আছে 
      $is_user_login = new noorani_all_data_validation();
      $is_user_login->noorani_user_logged_in();
    
    
    // form setting here
   $args = array(
        'echo'           => false,
        'redirect'       => home_url('/job-post/'), 
        'form_id'        => 'custom-login-form',
        'label_username' => '', 
        'label_password' => '', 
        'label_remember' => 'মনে রাখুন',
        'label_log_in'   => 'লগইন করুন',
        'remember'       => true,
        'value_remember' => true,
    );
    $form = wp_login_form( $args );
    //error cheack here
    //লগ ইন করার সময় ইউজার নেইম এবং পাসওয়ার্ড খুজে না পেলে ইরর দেখাবে 
    if(isset($_GET['login']) &&  $_GET['login'] == 'failed'){
        $form = $form = '<p style="color:red; font-size:14px;">দুঃখিত! আপনার ইউজার নাম বা পাসওয়ার্ড সঠিক নয়।</p>' . $form;
    }; 
    return '<div class="custom-loging-form">' . $form .'</div>';
    
}  

add_shortcode( 'my_login_form', 'custom_login_form_shortcode' );


