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
<div class="cms-grid-wraper template-cms_grid--product-great <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li class="all_cat"><a class="active custom-font-3" href="#" data-group="all"><span><?php echo esc_html__('All offers', 'wp-organic');?></span></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li>

                        <?php $term_icon = get_term_meta($term->term_id, 'taxonomy-icon', true); ?>
                        <?php $term_icon_image = get_term_meta($term->term_id, 'taxonomy-thumbnail-id', true); ?>
                        <?php $term_icon_image_hover = get_term_meta($term->term_id, 'taxonomy-hover-image-id', true); ?>
                        <?php $term_hover_color = get_term_meta($term->term_id, 'taxonomy-hover-color', true); ?>
                        <a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>" class="custom-font-3 <?php if (!( $term_icon) && !($term_icon_image)) { echo 'no_icon_images';}?> ">

                            <?php if($term_icon): ?>
                                <span class="img-cat-block">
                                    <i class="icon1-not-hover <?php echo esc_attr($term_icon); ?>"></i>
                                    <?php if($term_hover_color): ?>
                                        <i class="icon1-hover <?php echo esc_attr($term_icon); ?>" style="color:<?php echo esc_attr($term_hover_color); ?>"></i>
                                </span>
                                <?php endif; ?>

                            <?php elseif ($term_icon_image): ?>
                                <span class="img-cat-block">
                                    <img class="img-cat" src="<?php echo wp_get_attachment_image_url($term_icon_image); ?>" alt="" />
                                    <?php if ($term_icon_image_hover){ ?>
                                    <img class="img-cat-hover" src="<?php echo wp_get_attachment_image_url($term_icon_image_hover); ?>" alt="" />
                                    <?php } ?>
                                </span>
                            <?php endif; ?>
                            <span><?php echo esc_html($term->name);?></span>

                        </a>

                    </li>
                <?php endforeach;?>
               <!-- <span class="line slider" style="background-color:<?php echo esc_attr($term_hover_color); ?>"></span>-->
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
        $limit = $atts['limit'];
        // setup query
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page' =>  $limit,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxo,
                    'field' => 'id',
                    'terms' => $_category,
                )
            ),
            'meta_query' => array(
                array(
                    'key' => '_visibility',
                    'value' => array('catalog', 'visible'),
                    'compare' => 'IN'
                )
            )
        );

        $posts = new WP_Query($args);

        
        $max = $posts->max_num_pages;
        // Add some parameters for the JS.
        $current_id = str_replace('-', '_', $atts['html_id']);
        wp_localize_script(
            'cms-loadmore-js',
            'cms_more_obj' . $current_id,
            array(
                'startPage' => $paged,
                'maxPages' => $max,
                'total' => $posts->found_posts,
                'perpage' => $limit,
                'nextLink' => next_posts($max, false),
                'masonry' => $atts['layout'],
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'meta_query' => array(
                    array(
                        'key' => '_visibility',
                        'value' => array('catalog', 'visible'),
                        'compare' => 'IN'
                    )
                )
            )
        );
        wp_enqueue_script('cms-loadmore-js');

        $size = ($atts['layout'] == 'basic') ? 'thumbnail' : 'wp_organic_portfolio-width-height';
        while ($posts->have_posts()) {
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach (cmsGetCategoriesByPostID(get_the_ID(), $taxo) as $category) {
                $groups[] = '"category-' . $category->slug . '"';
            }
            ?>
            <div class="<?php echo esc_attr($atts['item_class']); ?>"
                 data-groups='[<?php echo implode(',', $groups); ?>]'>
                <div class="cms-grid-product">
                    <div class="cms-grid-title">
                        <h5 class="custom-font-3"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                    <?php
                    if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(), $size);
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="' . esc_url(CMS_IMAGES) . 'no-image.jpg" alt="' . get_the_title() . '" />';
                    endif;
                    echo '<div class="cms-grid-media ' . esc_attr($class) . '">' . $thumbnail . '</div>';
                    ?>
                        <?php  $sale = get_post_meta( get_the_ID(), '_sale_price', true); ?>
                        <?php if($sale) : ?>
                            <span class="onsale custom-font-2"><?php echo esc_html__('Sale', 'wp-organic');?></span>
                        <?php endif;?>
                    <div class="cms-grid-descriptions">
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
            <?php

        }?>
    </div>

</div>