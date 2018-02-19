<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
$cms_woo_class = '';
$classes='';
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4);
}
$cms_woo_class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes = 'last';
$cms_woo_class = $cms_woo_class . ' '. $classes;
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
<div <?php post_class( $cms_woo_class) ?>>
	<div class="cshere-woo-item-wrap content-product-list clearfix">
		<div class="cshere-woo-item-wrap2">
			<div class="cshero-woo-inner">
				<div class="cshero-woo-image">
					<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
					<a href="<?php the_permalink(); ?>">
						<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
						?>
					</a>

				</div>
			</div>
			<div class="cshero-woo-meta">

				<div class="cshero-product-title">
					<h3>
						<span class="line"></span>
						<a href="<?php the_permalink(); ?>" alt="" ><?php the_title(); ?></a>
					</h3>
				</div>
				<?php
				if(shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
					// Show wishlist
					echo do_shortcode('[yith_wcwl_add_to_wishlist]');
				}
				?>

				<div class="product-desc">
					<?php
					echo  wp_organic_text_limit(apply_filters( 'woocommerce_short_description', $post->post_excerpt ),17)

					?>
				</div>
				<div class="content_product_list_bottom">
					<?php if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {?>
					<div class="rating-wrap" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
						<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'wp-organic' ), $average ); ?>">
							<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
								<strong class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'wp-organic' ), '<span itemprop="bestRating">', '</span>' ); ?>
								<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'wp-organic' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
							</span>
						</div>
						<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s', '%s', $review_count, 'wp-organic' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a><?php endif ?>
					</div>
					<?php }?>
					<div class="price-add-to-cart">

						<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
						<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */

						do_action( 'woocommerce_after_shop_loop_item_title' );


						?>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
