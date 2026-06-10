<?php
// user page, post, widget traking function here

function noorani_get_breadcrumb(){
    echo '<a href="'.home_url() .'" rel="nofollow">হোম </a>';
    if(is_single()){
        echo " &nbsp&nbsp » &nbsp&nbsp ";
        if(get_post_type() == 'job'){
            echo '<a href="'.get_post_type_archive_link('job').'">চাকরী </a> ';
            echo " &nbsp&nbsp » &nbsp&nbsp ";
            the_title();
        }elseif(get_post_type() == 'blog_post'){
            echo '<a href="' . get_post_type_archive_link('blog') . '">ব্লগ</a>';
            echo " &nbsp&nbsp » &nbsp&nbsp ";
            the_title();
        }else{
            the_category('&bull;');
            echo " &nbsp&nbsp » &nbsp&nbsp ";
            the_title();
        }

    }elseif(is_post_type_archive()){
        echo " &nbsp&nbsp » &nbsp&nbsp ";
        echo post_type_archive_title('', false );
    }elseif(is_page()){
       echo " &nbsp&nbsp » &nbsp&nbsp ";
        echo the_title();
    }
};



