<?php
// css and js enqueue
// css and js ফাইল গুলোর লিংক করা ফাংশন 

function mahady_css_js_enqueue(){
    //style css enqueue
    wp_enqueue_style( 'mahady_style_css', get_stylesheet_uri());
    //bootstrap.min.css enqueue
    wp_enqueue_style('bootstrap-min-css', get_template_directory_uri().'/css/bootstrap.min.css',array(),'v5.3.8 ','all');
    // coustom.css enqueue
    wp_enqueue_style('coustom-css',get_template_directory_uri().'/css/coustom.css',[],'1.0.0','all');

    wp_enqueue_style('bootstrap-min-css');
    wp_enqueue_style('coustom-css');

    //bootstrap.min.js enqueue
    wp_enqueue_script('bootstrap-min-js',get_template_directory_uri().'/js/bootstrap.min.js',[],'v5.3.8',true);
    // main.js enqueue
    wp_enqueue_script('main-js',get_template_directory_uri().'/js/main.js',array(),'v5.3.8 ',true);

    wp_enqueue_script('bootstrap-min-js');
    wp_enqueue_script('main-js');

}
add_action('wp_enqueue_scripts','mahady_css_js_enqueue');