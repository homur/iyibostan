<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
global $smof_data;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="cs-product-wrap clearfix">

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 *
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

		<?php if ( ! empty( $tabs ) ) : ?>

			<div class="woocommerce-tabs">
				<ul class="tabs">
					<?php foreach ( $tabs as $key => $tab ) : ?>

						<li class="<?php echo esc_attr( $key ); ?>_tab">
							<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
						</li>

					<?php endforeach; ?>
				</ul>
				<?php foreach ( $tabs as $key => $tab ) : ?>

					<div class="panel entry-content" id="tab-<?php echo esc_attr( $key ); ?>">
						<?php call_user_func( $tab['callback'], $key, $tab ); ?>
					</div>

				<?php endforeach; ?>
			</div>

		<?php endif; ?>


	</div><!-- .summary -->
    
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

	</div>
	<div class="woocommerce-tabs-related">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active related-tab">
				<a class="custom-font-2" href="#tab-related" aria-controls="related" role="tab" data-toggle="tab"><?php esc_html_e('Related products', 'wp-organic'); ?></a>
			</li>
			<?php if (isset($smof_data['enable_tab_recipe_product']) && ($smof_data['enable_tab_recipe_product']=='1')){?>
				<li class="related_tab">
					<a class="custom-font-2" href="#tab-recipies" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Recipes', 'wp-organic'); ?></a>
				</li>
			<?php }?>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab-related">
				<?php wc_get_template( 'single-product/related.php' ); ?>
			</div>
			<?php if (isset($smof_data['enable_tab_recipe_product']) && ($smof_data['enable_tab_recipe_product']=='1')){?>
				<div role="tabpanel" class="tab-pane" id="tab-recipies">
					<?php wc_get_template( 'single-product/recipies.php' ); ?>
				</div>
			<?php }?>

		</div>

	</div>

	<?php
    /**
     * woocommerce_after_single_product_summary hook
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */

    ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

