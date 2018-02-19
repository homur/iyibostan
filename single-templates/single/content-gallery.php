<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">

		<div class="entry-header">
			<span class="entry-date"><?php the_time(get_option('date_format'));?></span>
			<ul class="entry-tags"><?php the_tags('<li>','</li><li>','</li>'); ?></ul>
		</div>
		<!-- .entry-header -->
		<div class="entry-feature entry-gallery">
			<?php wp_organic_archive_gallery(); ?>

		</div>
		<div class="entry-content">


			<div class="entry-content-inner">
				<?php the_content();?>
				<?php wp_link_pages( array(
				'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:','wp-organic') . '</span>',
					'after'       => '</div>',
				'link_before' => '<span class="page-numbers">',
				        		'link_after'  => '</span>',
				) );?>
			</div>

		</div>



	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->


