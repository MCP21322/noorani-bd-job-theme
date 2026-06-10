<?php 
//mail validation function
class noorani_all_data_validation{
    //mail validator method
    public function noorani_mail_validator($user_email){
        if(! is_email($user_email)){
            return false;
        }
        return true;
    }

    //Empty check input method
    public function empty_input_check(array $data_array){
        foreach($data_array as $value){
            if(empty($value)){
                return true;
            }
            return false;
        }
    }


    // user logged in validation method
    public function noorani_user_logged_in(){
        if(is_user_logged_in()){
            $current_user = wp_get_current_user();
             return sprintf(
                '<p class="login-status">আপনি <strong>%s</strong> হিসেবে লগইন আছেন। <a href="%s">ড্যাশবোর্ডে যান</a></p>',
                esc_html($current_user->display_name),
                esc_html(home_url('/post_job/')),

            );
        }
    }

    // user sign up validation method
    public function noorani_user_sanitize(array $data){

        $sanitize_data = [];
        foreach($data as $key => $value ){
            if($key === 'user_email'){
                $sanitize_data[$key] = sanitize_email($value);
            }elseif($key === 'user_message_area' || $key === 'message_area'){
                $sanitize_data[$key] = sanitize_textarea_field($value);
            }else{
                $sanitize_data[$key] = sanitize_text_field($value);
            }
        }
        
        
        return $sanitize_data;
    }
    //hassh password
    public function hash_password($password){
        return $hass_password = wp_hash_password($password);
    }


}












