<?php
/**
 * Template Name: Blog Listing
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */
get_header(); 

?>
<div id="page-blog-listing" class="<?php if (wp_organic_sidebar_left_active()) { echo 'sidebar-left-active'; } ?>">
    <div class="container">
        <div class="row">
            <section id="primary" class="<?php if($wp_organic_meta->_cms_show_sidebar == '1') { echo 'col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active'; }else  { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12 page-full-width'; } ?>">
                <div id="content" role="main">

                    <?php  wp_organic_blog_listing();?>
                
                </div><!-- #content -->
                <?php wp_organic_paging_nav(); wp_reset_query(); ?>
            </section><!-- #primary -->
            <?php if(wp_organic_show_sidebar()) { ?>
                <div id="sidebar" class=" main-sidebar-2 col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>