<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
get_header();
$curent_id=0;?>
<?php while ( have_posts() ) : the_post(); $curent_id=get_the_ID();?>
<div class="pt-single-recipe">
    <div class="<?php wp_organic_main_class(); ?>">
        <div class="row">
            <div class="single-recipe-wrap clearfix">
                <div class="single-recipe-inner clearfix">
                    <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 full-width">
                        <div id="content" role="main">
                            <?php get_template_part( 'single-templates/recipe-single/content', get_post_format() ); ?>
                        </div><!-- #content -->

                    </div><!-- #primary -->

                </div>
            </div>
        </div>
    </div>
<?php endwhile; // end of the loop. ?>
    <div class="<?php wp_organic_main_class(); ?>">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 full-width">
                <div class="woocommerce-tabs-related">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="related_tab active ">
                            <a class="custom-font-2" href="#tab-recipie" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Recipes', 'wp-organic'); ?></a>
                        </li>
                        <li role="presentation" class="related-tab">
                            <a class="custom-font-2" href="#tab-related" aria-controls="related" role="tab" data-toggle="tab"><?php esc_html_e('Products', 'wp-organic'); ?></a>
                        </li>
                        <li class="comment_tab">
                            <a class="custom-font-2" href="#tab-comment" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Comments', 'wp-organic'); ?></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-recipie">
                            <?php wc_get_template( 'single-product/recipies.php' ); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-related">
                            <?php echo do_shortcode('[cms_grid col_xs="1" col_sm="4" col_md="4" col_lg="4" source="size:4|order_by:date|post_type:product" cms_template="cms_grid--product-list.php"]'); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-comment">
                            <?php comments_template( '', true ); ?>
                        </div>

                    </div>

                </div>
            </div><!-- #primary -->
        </div>
    </div>
</div>

<div class="<?php wp_organic_main_class(); ?> related-recipe-wrap">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 full-width">
            <div id="content" role="main">
                <?php wp_organic_related_recipe($curent_id);?>
            </div><!-- #content -->

        </div><!-- #primary -->
    </div>
</div>

<?php wp_organic_fancybox_themeoption(); ?>
<?php get_footer(); ?>