<?php
global $product,$woocommerce,$post;
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

    /*ajax media*/
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_script('wp-mediaelement');
        /* js, css for load more */
        wp_register_script('cms-loadmore-js', get_template_directory_uri() . '/assets/js/cms_loadmore_gallery.js', array('jquery'), '1.0', true);
        // What page are we on? And what is the pages limit?
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $limit = $atts['limit'];
        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

        // Add some parameters for the JS.
        $current_id = str_replace('-', '_', $atts['html_id']);
        wp_localize_script(
            'cms-loadmore-js',
            'cms_more_obj' . $current_id,
            array(
                'startPage' => $paged,
                'maxPages' => $max,
                'total' => $wp_query->found_posts,
                'perpage' => $limit,
                'nextLink' => next_posts($max, false),
                'masonry' => $atts['layout']
            )
        );
        wp_enqueue_script('cms-loadmore-js');
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
            <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-product woocommerce ">
                    <div class="cms-grid-product-inner">
                        <?php
                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                                $class = ' has-thumbnail';
                                $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                            else:
                                $class = ' no-image';
                                $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                            endif;
                        ?>
                           <div class="cms-grid-media <?php echo esc_attr($class) ?>">
                               <a href="<?php the_permalink(); ?>">
                                   <?php  $sale = get_post_meta( get_the_ID(), '_sale_price', true); ?>
                                   <?php if($sale) : ?>
                                       <span class="onsale">Sale!</span>
                                   <?php endif;?>

                                   <?php echo $thumbnail;?>
                               </a>

                           </div>

                        <div class="cms-grid-descriptions">
                            <div class="cms-grid-descriptions-top">
                                <div class="cms-grid-title">
                                    <a href="<?php the_permalink(); ?>"><h5><?php the_title();?></h5></a>
                                </div>
                                <?php
                                $product = new WC_Product( get_the_ID() );
                                $price_html = $product->get_price_html();
                                ?>
                                <div class="price-unit">
                                    <div class="price">
                                        <span> <?php echo esc_html__('from ','wp-organic'). $price_html; ?></span>

                                    </div>
                                    <div class="per_unit">

                                        <?php
                                        $unit_one = get_post_meta( get_the_ID(), 'unit_one', true);
                                        if($unit_one){
                                            echo ' / '.$unit_one;
                                        }
                                        else{
                                            $total_weight = get_option('woocommerce_weight_unit');
                                            echo ' / '.$total_weight;
                                        }

                                        ?>


                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($post->post_excerpt){?>
                            <div class="short-desc">
                              <?php
                              $short_desc= apply_filters( 'woocommerce_short_description', $post->post_excerpt );
                              echo wp_organic_text_limit($short_desc,12).'...';
                              ?>

                            </div>
                            <?php } ?>
                            <div class="readmore_product">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html__('View Product','wp-organic');?></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="cms_pagination"></div>
</div>