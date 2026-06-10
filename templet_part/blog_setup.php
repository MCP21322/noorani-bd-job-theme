<?php 
    if(have_posts()) : 
        while(have_posts()) : the_post(); 
?>
<div id="blog_area">
    <div id="post_thumbnail">
        <a class="noorani_post_thumbnail" href="<?php the_permalink() ?>"><?php echo the_post_thumbnail('post-thumbnails') ?></a>
    </div>
    <div class="post_details_area">
        <h2><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
            <?php  the_excerpt(); ?>
    </div>
</div>

<?php
 endwhile;
else:
    _e( 'Not post found');
                
endif;
?>





