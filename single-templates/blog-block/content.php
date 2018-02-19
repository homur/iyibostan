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
		<div class="entry-blog-inner">
				<div class="entry-feature entry-feature-image">
					<?php the_post_thumbnail( 'wp_organic_blog_block' ); ?>
				</div>
					<div class="entry-header clearfix">
						<div class="detail-terms"><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></div>
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php
								if(is_sticky()){
									echo "<i class='fa fa-thumb-tack'></i>";
								}
								?>
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="entry-meta">
							<div class="entry-time">
								<?php the_time('F d, Y');?>
							</div>
							<div class="entry-author">
								<?php echo get_the_author();?>
							</div>
							<span class="cs-blog-comments"><a href="<?php echo get_comments_link(get_the_ID());?>"><span class="share-box"><?php comments_number(__('0 Comment','wp-organic'),__('1 Comment ','wp-organic'),__('% Comments','wp-organic'));?></span></a></span>

						</div>

					</div>
					<!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-content-inner">
							<?php echo substr(get_the_excerpt(), 0,230); ?>...

						</div>
						<?php
						wp_link_pages( array(
							'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:','wp-organic') . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="page-numbers">',
							'link_after'  => '</span>',
						) );
						?>
					</div>
					<div class="content-bottom">
						<div class="blog-tags">
							<ul class="tags">
								<li><?php the_tags( '<span><i class="material-icons">more</i> '.'</span> ',' / ' ); ?></li>
							</ul>
						</div>
						<?php wp_organic_archive_readmore() ?>
						<div class="content-bottom-right">
							<span class="share-label"><?php esc_html_e('Share', 'wp-organic'); ?></span>
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
							<a target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'wp-organic');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
							<a target="_blank" href="https://pinterest.com/pin/create/button/??u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-pinterest-p"></i></span></a>

						</div>
					</div>


		</div>
		<!-- .entry-content -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
