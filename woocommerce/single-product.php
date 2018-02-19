<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $smof_data;
get_header( 'shop' );
?>

<section id="primary" class="content-area woocommerce single_woo_style1">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="pr-single-product  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<?php
                		/**
                		 * woocommerce_before_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                		 * @hooked woocommerce_breadcrumb - 20
                		 */
                		do_action( 'woocommerce_before_main_content' );
                	?>
                
                		<?php while ( have_posts() ) : the_post(); ?>
                
                			<?php wc_get_template_part( 'content', 'single-product' ); ?>
                
                		<?php endwhile; // end of the loop. ?>
                
                	<?php
                		/**
                		 * woocommerce_after_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                		 */
                		do_action( 'woocommerce_after_main_content' );
                	?>
                </div>

            </div>
        </div>
    </main>
</section>
<section class="cms_grid_product_great">
	<div class="container">
		<div class="row">
			<h3 class="title_product_great custom-font-14"><?php esc_html_e('More great products', 'wp-organic'); ?></h3>
			<?php

				echo do_shortcode('[cms_grid col_xs="1" col_sm="2" col_md="4" col_lg="4" source="size:4|order_by:date|post_type:product" layout="masonry" filter="true" cms_template="cms_grid--product-great.php"]');
			?>
		</div>
	</div>
</section>
<?php wp_organic_fancybox_themeoption(); ?>

<?php get_footer( 'shop' ); ?>
