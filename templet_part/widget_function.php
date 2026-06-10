<p>This is site ber area</p>
<?php if(is_active_sidebar('main_sidebar_1')): ?>
    <div id="secondary " class='p-3 bg-light border rounded'>
        <?php dynamic_sidebar('main_sidebar_1');  ?>
    </div> 
<?php endif;?>