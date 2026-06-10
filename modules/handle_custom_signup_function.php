<?php 

///sign up form handle function here


function handle_custom_signup($username,$email,$password){
    if(isset($_POST['submit_signup'])){
       //create new user 
       $username = $_POST['username'];
       $email  = $_POST['email'];
       $password = $_POST['password'];

        $noorani_user_data_sanitize_array = [
            'username' => $username,
            'email' => $email,
        ];

        $noorani_user_data_array = noorani_user_sanitize($noorani_user_data_sanitize_array);

        //hass password
        $hass_password = hash_password($password);

        //gmail check
        noorani_mail_validator($noorani_user_data_array[0]);


        //current url chacked
        $current_url = wp_get_referer() ? wp_get_referer() : home_url();
        
        // check user name is already exsit
        if(username_exists($noorani_user_data_array[0])){
            wp_redirect(add_query_arg('signup_error', 'user_exists',$current_url));
            exit;
        };
        // check email is already exsit
        if(username_exists($noorani_user_data_array[1])){
            wp_redirect(add-add_query_arg('signup_error','email_exists', $current_url ));
            exit;
        }
        
        $user_id = wp_create_user($noorani_user_data_array[0], $hass_password, $noorani_user_data_array[0]);

        // if not error
        if(!is_wp_error($user_id)){
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url('/job-post/'));
            exit;
        }else{
            error_log( $user_id->get_error_message());
        }

    };
    
};















