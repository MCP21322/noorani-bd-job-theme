<!-- log in HTML code start here -->
<?php if(! is_user_logged_in()): ?>
        <div class="login-trigger-area">
            <button id="loginBtn" class="btn-login">লগইন করুন</button>
        </div>

        <div id="loginModal" class="login_modal">
            <div class="login_modal-content">
                <span class="login_close-btn">&times;</span>
                
                <h2>মাদ্রাসা পোর্টাল লগইন</h2>
                
                <?php echo do_shortcode('[my_login_form]'); ?>
                
                <p class="switch-text">
                    অ্যাকাউন্ট নেই? <a href="#" id="switchToSignup">রেজিস্ট্রেশন করুন</a>
                </p>
            </div>
        </div>
<?php endif; ?>

<!-- log in HTML code end here -->