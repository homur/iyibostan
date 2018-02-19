<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'wp-organic' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
<h3 class="title_billing"><i class="material-icons">security</i><?php esc_html_e( 'Secure checkout', 'wp-organic' ); ?></h3>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
	<div class="form-left">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<span><?php echo esc_html__('1. ','wp-organic');?></span><?php echo esc_html__('Shipping address','wp-organic');?>
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>


									<?php do_action( 'woocommerce_checkout_billing' ); ?>





							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>



						<?php endif; ?>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<span><?php echo esc_html__('2. ','wp-organic');?></span><?php echo esc_html__('Payment','wp-organic');?>
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<?php do_action( 'woocommerce_checkout_order_checkout_payment' ); ?>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<span><?php echo esc_html__('3. ','wp-organic');?></span><?php echo esc_html__('Review','wp-organic');?>
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="shop_table review-table">
								<tbody>
									<?php


										foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
											$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

											if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
												?>
												<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
													<td class="product-thumbnail"><?php
													$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

													if ( ! $_product->is_visible() )
														echo ''.$thumbnail;
													else
														printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
													?>
													</td>
													<td class="product-name">
														<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
														<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&times; %s', $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
														<?php echo WC()->cart->get_item_data( $cart_item ); ?>
													</td>
													<td class="product-total">
														<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
													</td>
												</tr>
												<?php
											}
										}
									?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
	<div class="form-right">
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>

	<div class="update-cart">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>"> <i class="material-icons">keyboard_arrow_left keyboard_arrow_left</i><?php esc_html_e( 'Update basket', 'wp-organic' ); ?></a>

	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
