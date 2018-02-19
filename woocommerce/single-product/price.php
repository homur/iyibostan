<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post;
$cat_product = sizeof( get_the_terms( $post->ID, 'product_cat' ));
?>
<div class="content">
	<?php
	echo  apply_filters( 'woocommerce_short_description', $post->post_excerpt );

	?>

</div>

<div class="pr-price-rating clearfix">
	<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && $product->get_sku() ) : ?>
		<span itemprop="productID" class="sku"><?php _e('SKU:','wp-organic' ); ?> <?php echo $product->get_sku(); ?>.</span>
	<?php endif; ?>
	<div class="woo-price w100 left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<p class="price"><?php echo ''.$product->get_price_html(); ?></p>
		<meta itemprop="price" content="<?php echo ''.$product->get_price(); ?>" />
		<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo ''.$product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
		<div class="per_unit">

			<?php
			$unit_one = get_post_meta( get_the_ID(), 'unit_one', true);
			if($unit_one){
				echo esc_html__('per ','wp-organic').$unit_one;
			}
			else{
				$total_weight = get_option('woocommerce_weight_unit');
				echo esc_html__('per ','wp-organic').$total_weight;
			}

			?>


		</div>
	</div>
	<div class="category_product w100 left">
		<?php
		echo wc_get_product_category_list ( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_product, 'wp-organic' ) . ' ', '.</span>' ); ?>
	</div>
	<div class="tag_product w100 left">
		<?php
		wp_organic_woocommerce_product_loop_tags();

		?>
	</div>


</div>


