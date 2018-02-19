<footer id ="footer-layout1" class="footer2">
    <?php if (wp_organic_footer_top()):?>
        <div id="cshero-footer-top">
            <div class="container">

                <div class="row">

                    <div class="footer-top-2 col-xs-12 col-sm-4 col-md-4 col-lg-5"> <div class="footer-top-2-inner"><?php dynamic_sidebar('footer-top-6'); ?></div></div>
                    <div class="footer-top-3 col-xs-12 col-sm-4 col-md-4 col-lg-3"><?php dynamic_sidebar('footer-top-7'); ?></div>
                    <div class="footer-top-4 col-xs-12 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar('footer-top-8'); ?></div>
                </div>
                <div class="row">
                    <div class="footer-top-bottom col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php dynamic_sidebar('footer-top-9'); ?></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div id="cshero-footer-bottom">
        <div class="row">

            <div class="logo-footer col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php wp_organic_logo_footer();?>

                </a>
            </div>
        </div>
    </div>
</footer><!-- #site-footer -->