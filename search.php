<?php
/**
 * The template for displaying Search Results pages
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>
<?php wp_organic_breadcrumbs() ?>
<div id="page-search-results">
    <div id="page-blog-listing">
<div class="container">
    <div class="row">
        <section id="primary" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php 

                    get_template_part( 'single-templates/content/content', get_post_format() );

                    ?>
                <?php endwhile; ?>



            <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'wp-organic' ); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wp-organic' ); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

            </div><!-- #content -->
            <?php wp_organic_paging_nav(); ?>
        </section><!-- #primary -->
        <div id="sidebar" class="rightsidebar col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
    </div>
</div>
<?php get_footer(); ?>