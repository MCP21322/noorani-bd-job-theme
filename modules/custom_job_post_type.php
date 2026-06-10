<?php 
include_once('validator.php');
// custom admin noorani job post type functon here
//অ্যাডমিন পেনেলে জব পোস্ট করার জন্য একটা ফিল্ড ফাংশন 
function custom_post_type_jobs() {

    $labels = array(
        'name'                  => 'Jobs',
        'singular_name'         => 'job',
        'menu_name'             => 'Job',
        'add_new'               => 'Add New Job',
        'add_new_item'          => 'Add New Job',
        'edit_item'             => 'Edit job',
        'view_item'             => 'View Job',
        'search_items'          => 'Search Jobs',
        'not_found'             => 'No Jobs found',
    );

    $args = array(
        'label'                 => 'Jobs',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, 
        'rewrite'               => array('slug' => 'job'),
        'taxonomies'            => array('category', 'post_tag'),
    );

    register_post_type( 'job', $args );
}
add_action( 'init', 'custom_post_type_jobs', 0 );



//create job post end point for admin 

class job_post_endpoint_for_admin{
    public function __construct(){
        add_action('rest_api_init', array($this, 'register_job_post_endpoint_for_admin'));

    }

    public function register_job_post_endpoint_for_admin(){
        register_rest_route('custom/v1', '/job-post', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_job_post_request_for_admin'),
            'permission_callback' => array($this, 'job_post_endpoint_permission_check'),
        ));
    }
// permission check for job post route
    public function job_post_endpoint_permission_check($request){
        $api_key = $request->get_header('x-api-key');
        $secret_key = 'your_secret_key'; // Replace with your actual secret key
        if(!empty($api_key) && $api_key === $secret_key){
            return true;
        }
        if(is_user_logged_in() && current_user_can('manage_options')){
            return true;
        }
        if(is_user_logged_in() && current_user_can('edit_posts')){
            return true;
        }
        return WP_Error('forbidden', 'You do not have permission to access this endpoint', array('status' => 403));
    }


    public function handle_job_post_request_for_admin(WP_REST_Request $request){
        $title = ( $request->get_param('title'));
        $content = ($request->get_param('content'));
        $category = ($request->get_param('category'));
        $tags =($request->get_param('tags'));
        $thumbnail = ($request->get_param('thumbnail'));;
        //data validation
        $validator = new noorani_all_data_validation();
        $validate_data = $validator->noorani_user_sanitize([
            'title' => $title,
            'content' => $content,
            'category' => $category,
            'tags' => $tags,
            'thumbnail' => $thumbnail,
        ]);
        //create a new job post
        $new_post = [
            'post_title' => $validate_data['title'],
            'post_content' => $validate_data['content'],
            'post_status' => 'publish',
            'post_type' => 'job',
            'post_category' => $validate_data['category'],
            'post_tags' => $validate_data['tags'],
            'post_thumbnail' => $validate_data['thumbnail'],
        ];

        //insert the post into the database
        $post_id = wp_insert_post($new_post);
        if(is_wp_error($post_id)){
            return new WP_Error('post creation failed', 'Failed to create job post', array('status' => 500));
        }
        return new WP_REST_Response(array(
            'message' => 'job post created successfully',
            'post_id' => $post_id,
        ), 201);

    }


}








