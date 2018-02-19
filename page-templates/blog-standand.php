<?php
/**
 * Template Name: Blog Standard
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */
get_header();

?>
<div id="page-blog-standard" class="page-blog-standard <?php if (wp_organic_sidebar_left_active()) { echo 'sidebar-left-active'; } ?>">
    <div class="container">
        <div class="row">
            <section id="primary" class="<?php if($wp_organic_meta->_cms_show_sidebar == '1') { echo 'col-xs-12 col-sm-8 col-md-8 col-lg-9 sidebar-active'; }else  { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12 page-full-width'; } ?>">
                    <?php  wp_organic_blog_block();?>
            </section><!-- #primary -->
            <?php if(wp_organic_show_sidebar()) { ?>
                <div id="sidebar" class=" main-sidebar-3 col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

