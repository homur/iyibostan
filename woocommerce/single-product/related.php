<?php
/**
 * Related Products
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce_loop;

$posts_per_page = 4;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );

if ( ! $related = wc_get_related_products( $product->get_id() ) ) {
    return;
}

$args = apply_filters('woocommerce_related_products_args', array(
    'post_type'             => 'product',
    'ignore_sticky_posts'   => 1,
    'no_found_rows'         => 1,
    'posts_per_page'        => $posts_per_page,
    'orderby'               => 'date',
    'post__in'              => $related,
    'post__not_in'          => array($product->get_id())
) );

$products = new WP_Query( $args );

//$woocommerce_loop['columns']    = $columns;
$woocommerce_loop['columns']    = 4;

ob_start();
$date = time() . '_' . uniqid(true);

$products = new WP_Query($args);

if ($products->have_posts()) :
    ?>

    <div id="cms-related-product-<?php echo esc_attr($date); ?>" class="cms-related-products-wrapper clearfix">
        <div class="products">
            <div id="related-product-item">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php
                    global $product;

                    // Ensure visibility
                    if (!$product || !$product->is_visible())
                        return;
                    ?>
                    <div <?php post_class('pb-40 cms-product text-center col-xs-12 col-sm-3 col-md-3 '); ?>>

                        <div class="cshere-woo-item-wrap" onclick="">
                            <div class="cshero-product-title">
                                <h3 class="custom-font-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
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

                                <div class="price-add-to-cart">
                                    <a>
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
                <?php endwhile; // end of the loop.   ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
wp_reset_postdata();

