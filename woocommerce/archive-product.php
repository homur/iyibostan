<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $breadcrumb, $pagetitle,$wp_query;
if(isset($_REQUEST['mode'])){
    $mode = $_REQUEST['mode'];
} else {
    $mode = 'grid';
}
get_header( 'shop' );
?>
<section id="primary" class="product-archive-style2 product-archive-3columns content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb'; }; ?> <?php if(!$pagetitle){ echo ' no_page_title'; }; ?>">
    <main id="main" class="site-main" role="main">

            <div class="archive-show-category">
                <div class="container">
                    <div class="row">

                        <?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC', 'number' =>'3', 'parent' =>0)); //, 'exclude' => '17,77'

                        foreach($wcatTerms as $wcatTerm) :
                            $wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
                            $wimage = wp_get_attachment_url( $wthumbnail_id );
                            ?>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="cat-wrap">
                                    <?php if($wimage!=""):?><div class="images-cat" style="background-image:url(<?php echo $wimage?>);"></div><?php endif;?>
                                    <div class="cat-overlay">
                                        <div class="cat-overlay-inner">
                                            <a href="<?php echo esc_url(home_url('/').'?post_type=product'); ?>">
                                                <?php echo esc_html__('Shop now', 'wp-organic');?>
                                            </a>
                                            <a class="custom-font-3" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach; ?>
                    </div>
                </div>
            </div>

		<div class="archive-product-meta">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <?php
                            /**
                             * woocommerce_before_shop_loop hook
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' );
                            ?>
                        </div>
					</div>
				</div>
			</div>

		</div>
        <div class="<?php echo get_post_meta(get_the_ID(), 'cs_layout', true) ? 'no-container' : 'container'; ?>">
            <div class="container-inner">
            <div class="row">
                <?php if ( is_active_sidebar( 'woocommerce-widget-area' ) ) : ?>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">

                        <div id="sidebar" class="widget-area woocommerce-widget" role="complementary">
                            <?php dynamic_sidebar( 'woocommerce-widget-area' ); ?>
                        </div><!-- #secondary -->

                    </div>
                <?php endif; ?>
                <div class="<?php echo ( is_active_sidebar('woocommerce-widget-area') ) ? 'col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-full-width'; ?>">
                	<?php
                		/**
                		 * woocommerce_before_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                		 * @hooked woocommerce_breadcrumb - 20
                		 */
                		do_action( 'woocommerce_before_main_content' );
                	?>

                		<?php do_action( 'woocommerce_archive_description' ); ?>

                		<?php if ( have_posts() ) : ?>

                        <?php woocommerce_product_loop_start(); ?>
                
                            <?php woocommerce_product_subcategories(); ?>
            
                            <?php while ( have_posts() ) : the_post(); ?>
            
                                <?php 
                                    switch ($mode) {
                                        case 'list':
                                            wc_get_template_part( 'content', 'product-list' ); 
                                            break;
                                        
                                        default:
                                            wc_get_template_part( 'content', 'product' ); 
                                            break;
                                    }
                                ?>

                                <?php
                                if (($wp_query->current_post +1)%3==0){
                                    echo '<div class="clr"></div>';
                                }


                                ?>
                            <?php endwhile; // end of the loop. ?>

                        <?php woocommerce_product_loop_end(); ?>
                            
						<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
						?>


                		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

                		<?php endif; ?>

                	<?php
                		/**
                		 * woocommerce_after_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                		 */
                		do_action( 'woocommerce_after_main_content' );
                	?>
                </div>


            </div> </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
<?php get_footer( 'shop' ); ?>
