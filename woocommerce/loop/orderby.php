<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;

if(isset($_REQUEST['mode'])){
	$mode = $_REQUEST['mode'];
} else {
	$mode = 'grid';
}
switch ($mode) {
	case 'list':
		$class_grid = '';
		$class_list = 'active';
		break;
	
	default:
		$class_grid = 'active';
		$class_list = '';
		break;
}

if ( ! woocommerce_products_will_display() )
	return;

?>
<div class="cms-product-meta clearfix">
	<?php if ( is_active_sidebar( 'woocommerce-widget-search' ) ) : ?>
		<div class="wg-search-product col-md-3 col-sm-4">

			<div class="widget-area woocommerce-widget" role="complementary">
				<?php dynamic_sidebar( 'woocommerce-widget-search' ); ?>
			</div><!-- #secondary -->

		</div>
	<?php endif; ?>
	<div class="form-effect select-arrow sort-by">
		<form class="woocommerce-ordering" method="get">
			<span class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</span>
			<label><?php esc_html_e('Sort By: ', 'wp-organic'); ?></label>
			<select name="orderby" class="orderby">
				<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
					<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
			<?php
			// Keep query string vars intact
			foreach ( $_GET as $key => $val ) {
				if ( 'orderby' === $key || 'submit' === $key ) {
					continue;
				}
				if ( is_array( $val ) ) {
					foreach( $val as $innerVal ) {
						echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
					}
				} else {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
				}
			}
			?>
		</form>
	</div>
	<div class="woocommerce-result-count form-effect select-arrow">
		<label><?php esc_html_e('show: ', 'wp-organic'); ?></label><?php echo wp_organic_woocommerce_products_per_page(); ?>
	</div>
	<div class="cms-product-layout">
		<label><?php esc_html_e('Select View: ', 'wp-organic'); ?></label>
		<a href="?post_type=product&mode=grid" class="<?php echo esc_attr($class_grid); ?>" ><span class="cms-product-column active"><i class="material-icons">view_module</i></span></a>
		<a href="?post_type=product&mode=list" class="<?php echo esc_attr($class_list); ?>" ><span class="cms-product-list"><i class="material-icons">view_list</i></span></a>
	</div>

</div>

