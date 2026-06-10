<?php

include_once('validator.php');
include_once('insert_data_in_db.php');

// insert data in database table
function noorani_contact_us_form_handler(){
    if(isset($_POST['send_mail_btn'])){
        
        //  Security check 
        if(! isset($_POST['bd_noorani_nonce']) || ! wp_verify_nonce($_POST['bd_noorani_nonce'], 'bd_noorani_contact_action')){
            token_check();   
        }

        // User data collecting
        $user_name = ($_POST['user_name']);
        $user_email = ($_POST['user_email']);
        $user_message_area = ($_POST['message']);

        $user_data_sanitize = [
            'user_name' => $user_name,
            'user_email' =>$user_email,
            'user_message_area' => $user_message_area,
        ];
        
        $noorani_user_sanitize_obj = new noorani_all_data_validation(); 
        $noorani_user_sanitize_obj-> noorani_user_sanitize($user_data_sanitize);


        // User email check
        $noorani_email_input_obj = new noorani_all_data_validation();
        if(! $noorani_email_input_obj-> noorani_mail_validator($user_email)){
            return '<p style="color:red;">দুঃখিত, আপনার ইমেইল অ্যাড্রেসটি সঠিক নয়।</p>';
            
        }

        // Empty check 
        $noorani_user_data_array = [
            'input_user_name' => $user_name,
            'input_user_email' => $user_email,
            'input_message_area' => $user_message_area,
        ];
        $noorani_input_empty_check_obj = new noorani_all_data_validation(); 
        if($noorani_input_empty_check_obj-> empty_input_check($noorani_user_data_array)){
            return '<p style="color:red;">সবগুলো ফিল্ড সঠিকভাবে পূরণ করুন।</p>';   
            
        }

        
        // make JSON data
        $noorani_mail_job_data = json_encode([
            'to'      => get_option('admin_email'),
            'subject' => 'নতুন মেসেজ: ' . $user_name,
            'body'    => "নাম: $user_name \nইমেল: $user_email \nবার্তা: $user_message_area\n", 
            'status' => 'pending',
        ]);

        // Insert message in database table
        $noorani_user_data = new noorani_insurt_data_in_database("contact_messages");
        $id = $noorani_user_data->noorani_data_insert([
           "user_message" => $noorani_mail_job_data,
        ]);
        
        if ($id ) {
            echo '<p style="color:green;"> মেসেজ সফলভাবে পাঠানো হয়েছে </p>';
        }else{
            global $wpdb;
            echo '<p style="color:red;"> ডেটাবেজে সমস্যা হয়েছে! </p>';
            echo "আসল সমস্যা: " . $wpdb->last_error; 
        }
    }
    return;
}
