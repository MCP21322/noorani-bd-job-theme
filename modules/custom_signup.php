<?php // sign up function ?>
<?php 
include_once('validator.php');
include_once('handle_custom_signup_function.php');

function custom_registration_form(){
    //user olready loged in 
    //ইউজার ইতিমধ্যে লগ ইন আছে কি না
    if(is_user_logged_in()) {
        return '<p>আপনি ইতিমধ্যে লগইন করা আছেন।</p>';
    };
    
    ob_start();
    // error check
    if(isset($_GET['signup_error'])){
        $error = $_GET['signup_error'];
        
        $message = '';

        if($error == 'user_exists') $message = 'ইউজারনেমটি ইতিমধ্যে ব্যবহৃত হয়েছে।';
        if($error == 'email_exists') $message = 'ইমেইলটি ইতিমধ্যে ব্যবহৃত হয়েছে।';
        if($error == 'failed') $message = 'রেজিস্ট্রেশন ব্যর্থ হয়েছে, আবার চেষ্টা করুন।';
        if($message){
            echo '<p style="color: #d9534f; background: #f2dede; padding: 10px; border: 1px solid #ebccd1; border-radius: 4px; margin-bottom: 15px;">' . $message . '</p>';
        }
    };
    ?>
    <form action="" method="POST" class="signup-modal-form">
        <p><input type="text" name="username" placeholder="ইউজার নেইম" required></p>
        <p><input type="email" name='email' placeholder="ইমেইল " required></p>
        <p><input type="password" name='password' placeholder="পাসওয়ার্ড" required></p>
        <p><input type="submit" name="submit_signup" value="সাইন আপ অ্যান্ড পোস্ট করুন" id='noorani_submit_signup'></p>
    </form>
    <?php
    return ob_get_clean();
}

add_shortcode('custom_signup', 'custom_registration_form');

if(isset($_POST['submit_signup'])){

    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    //when submit the form  
    handle_custom_signup($username,$email,$password);
}

 