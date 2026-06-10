<?php 

//register all widget function

function noorani_theme_sidebar_registration() {
    //main sidebar register here
    register_sidebar( array(
        'name'          => __( 'Main sidebar', 'nurani-job-bd' ),
        'id'            => 'main_sidebar_1',
        'description'   => __( 'এখানে উইজেট যোগ করুন।', 'nurani-job-bd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    //Footer sidebar function here
    register_sidebar(array(
        'name'    => __('Footer 1','nurani-job-bd'),
        'id'      =>'footer_id_1',
        'description'   => __( 'এখানে ফুটার যোগ করুন।', 'nurani-job-bd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
       register_sidebar(array(
        'name'    => __('Footer 2','nurani-job-bd'),
        'id'      =>'footer_id_2',
        'description'   => __( 'এখানে ফুটার যোগ করুন।', 'nurani-job-bd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
       register_sidebar(array(
        'name'    => __('Footer 3','nurani-job-bd'),
        'id'      =>'footer_id_3',
        'description'   => __( 'এখানে ফুটার যোগ করুন।', 'nurani-job-bd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

}
add_action( 'widgets_init', 'noorani_theme_sidebar_registration' );



