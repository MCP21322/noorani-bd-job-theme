<?php 
//bd job include custom post types Recent Posts in widget function
//recent_post_show_in_widget

function show_recent_post_in_widget( $query ) {
    if ( ! is_admin() && ! $query->is_main_query() ) {
        
        if ( $query->get('post_type') === 'nav_menu_item' ) {
            return;
        }

        if ( $query->get('posts_per_page') == 5 ) {
             $query->set( 'post_type', array( 'job', 'blog_post' ) );
        }
    }
}
add_action( 'pre_get_posts', 'show_recent_post_in_widget' );

