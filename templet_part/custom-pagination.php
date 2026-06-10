<div class="custom-pagination">
    <?php 
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('« Previous','nurani-job-bd'),
            'next_text' => __('Next','nurani-job-bd'),
            'screen_reader' => '',

        ));
    ?>

</div>