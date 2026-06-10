<?php
/**
 * Template Name: contact us page
 */
?>

<?php get_header(); ?>
<div class="contact my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <h1 id="contact-title" class="text-center mb-4">আমাদের সাথে যোগাযোগ করুন</h1>
                
                <form id="contact-form" action="" method='POST' class="p-4 shadow-sm rounded bg-white">
                    <?php wp_nonce_field( 'bd_noorani_contact_action', 'bd_noorani_nonce' ); ?>
                    
                    <div class="mb-3">
                        <input type="text" name='user_name' class="form-control form-control-lg" placeholder="আপনার নাম" required>
                    </div>
                    
                    <div class="mb-3">
                        <input type="email" name='user_email' class="form-control form-control-lg" placeholder='আপনার ইমেইল' required>
                    </div>
                    
                    <div class="mb-3">
                        <textarea name="message" id="use-message" class="form-control form-control-lg" rows="5" placeholder="আপনার মেসেজ..." required></textarea>
                    </div>
                    
                    <button type="submit" name="send_mail_btn" class="btn btn-primary btn-lg w-100">মেসেজ পাঠান</button>
                    
                    <div class="form-message-output mt-3 text-center">
                         <?php 
                            $magess = noorani_contact_us_form_handler();
                            echo $magess;
                        ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


