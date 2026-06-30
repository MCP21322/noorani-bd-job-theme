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
       <div class="container py-4">
           <div class="row align-items-center">

                <div id="serching_widget" class="col-12 col-md-6 searching_widget mb-3 mb-md-0">
                    <h3 class="m-0">serch widget area</h3>
                </div>

                <div class="col-6 col-md-3 sign_up_template">
                    <?php get_template_part('templet_part/sign_up'); ?>
                </div>
                
                <div class="col-6 col-md-3 log_in_template">
                    <?php get_template_part('templet_part/log_in'); ?>
                </div> 
                
            </div>
        </div>
        <div id="header_area">
            <div class="container">
                <div class="row  <?php echo get_theme_mod('nurani_menu_position_setting'); ?>" id="menu_logo_area">   
                    <div id = "logo_col" class="col-md-4 logo_col">
                        <?php 
                        $logo_link = esc_url(home_url('/'));
                        $logo_url = get_theme_mod('nurani_logo_setting');
                        $default_logo = get_template_directory_uri() . '/img/image.png';
                        ?>
                        <a href="<?php echo $logo_link; ?>" rel="home">
                            <img src="<?php echo $logo_url ? $logo_url : $default_logo; ?>" alt="Logo">
                        </a>
                    </div>

                  <div id="menu_col" class="col-md-8 menu_col">
                        <button class="menu-toggle-btn d-md-none" type="button" aria-label="Toggle navigation">
                            <span class="hamburger-bar"></span>
                            <span class="hamburger-bar"></span>
                            <span class="hamburger-bar"></span>
                        </button>

                        <div class="main-navigation-wrapper">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'main-menu',
                                'menu_id'        => 'nav',
                                'container'      => false,
                                'fallback_cb'    => false,
                            ]);
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>