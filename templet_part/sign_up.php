
 <!-- sign up HTML here start -->
<!-- লগিন আবস্তায় লগ আউট বাটন দেখাবে --> 
<?php if(is_user_logged_in()) : ?>
    <div class="profile_wrapper">
        <div class="logout_div">
            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn-logout">লগ আউট</a>
        </div>
        <?php // user avatar profile genaretor ?>
        <?php  get_template_part('templet_part/user_profile_avartar'); ?>

    </div>

<?php else : ?>
    <!--<div class="signup_area">-->
        <button id="signupBtn" class="btn-signup">সাইন আপ</button>
    <!--</div>-->
    
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>মাদ্রাসা পোর্টাল সাইন আপ করুন</h2>
            
            <?php echo do_shortcode('[custom_signup]'); ?>
            
            <p>ইতিমধ্যেই অ্যাকাউন্ট আছে? <a href="#" id="switchToLogin">লগ ইন</a></p>
        </div>
    </div>
<?php endif; ?>
<!-- sign up HTML end here -->
