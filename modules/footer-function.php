<?php
//footer customaize function here
function footer_section_cutomize_function($wp_customize){
    $wp_customize -> add_section('nurani_footer_section',[
        'title' => __('Footer option', 'nurani-job-bd'),
        'description' => 'If you interested to change your footer text',
    ]);
    $wp_customize -> add_setting('nurani_footer_setting',[
        'default' => '&Copy; Copy wright 2026 | Mahady hasan',
    ]);
    $wp_customize -> add_control('nurani_footer_setting',[
        'label' => 'Copy Write text',
        'description' => 'you can change it',
        'section' => 'nurani_footer_section',
        'setting' => 'nurani_footer_setting',
    ]);
}
add_action('customize_register', 'footer_section_cutomize_function');