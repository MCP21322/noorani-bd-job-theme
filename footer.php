<?php
/**
 * widget and footer here
 */
?>

<footer id="footer_area">
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer_id_1') ?>
                </div>
                <div class="col-md-4">
                   <?php dynamic_sidebar('footer_id_2') ?>
                </div>
                <div class="col-md-4">
                    <a href="contact_form1">  <?php dynamic_sidebar('footer_id_3') ?></a>
                </div>
            </div> 
        </div>
    </section>
    <section id="copy-write">
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                    <p><?php echo get_theme_mod('nurani_footer_setting'); ?></p>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>
</body>
</html>