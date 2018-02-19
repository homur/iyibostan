<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="<?php wp_organic_main_class(); ?> pt-single-post <?php if(!wp_organic_post_full_width()) { echo 'post-sidebar'; } ?>">
        <div class="row">
            <div class="single-post-wrap clearfix">
                <div class="single-post-inner <?php if(wp_organic_post_sidebarleft()) { echo ' sidebar-left-active'; } ?> clearfix">
                    <div id="primary" class="<?php if(wp_organic_post_full_width()){ echo  'col-xs-12 col-sm-12 col-md-12 col-lg-12 full-width';} else { echo 'col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active' ;} ?>">
                        <div id="content" role="main">
                            <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
                            <?php comments_template( '', true ); ?>
                        </div><!-- #content -->

                    </div><!-- #primary -->
                    <?php if (!wp_organic_post_full_width()):?>
                    <div id="sidebar" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 <?php if(wp_organic_post_full_width()=='1') echo 'hidden-sidebar'; ?>">
                        <?php get_sidebar(); ?>
                    </div><!-- #sidebar -->
                     <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>