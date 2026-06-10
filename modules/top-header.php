<?php

// top header customize all function

function top_header_customize($wp_customize){
    // top header text customize code
    $wp_customize -> add_section('top_header_text_section',[
        'title' => __('Top header text section','nurani job bd'),
        'description' => 'You can change top header text',
    ]);
    $wp_customize -> add_setting('top_header_text_setting',[
        'default' => 'Top header text',
        'transport' => 'refresh',
    ]);

    $wp_customize -> add_control(new WP_Customize_Control($wp_customize,'Top header text control',[
        'label'    => __( 'Top header text', 'nurani job bd' ),
        'section'  => 'top_header_text_section',
        'settings' => 'top_header_text_setting',
    ]));
    // Top header color setting hear
    $wp_customize -> add_section('top_header_background_color_section',[
        'title' => __('Top header background color section','nurani job bd'),
        'description' => 'You can change background color',

    ]);
    $wp_customize -> add_setting('top_header_background_color_setting',[
        'default' => ' #003049',
        'transport' => 'refresh',
    ]);
    $wp_customize -> add_control(new WP_Customize_Color_Control($wp_customize,'top_header_background_color_setting',[
        'label' => __('Top header bacground color','nurani-job-bd'),
        'section' => 'top_header_background_color_section',
        'setting' => 'top_header_background_color_setting',
    ]));

}
add_action('customize_register','top_header_customize');

// Top header backgroun color css id customize code 
function my_custom_navbar_css() {
    // get_theme_mod( 'setting_id', 'default_value' )
    $navbar_bg = get_theme_mod( 'top_header_background_color_setting' ); 
    ?>
    <style type="text/css">
        #header .top_header { 
            background-color: <?php echo esc_attr( $navbar_bg ); ?> !important; 
        }
    </style>
    <?php
}
add_action( 'wp_head', 'my_custom_navbar_css' );