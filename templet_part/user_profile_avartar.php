<?php
// user profile avartar genarator 
?>
<?php if(is_user_logged_in()) :
    //user infomation
    $current_user = wp_get_current_user();

    //user first name slice 
    $user_first_letter = strtoupper(substr($current_user->display_name,0,1));

    //fiend user profile link
    $user_avatar = get_avatar_url( $current_user->ID, )
    

?>
<?php else: $current_user = ''; endif; ?>

<div class="user_profile_wrapper">
    <a href="<?php echo esc_html( home_url('/job-post/') ); ?>" class='profile_btn'>
        <?php // user profile blank or not  ?>
        <?php if(strpos($user_avatar, 'mysteryman' ) !== false || strpos($user_avatar, 'blank') !== false  ): ?>
            <span class='profile-letter'><?php echo esc_html( $user_first_letter ); ?></span> 
        <?php else: ?>  
            <img src="<?php echo esc_url( $user_avatar ) ?>" alt="profile" class='profile-img'>
        <?php endif; ?>
    </a>
</div>

