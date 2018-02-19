<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>
<div class="cms-checkout-page woocommerce-style-1 clearfix">
	<h3 class="title_cart"><i class="material-icons">shopping_cart</i><?php esc_html_e('YOUR SHOPPING CART', 'wp-organic'); ?></h3>
	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

	<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<div class="table-responsive">
			<table class="shop_table cart table-responsive" cellspacing="0">
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $_product->is_visible() )
										echo ''.$thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
								?>
							</td>

							<td class="product-name">
								<?php
									if ( ! $_product->is_visible() )
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
									else
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

									//Rate
									$rating_count = $_product->get_rating_count();
									$review_count = $_product->get_review_count();
									$average      = $_product->get_average_rating();

									if ( $rating_count > 0 ) : ?>

										<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
											<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'wp-organic' ), $average ); ?>">
												<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
													<strong  class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %s5%s', 'wp-organic' ), '<span itemprop="bestRating">', '</span>' ); ?>
													<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'wp-organic' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
												</span>
											</div>
											<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'wp-organic' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a><?php endif ?>
										</div>

									<?php endif; ?>
									<?php
									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
										echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'wp-organic' ) . '</p>';
								?>
								<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
							</td>

							<td class="product-quantity">
								<div class="qty-top">

									<?php

									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
											'min_value'   => '0'
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
									?>
									<div class="text-qty"><?php echo esc_html__('Qty:','wp-organic');?></div>
								</div>

								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">'.esc_html__('Remove','wp-organic').'</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'wp-organic' ) ), $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
				<tr class="cart-action-wrap">
					<td class="coupon">
						<?php if ( WC()->cart->coupons_enabled() ) { ?>
							<div class="coupon">
								<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_html_e( 'Coupon code', 'wp-organic' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'wp-organic' ); ?>" />
								<?php do_action( 'woocommerce_cart_coupon' ); ?>
							</div>
						<?php } ?>
					</td>
					<td class="actions">

						<input type="submit" class="button" name="update_cart" value="<?php esc_html_e( 'Refresh your basket', 'wp-organic' ); ?>" />
						<?php do_action( 'woocommerce_cart_actions' ); ?>
						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</td>
				</tr>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		</div>

	<?php do_action( 'woocommerce_after_cart_table' ); ?>

	</form>

	<div class="cart-collaterals">
		<div class="cart-collaterals-inner">

			<?php do_action( 'woocommerce_cart_collaterals' ); ?>
			<div class="wc-proceed-to-checkout">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>
		</div>
	</div>
	<div class="continue-shopping">
		<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ;?>"> <i class="material-icons">keyboard_arrow_left keyboard_arrow_left</i><?php esc_html_e( 'Continue shopping', 'wp-organic' ); ?></a>

	</div>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
