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
<?php wp_organic_breadcrumbs() ?>
<div id="page-blog-listing">
    <div class="container">
        <div class="row">
            <section id="primary" class="col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active">
                <div id="content" role="main">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post();
                            /* Include the post format-specific template for the content. If you want to
                             * this in a child theme then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                             get_template_part( 'single-templates/content/content', get_post_format() );
                        endwhile; // end of the loop.?>
                        
                        <?php wp_organic_paging_nav(); ?>
                        
                    <?php else : ?>
                    
                        <?php get_template_part( 'single-templates/content', 'none' ); ?>
                    <?php endif; ?>
                
                </div><!-- #content -->
            </section><!-- #primary -->
            <div id="sidebar" class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>