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
	<div class="entry-blog recipe-content-single <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">
		<div class="recipe-left col-sameheight">
			<div class="entry-feature ">
				<?php
				if(has_post_thumbnail()):
					$class = ' has-thumbnail';
					$thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
				else:
					$class = ' no-image';
					$thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
				endif;

				?>
				<div class="cms-img" style="background-image:url(<?php echo esc_url($thumbnail);?>);"></div>
			</div>
		</div>

		<div class="recipe-right col-sameheight">
			<div class="entry-content-top">
				<h3><?php the_title()?></h3>
				<div class="meta_recipe">
					<?php wp_organic_recipe_meta();?>
				</div>
				<div class="desc-content">
					<?php the_content();?>
				</div>
				<div class="share">
					<?php wp_organic_share_recipe();?>
				</div>
				<div class="favorite"><?php post_favorite();?>

				</div>

			</div><!-- .entry-content -->
				<?php wp_organic_recipe_single_tab(); ?>
			<div class="entry-content-bottom">
				<span><?php echo esc_html__('Add this recipies ingredients to your basket.', 'wp-organic');?></span>
                <a class="btn btn-lg" href="<?php echo esc_url(wp_organic_woocommerce_cart_url()); ?>"><?php esc_html_e('Add All Ingredients','wp-organic');?><i class="material-icons">shopping_basket</i></a>
            </div>


		</div>
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
