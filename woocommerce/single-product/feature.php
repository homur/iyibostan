<?php
/**
 * feature Products
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce_loop;

$posts_per_page = 5;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$meta_query   = WC()->query->get_meta_query();
$meta_query[] = array(
    'key'   => '_featured',
    'value' => 'yes'
);

$args = apply_filters('woocommerce_feature_products_args', array(
    'post_type'             => 'product',
    'ignore_sticky_posts'   => 1,
    'no_found_rows'         => 1,
    'posts_per_page'        => $posts_per_page,
    'meta_query'  =>  $meta_query
) );

$products = new WP_Query( $args );

//$woocommerce_loop['columns']    = $columns;
$woocommerce_loop['columns']    = 4;

ob_start();


$products = new WP_Query($args);

if ($products->have_posts()) :
    ?>

    <div id="cms-feature-product" class="cms-feature-products-wrapper clearfix">
        <div class="cms-feature-heading">
            <h3 class="wg-title"><span><?php esc_html_e('Featured products', 'wp-organic'); ?></span></h3>
            <h4 class="wg-subtitle"><span><?php esc_html_e('Something more for your product', 'wp-organic'); ?></span></h4>
        </div>
        <div class="products">
            <div class="feature-product-carousel">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php
                    global $product;

                    // Ensure visibility
                    if (!$product || !$product->is_visible())
                        return;
                    ?>
                    <div <?php post_class('pb-40 cms-product text-center'); ?>>

                        <div class="cshere-woo-item-wrap" onclick="">
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
                            <div class="cshero-woo-meta">

                                <div class="cshero-product-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                                <?php
                                /**
                                 * woocommerce_after_shop_loop_item_title hook
                                 *
                                 * @hooked woocommerce_template_loop_rating - 5
                                 * @hooked woocommerce_template_loop_price - 10
                                 */

                                do_action( 'woocommerce_after_shop_loop_item_title' );


                                ?>
                                <div class="readmore_product">
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html__('see product','wp-organic');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; // end of the loop.   ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
wp_reset_postdata();

