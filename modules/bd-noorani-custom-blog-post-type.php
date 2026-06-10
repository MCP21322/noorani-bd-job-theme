<?php 
// bd noorani job theme custom blog post type function here
//কাস্টম পোস্ট টাইপ ফাংসন বা 
?>
<?php 
function bd_noorani_job_theme_custom_blog_post_type() {

    $labels = array(
        'name'               => 'Blog Posts',
        'singular_name'      => 'Blog',
        'menu_name'          => 'Blog Section',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Blog Post',
        'edit_item'          => 'Edit Blog Post',
        'all_items'          => 'All Blog Posts',
    );

    $args = array(
        'labels'             => $labels, 
        'public'             => true,
        'has_archive'        => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-welcome-write-blog',
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'rewrite'            => array('slug' => 'blog'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), 
        'taxonomies'         => array('category', 'post_tag'),
    );

    register_post_type( 'blog_post', $args );
}
add_action( 'init', 'bd_noorani_job_theme_custom_blog_post_type' );



