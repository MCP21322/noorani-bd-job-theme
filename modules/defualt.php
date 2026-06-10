<?php
// defualt function here


function theme_setup_thumbnails() {
    add_theme_support( 'post-thumbnails' );
    // Title function
    add_theme_support('title-tag');
    //custom blog post thunbnails support function
    add_post_type_support( 'blog_post','thumbnail' );
    add_image_size( 'job-thumb', 300, 200, true );
}
add_action( 'after_setup_theme', 'theme_setup_thumbnails' );


//সাধারণত PHP কোড যখনই কোনো echo, print বা HTML পায়, সেটি সাথে সাথে সার্ভার থেকে ব্রাউজারে পাঠিয়ে দেয়।
//ob_start();

// Excerpt length function
function custom_excerpt_length($length){
    return 10;
}
add_filter('excerpt_length','custom_excerpt_length',9999);

// Excerpt function here

function text_excerpt_more($more){
    global $post;

    if(! is_object($post)){
        return $more;
    }
        
    return '<a class ="read_more" href="'.get_permalink($post->ID).'">'.'Read More'. '</a>';
}

add_filter('excerpt_more','text_excerpt_more');


