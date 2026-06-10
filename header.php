<?php
// This is a hearder area
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('Charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header id="header">
        <div class="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><p><?php echo get_theme_mod('top_header_text_setting'); ?></p></div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php //বর্তমান টেমপ্লেট ফাইল চেক কর হয়েছে   ?>
            <?php 
            if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
                global $template;
                echo '<div style="background:black; color:white; padding:10px;">বর্তমান টেমপ্লেট ফাইল: ' . basename($template) . '</div>';
            }
            ?>
        </div>
        <div id="header_area">
            <div class="container">
                <div class="row  <?php echo get_theme_mod('nurani_menu_position_setting'); ?>" id="menu_logo_area">   
                    <div id = "logo_col" class="col-md-3 logo_col">
                        <?php 
                        $logo_link = esc_url(home_url('/'));
                        $logo_url = get_theme_mod('nurani_logo_setting');
                        $default_logo = get_template_directory_uri() . '/img/image.png';
                        ?>
                        <a href="<?php echo $logo_link; ?>" rel="home">
                            <img src="<?php echo $logo_url ? $logo_url : $default_logo; ?>" alt="Logo">
                        </a>
                    </div>
                    <div id = "menu_col" class="col-md-6 menu_col">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'menu_id'        => 'nav',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </div>
                    <div id = "login_col" class="col-md-3">
                        <div class="sign_up_template">
                            <?php get_template_part('templet_part/sign_up'); ?>
                        </div>
                        <div class="log_in_template">
                            <?php get_template_part('templet_part/log_in'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>