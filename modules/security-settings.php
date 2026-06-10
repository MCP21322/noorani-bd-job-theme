<?php
//mata data remove
remove_action('wp_head','wp_generator');

//RSS field remove
add_filter('the_generator','__return_empty_string');

//css and js version query string remove
function bd_noorani_remove_wp_version_strings($src){
    if(strpos($src, 'ver='.get_bloginfo('version'))){
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter( 'style_loader_src', 'bd_noorani_remove_wp_version_strings', 9999 );
add_filter( 'script_loader_src', 'bd_noorani_remove_wp_version_strings', 9999 );


// log in error masses hiden function here
add_filter('login_errors','filter_login_errors' );

function filter_login_errors() {
	return 'ভুল ইউজারনেম বা পাসওয়ার্ড!';
};


// comments sanitize function
function Noorani_comment_sanitize($commentdata){
    $commentdata['comment_author'] = sanitize_text_field($commentdata['comment_author']);
    $commentdata['comment_content'] = wp_filter_post_kses($commentdata['comment_content']);
    return $commentdata;
}
add_filter('preprocess_comment', 'Noorani_comment_sanitize');

//  off the comments text form post comments
//কমেন্টস লেখা বন্দ করা হয়েছে 
remove_filter( 'comment_text', 'make_clickable', 9 );

