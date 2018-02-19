<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header();
?>
<div id="page-default">
<div class="<?php wp_organic_main_class(); ?> <?php if (wp_organic_sidebar_left_active()) { echo 'sidebar-left-active'; } ?>">
	<div class="row">
		<div id="primary" class="<?php if(wp_organic_show_sidebar()) { echo 'col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active'; }else  { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12 page-full-width'; } ?>">
			<div id="content" role="main" class="main-content">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'single-templates/content', 'page' ); ?>

						<?php comments_template( '', false ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php if(wp_organic_show_sidebar()) { ?>
	        <div id="sidebar" class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
	            <?php get_sidebar(); ?>
	        </div>
	    <?php } ?>
	</div>
</div>
</div>
<?php get_footer(); ?>