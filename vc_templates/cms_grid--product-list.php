<?php
global $product,$woocommerce;
    /* get categories */
        $taxo = 'product_cat';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><span>All products</span></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                           <span> <?php echo esc_html($term->name);?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'wp_organic_product_listing';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="woocommerce <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
               <?php
                ?>
                <div>
                    <div class="cshere-woo-item-wrap clearfix">
                        <div class="cshere-woo-item-wrap2">
                            <div class="cshero-woo-inner">
                                <div class="cshero-woo-image --">
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
                            </div>
                            <div class="cshero-woo-meta">
                                <?php
                                wp_organic_get_star_rating();
                                ?>
                                <div class="cshero-product-title">
                                    <h3 class="custom-font-3">
                                        <span class="line"></span>
                                        <a href="<?php the_permalink(); ?>" alt="" ><?php the_title(); ?></a>
                                    </h3>
                                </div>

                                <div class="price-add-to-cart">

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

                                <?php
                                if(shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
                                    // Show wishlist
                                    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
    </div>

</div>