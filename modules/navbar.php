<?php
//navbar settion manazmant functon here

function nurani_nav_customize($wp_customize){
    // logo section customize function
    $wp_customize -> add_section('nurani_logo',[
        'title' => __('Logo area','nurani-job-bd'),
        'description' => 'You can change your logo',

    ]);
    $wp_customize -> add_setting('nurani_logo_setting',[
        'default' => get_template_directory_uri().'/img/image.png',
        'transport' => 'refresh',
    ]);
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize,'nurani_logo_setting',[
        'label' => 'Logo upload',
        'section' => 'nurani_logo',
        'setting' => 'nurani_logo_setting',
    ]));
    // Menu position function here
    $wp_customize -> add_section('nurani_menu_position',[
        'title' => __('Menu position option','nurani-job-bd'),
        'description' => 'you can choice menu position here',

    ]);
    $wp_customize ->add_setting('nurani_menu_position_setting',[
        'default' => 'right_menu',
    ]);
    $wp_customize -> add_control('nurani_menu_position_setting',[
        'label' => 'Menu position',
        'section' => 'nurani_menu_position',
        'setting' => 'nurani_menu_position_setting',
        'type' => 'radio',
        'choices' => [
            'left_menu' => 'Left menu',
            'right_menu' => 'Defualt menu',
            'center_menu' => 'Center menu',

        ],

    ]);

}
add_action('customize_register','nurani_nav_customize');



// menu section customize function
function nurani_job_bd_setup() {
    register_nav_menus( array(
        'main-menu'   => __( 'Main Menu', 'nurani-job-bd' ),
        'description' => 'you can change position your navbar',
    ) );
}
add_action( 'after_setup_theme', 'nurani_job_bd_setup' );
