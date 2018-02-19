<?php
/**
 * The template for displaying 404 pages (Not Found)
 * 
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="page-404-site-content">
		<div class="">
			<div id="content" role="main">
			
				<article id="post-0" class="post cms-error404 no-results not-found">
					<header class="entry-header">
						<h1><?php esc_html_e( '404', 'wp-organic' ); ?></h1>
					</header>

					<div class="entry-content">
						<p class="custom-font-2"><?php esc_html_e('The page you were looking for does not exist, There is no delicious fruit and veg here.', 'wp-organic') ?></p>
						<a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Return Home','wp-organic'); ?></a>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			</div><!-- #content -->
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>